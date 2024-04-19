<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

use App\Model\Post;

class PostController extends Controller
{
    public function post_view($id)
    {
        $post = Post::with('postType', 'tags', 'author')->find($id);
        return view('web-views.posts.view', compact('post'));
    }
}
