<?php

namespace App\Http\Controllers\Admin;

use App\CPU\Helpers;
use App\CPU\ImageManager;
use App\CPU\PostManager;
use File;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Category;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\PostTag;
use App\Model\PostType;
use App\Model\Tag;
use App\Model\Translation;
use Brian2694\Toastr\Facades\Toastr;
use DOMDocument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct(
        private Tag $tag,
        private PostType $post_type,
        private PostTag $post_tag,
        private Post $posts,

    ) {
    }

    public function add_new(Request $request)
    {
        $post_types = PostType::all();
        return view('admin-views.posts.add-new', compact('post_types'));
    }
    public function add_new_post_type(Request $request)
    {
        return view('admin-views.posts.type.add-new');
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title'                 => 'required',
            'sub_title'             => 'required',
            'details'               => 'required',
            'post_type_id'          => 'required',
            'image'                 => 'required',
            'photo' => 'required',
        ], [
            'title.required'        => translate('posts_title_is_required!'),
            'image.required'        => translate('posts_thumbnail_is_required!'),
            'photo.required'        => translate('posts_photo_is_required!'),
        ]);


        if ($validator->errors()->count() > 0) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $html_content = $request->details;
        $html_content_utf8 = mb_convert_encoding($html_content, 'HTML-ENTITIES', 'UTF-8');
        // Create a new DOMDocument
        $dom = new DOMDocument();
        $dom->loadHTML($html_content_utf8, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); // Load HTML content

        // Lấy tất cả các thẻ <img> từ nội dung HTML
        $imagesTags = $request->fileImages;
        $baseUrl = URL::to('/');
        // Loop through each img tag and process
        if ($imagesTags !== null) {
            foreach ($imagesTags as $index => $imageTag) {

                if ($imageTag->getMimeType() && strpos($imageTag->getMimeType(), 'image/') === 0) {
                    // Find all img tags in the DOM
                    $imgElements = $dom->getElementsByTagName('img');

                    // Loop through img elements
                    foreach ($imgElements as $imgElement) {
                        // Get the src attribute value
                        $src = $imgElement->getAttribute('src');

                        // If the src attribute matches the Blob URL, replace it with the uploaded image URL
                        if (strpos($src, 'blob:') === 0) {
                            // Upload the image to the server
                            $uploadedImage = ImageManager::upload('posts/images/', 'webp', $imageTag);
                            $imgElement->setAttribute('src',  $baseUrl . '/storage/app/public/posts/images/'  . $uploadedImage);
                            // Break the loop if replacement is done for the current image
                            break;
                        }
                    }
                }
            }
        }


        // Get the updated HTML content
        $htmlContent = $dom->saveHTML();


        $currentuserid = auth('admin')->id();
        $post = new Post();

        $post->title = $request->title[array_search('en', $request->lang)];
        $post->sub_title = $request->sub_title[array_search('en', $request->lang)];

        $post->slug = Str::slug($request->title[array_search('en', $request->lang)], '-') . '-' . Str::random(6);
        $post->status = $request->status;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->post_type_id = $request->post_type_id;
        $post->author_id = $currentuserid;


        $post->details = $htmlContent;
        $post->thumbnail  = ImageManager::upload('posts/thumbnail/', 'webp', $request->image);
        $post->photo  = ImageManager::upload('posts/photo/', 'webp', $request->photo);
        $post->meta_image = ImageManager::upload('posts/meta/', 'webp', $request->meta_image);


        $post->save();

        $tag_ids = [];
        if ($request->tags != null) {
            $tags = explode(",", $request->tags[array_search('en', $request->lang)]);
            // Debugging: Check if tags are extracted correctly
        }
        if (isset($tags)) {
            foreach ($tags as $key => $value) {
                $tag = Tag::firstOrNew(
                    ['tag' => trim($value)]
                );
                $tag->save();
                $tag_ids[] = $tag->id;
            }
        }


        // Sync tags with the post
        $post->tags()->sync($tag_ids);
        Toastr::success('Post added successfully');

        return back();
    }
    public function edit($id)
    {
        $post = PostManager::get_post($id);
        $post_types = PostType::all();
        return view('admin-views.posts.edit', compact('post', 'post_types'));
    }
    public function view($id)
    {
        // $posts = $this->posts->active()
        //     ->where(['id' => $id])
        //     ->first();

        $post = PostManager::get_post($id);

        return view('admin-views.posts.view', compact('post'));
    }
    public function list(Request $request)
    {
        // Khởi tạo các biến
        $query_params = [];
        $search = $request->input('search');
        $post_types = PostType::all();
        $posts = Post::query();
        $statusEnumValues = DB::select(DB::raw("SHOW COLUMNS FROM posts WHERE Field = 'status'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $statusEnumValues, $matches);
        $statusValues = array_map(function ($value) {
            return trim($value, "'");
        }, explode(',', $matches[1]));
        $admins = Admin::all();
        // Áp dụng điều kiện tìm kiếm theo tiêu đề, tiêu đề phụ, trạng thái, chi tiết (nếu có)
        if ($search) {
            $posts->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('sub_title', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhere('details', 'like', '%' . $search . '%');
            });

            $query_params['search'] = $search;
        }

        // Lọc theo loại bài viết (nếu có)
        if (!empty($request->post_type_id) && $request->has('post_type_id')) {
            $posts->where('post_type_id', $request->post_type_id);
            $query_params['post_type_id'] = $request->post_type_id;
        }
        if (!empty($request->status) && $request->has('status')) {
            $posts->where('status', $request->status);
            $query_params['status'] = $request->status;
        }
        if (!empty($request->author_id) && $request->has('author_id')) {
            $posts->where('author_id', $request->author_id);
            $query_params['author_id'] = $request->author_id;
        }
        // Lấy kết quả phân trang và truyền dữ liệu vào view
        $posts = $posts->paginate(Helpers::pagination_limit())->appends($query_params);

        return view('admin-views.posts.list', compact('posts', 'post_types', 'admins', 'search', 'statusValues'));
    }
    function view_post_type(Request $request)
    {
        $query_param = [];
        $search = $request['search'];
        if ($request->has('search')) {
            $key = explode(' ', $request['search']);
            $post_types = PostType::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%");
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $post_types = new PostType();
        }

        $post_types = $post_types->paginate(Helpers::pagination_limit())->appends($query_param);

        return view('admin-views.posts.type.view', compact('post_types', 'search'));
    }
    public function post_type_store(Request $request)
    {
        $post_type = new PostType();
        $post_type->name = $request->name[array_search('en', $request->lang)];



        if ($request->ajax()) {

            return response()->json([], 200);
        } else {

            $post_type->save();
            Toastr::success('Post Type added successfully');
            // dd($request->title, $request->tags, $request->category_id);
            return redirect()->route('admin.posts.view_post_type');
        }
    }
    public function post_type_edit(Request $request, $id)
    {
        $post_type = PostType::where(['id' => $id])->first();
        return view('admin-views.posts.type.edit', compact('post_type'));
    }
    public function post_type_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Post type name is required!'
        ]);

        DB::table('post_types')->where(['id' => $id])->update([
            'name' => $request->name,
            'updated_at' => now()
        ]);
        Toastr::success(translate('Post type_updated_successfully'));
        return back();
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required',
            'sub_title'     => 'required',
            'details'       => 'required',
            'post_type_id'  => 'required',

        ], [
            'title.required'    => translate('posts_title_is_required!'),
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => Helpers::error_processor($validator)]);
        }

        $post = Post::findOrFail($id);

        // Lấy nội dung HTML từ request
        $html_content = $request->details;
        $html_content_utf8 = mb_convert_encoding($html_content, 'HTML-ENTITIES', 'UTF-8');
        // Tạo một DOMDocument mới
        $dom = new DOMDocument();
        @$dom->loadHTML($html_content_utf8, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); // Load HTML content

        // Lấy tất cả các thẻ <img> từ nội dung HTML
        $imagesTags = $request->fileImages;
        $baseUrl = URL::to('/');
        // Lặp qua mỗi thẻ <img> và xử lý
        if ($imagesTags !== null) {
            foreach ($imagesTags as $index => $imageTag) {
                // Kiểm tra nếu $imageTag là một tệp hình ảnh hợp lệ
                if ($imageTag->getMimeType() && strpos($imageTag->getMimeType(), 'image/') === 0) {
                    // Tìm tất cả các thẻ img trong DOM
                    $imgElements = $dom->getElementsByTagName('img');

                    // Lặp qua các phần tử img
                    foreach ($imgElements as $imgElement) {
                        // Lấy giá trị của thuộc tính src
                        $src = $imgElement->getAttribute('src');

                        // Nếu thuộc tính src khớp với Blob URL, thực hiện quá trình tải lên ảnh
                        if (strpos($src, 'blob:') === 0) {
                            // Tải ảnh lên máy chủ
                            $uploadedImage = ImageManager::upload('posts/images/', 'webp', $imageTag);

                            // Cập nhật thuộc tính src của thẻ img
                            $imgElement->setAttribute('src', $baseUrl . '/storage/app/public/posts/images/' . $uploadedImage);

                            // Phá vỡ vòng lặp nếu thay thế đã được thực hiện cho ảnh hiện tại
                            break;
                        }
                    }
                }
            }
        }

        // Lấy nội dung HTML đã cập nhật
        $htmlContent = $dom->saveHTML();

        // Cập nhật thông tin bài đăng
        $post->title = $request->title[array_search('en', $request->lang)];
        $post->sub_title = $request->sub_title[array_search('en', $request->lang)];
        $post->slug = Str::slug($request->title[array_search('en', $request->lang)], '-') . '-' . Str::random(6);
        $post->status = $request->status;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;
        $post->post_type_id = $request->post_type_id;
        $post->details = $htmlContent;
        if ($request->file('image')) {
            $post->thumbnail = ImageManager::update('posts/thumbnail/', $post->thumbnail, 'webp', $request->file('image'));
        }
        if ($request->file('meta_image')) {
            $post->meta_image = ImageManager::upload('posts/meta/', 'webp', $request->file('meta_image'));
        }
        if ($request->file('photo')) {
            $post->photo  = ImageManager::upload('posts/photo/', 'webp', $request->file('photo'));
        }
        $post->save();

        // Đồng bộ các thẻ với bài đăng
        $tag_ids = [];
        if ($request->tags != null) {
            $tags = explode(",", $request->tags[array_search('en', $request->lang)]);
            foreach ($tags as $key => $value) {
                $tag = Tag::firstOrNew(
                    ['tag' => trim($value)]
                );
                $tag->save();
                $tag_ids[] = $tag->id;
            }
        }
        $post->tags()->sync($tag_ids);
        Toastr::success('Post updated successfully');
        // Trả về trang trước đó
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();

        Toastr::success('Post deleted successfully');
        return redirect()->route('admin-view.posts.add-new');
    }
    public function export_excel(Request $request)
    {
    }
}
