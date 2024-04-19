@extends('layouts.back-end.app')


@push('css_or_js')

<link href="{{ asset('public/assets/back-end/css/tags-input.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/select2/css/select2.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('public/richtexteditor/rte_theme_default.css') }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .rte-modern.rte-desktop.rte-toolbar-default{
    min-width: inherit !important;
  }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #dedede;
        border: 1px solid #dedede;
        border-radius: 2px;
        color: #222;
        display: flex;
        gap: 4px;
        align-items: center;
    }
   
</style>
@endpush

@section('title', translate('posts')) @section('content')
<section class="section-content pt-5">
    <div class="container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="{{
                        asset('public/assets/back-end/img/add-new-delivery-man.png')
                    }}" alt="" />
                {{ translate("add_new_post") }}
            </h2>
        </div>

        <!-- Form -->
        <form class="post-form text-start" id="posts_form">
            @csrf
            @php($language = \App\Model\BusinessSetting::where('type', 'pnc_language')->first())
            @php($language = $language->value ?? null)
            @php($default_lang = 'en')
            @php($default_lang = json_decode($language)[0])
            <div class="row g-2">

                <div class="col-md-12">
                    <div class="card">
                        <div class="px-4 pt-3">

                            <ul class="nav nav-tabs w-fit-content mb-4">
                                @foreach (json_decode($language) as $lang)
                                <li class="nav-item">
                                    <a class="nav-link text-capitalize lang_link {{ $lang == $default_lang ? 'active' : '' }}"
                                        href="#" id="{{ $lang }}-link">{{ \App\CPU\Helpers::get_language_name($lang) .
                                        '(' . strtoupper($lang) . ')' }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="card-body">
                            @foreach (json_decode($language) as $lang)
                            <div class="{{ $lang != $default_lang ? 'd-none' : '' }} lang_form" id="{{ $lang }}-form">

                                {{-- Title --}}
                                <div class="form-group">
                                    <label class="title-color" for="{{ $lang }}_name">{{ translate("posts_title") }} ({{
                                        strtoupper($lang)
                                        }})
                                    </label>
                                    <input type="text" {{ $lang==$default_lang ? "required" : "" }} name="title[]"
                                        id="{{ $lang }}_name" class="form-control" placeholder="New Posts">
                                </div>
                                {{-- End title --}}

                                {{-- Sub_title --}}
                                <div class="form-group">
                                    <label class="title-color" for="{{ $lang }}_name">{{ translate("sub_title") }} ({{
                                        strtoupper($lang)
                                        }})
                                    </label>
                                    <input type="text" {{ $lang==$default_lang ? "required" : "" }} name="sub_title[]"
                                        id="{{ $lang }}_name" class="form-control" placeholder="Sub title">
                                </div>
                                {{-- End sub title --}}
                                {{-- Category --}}
                                <div class="row">

                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label for="name" class="title-color">{{ translate('post_type') }}</label>
                                            <select class="js-select2-custom form-control" name="post_type_id" required>
                                                <option value="{{ old('post_type_id') }}" selected disabled>{{
                                                    translate('select_post_type') }}</option>
                                                @foreach ($post_types as $pts)
                                                <option value="{{ $pts['id'] }}" {{ old('name')==$pts['id'] ? 'selected'
                                                    : '' }}>
                                                    {{ $pts['name'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            @php($post_status=["draft",'published','scheduled'])
                                            <label for="name" class="title-color">{{ translate('post_status') }}</label>
                                            <select class="js-select2-custom form-control" name="status" required>
                                                <option value="{{ old('status') }}" selected disabled>{{ translate('select_post_status') }}</option>
                                                @foreach ($post_status as $status)
                                                    <option value="{{ $status }}" {{ old('status')==$status ? 'selected' : '' }}>
                                                        {{ translate($status) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>

                                {{-- End Category --}}
                         
                                <input type="hidden" name="lang[]" value="{{ $lang }}" />
                                <div class="form-group pt-4">
                                    <label class="title-color" for="{{ $lang }}_description">{{ translate('description')
                                        }}
                                        ({{ strtoupper($lang) }})</label>
                                    <div class="textarea textarea-editor" id="editor">{{ old('details') }}</div>
                                </div>

                                <div class="form-group  pt-4">
                                    <label class="title-color d-flex align-items-center gap-2">
                                        {{ translate('search_tags') }}
                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                            title="{{translate('add_the_product_search_tag_for_this_product_that_customers_can_use_to_search_quickly')}}">
                                            <img width="16"
                                                src="{{asset('public/assets/back-end/img/info-circle.svg')}}" alt="">
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" placeholder="{{translate('enter_tag')}}"
                                        name="tags[]" data-role="tagsinput">
                                </div>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
           

            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="d-flex align-items-center justify-content-between gap-2 mb-3">
                                    <div>
                                        <label for="name" class="title-color text-capitalize font-weight-bold mb-0">{{
                                            translate('posts_thumbnail') }}</label>
                                        <span class="badge badge-soft-info">{{ THEME_RATIO[theme_root_path()]['Posts Image'] }}</span>
                                        <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                            title="{{translate('add_your_posts’s_thumbnail_in')}} JPG, PNG or JPEG {{translate('format_within')}} 2MB">
                                            <img src="{{asset('/public/assets/back-end/img/info-circle.svg')}}" alt="">
                                        </span>
                                    </div>
                                </div>

                                <div>
                                    <div class="custom_upload_input">
                                        <input type="file" name="image" class="custom-upload-input-file" style="aspect-ratio:2/2.9;" id=""
                                            data-imgpreview="pre_img_viewer"
                                            accept=".jpg, .webp, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                            onchange="uploadColorImage(this)">

                                        <span class="delete_file_input btn btn-outline-danger btn-sm square-btn"
                                            style="display: none">
                                            <i class="tio-delete"></i>
                                        </span>

                                        <div class="img_area_with_preview position-absolute z-index-2">
                                            <img id="pre_img_viewer" class="h-auto aspect-1 bg-white" style="aspect-ratio:2/2.9;" src="img"
                                                onerror="this.classList.add('d-none')">
                                        </div>
                                        <div
                                            class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img src="{{asset('public/assets/back-end/img/icons/product-upload-icon.svg')}}"
                                                    class="w-50">
                                                <h3 class="text-muted">{{ translate('Upload_Image') }}</h3>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="row" id="thumbnail"></div> --}}
                                    <p class="text-muted mt-2">{{translate('image_format')}} : Jpg, png, jpeg, webp,
                                        <br>
                                        {{translate('image_size')}} : {{translate('max')}} 2 MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--other image -->
                <div class="additional_image_column col-md-9">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                                <div>
                                    <label for="name" class="title-color text-capitalize font-weight-bold mb-0">{{ translate('upload_image_banner') }}</label>
                                    <span class="badge badge-soft-info">{{ THEME_RATIO[theme_root_path()]['Posts Image'] }}</span>
                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip" title="{{translate('upload_any_photo_for_this_posts_from_here')}}.">
                                        <img src="{{asset('/public/assets/back-end/img/info-circle.svg')}}" alt="">
                                    </span>
                                </div>

                            </div>
                            <p class="text-muted">{{translate('upload_photo_banner')}}</p>

                            <div class="row g-2 justify-content-center" id="add_photo_Section">
                                <div class="col-sm-12 col-md-12">
                                    <div class="custom_upload_input position-relative border-dashed-2">
                                        <input type="file" name="photo" style="aspect-ratio:2;" class="custom-upload-input-file" data-index="1" data-imgpreview="pre_photo_viewer"
                                            accept=".jpg, .png, .webp, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                            onchange="uploadColorImage(this)"
                                            >

                                        <span class="delete_file_input delete_file_input_section btn btn-outline-danger btn-sm square-btn" style="display: none">
                                            <i class="tio-delete"></i>
                                        </span>

                                        <div class="img_area_with_preview position-absolute z-index-2 border-0">
                                            <img id="pre_photo_viewer" class="h-auto aspect-2 bg-white" src="img" onerror="this.classList.add('d-none')">
                                        </div>
                                        <div class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img src="{{asset('public/assets/back-end/img/icons/product-upload-icon.svg')}}" class="w-50">
                                                <h3 class="text-muted">{{ translate('Upload_Image') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--End other image -->
            </div>
            {{-- seo section --}}
            <div class="card mt-3 rest-part">
                <div class="card-header">
                    <div class="d-flex gap-2">
                        <i class="tio-user-big"></i>
                        <h4 class="mb-0">
                            {{ translate('seo_section') }}
                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                data-placement="right"
                                title="{{ translate('add_meta_titles_descriptions_and_images_for_posts').', '.translate('this_will_help_more_people_to_find_them_on_search_engines_and_see_the_right_details_while_sharing_on_other_social_platforms') }}">
                                <img src="{{asset('/public/assets/back-end/img/info-circle.svg')}}" alt="">
                            </span>
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="title-color">
                                    {{ translate('meta_Title') }}
                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                        data-placement="right"
                                        title="{{ translate('add_the_posts_title_name_taglines_etc_here').' '.translate('this_title_will_be_seen_on_Search_Engine_Results_Pages_and_while_sharing_the_posts_link_on_social_platforms') .' [ '. translate('character_Limit') }} : 100 ]">
                                        <img src="{{asset('/public/assets/back-end/img/info-circle.svg')}}" alt="">
                                    </span>
                                </label>
                                <input type="text" name="meta_title" placeholder="{{ translate('meta_Title') }}"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="title-color">
                                    {{ translate('meta_Description') }}
                                    <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                        data-placement="right"
                                        title="{{ translate('write_a_short_description_of_the_InHouse_shops_product').' '.translate('this_description_will_be_seen_on_Search_Engine_Results_Pages_and_while_sharing_the_posts_link_on_social_platforms') .' [ '. translate('character_Limit') }} : 100 ]">
                                        <img src="{{asset('/public/assets/back-end/img/info-circle.svg')}}" alt="">
                                    </span>
                                </label>
                                <textarea rows="4" type="text" name="meta_description" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="d-flex justify-content-center">
                                <div class="form-group w-100">
                                    <div class="d-flex align-items-center justify-content-between gap-2">
                                        <div>
                                            <label class="title-color" for="meta_Image">
                                                {{ translate('meta_Image') }}
                                            </label>
                                            <span class="badge badge-soft-info">{{ THEME_RATIO[theme_root_path()]['Meta Thumbnail'] }}</span>
                                            <span class="input-label-secondary cursor-pointer" data-toggle="tooltip"
                                                title="{{translate('add_Meta_Image_in')}} JPG, PNG or JPEG {{translate('format_within')}} 2MB, {{translate('which_will_be_shown_in_search_engine_results')}}.">
                                                <img src="{{asset('/public/assets/back-end/img/info-circle.svg')}}"
                                                    alt="">
                                            </span>
                                        </div>

                                    </div>

                                    <div>
                                        <div class="custom_upload_input">
                                            <input type="file" name="meta_image"
                                                class="custom-upload-input-file meta-img" id=""
                                                data-imgpreview="pre_meta_image_viewer"
                                                accept=".jpg, .webp, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*"
                                                onchange="uploadColorImage(this)">

                                            <span class="delete_file_input btn btn-outline-danger btn-sm square-btn"
                                                style="display: none">
                                                <i class="tio-delete"></i>
                                            </span>

                                            <div class="img_area_with_preview position-absolute z-index-2">
                                                <img id="pre_meta_image_viewer" class="h-auto bg-white" src="img"
                                                    onerror="this.classList.add('d-none')">
                                            </div>
                                            <div
                                                class="position-absolute h-100 top-0 w-100 d-flex align-content-center justify-content-center">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <img src="{{asset('public/assets/back-end/img/icons/product-upload-icon.svg')}}"
                                                        class="w-50">
                                                    <h3 class="text-muted">{{ translate('Upload_Image') }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-end gap-3 mt-3 mx-1">
                <button type="reset" class="btn btn-secondary px-5">
                    {{ translate("reset") }}
                </button>
                <button type="button" onclick="check()" class="btn btn--primary px-5">
                    {{ translate("submit") }}
                </button>
            </div>
        </form>
        {{-- <button onclick="test()">Test nè</button> --}}
    </div>
</section>
  
@endsection
@push('script')
<script src="{{ asset('public/assets/back-end') }}/js/tags-input.min.js"></script>
<script src="{{ asset('public/assets/back-end/js/spartan-multi-image-picker.js') }}"></script>


<script type="text/javascript" src="{{ asset('public') }}/richtexteditor/rte.js"></script>
<script>RTE_DefaultConfig.url_base='{{ asset('public') }}/richtexteditor'</script>
<script type="text/javascript" src='{{ asset('public') }}/richtexteditor/plugins/all_plugins.js'></script>

<script>
    var editor = new RichTextEditor("#editor");
    function convertBase64ToBlob(htmlCode) {
      // Tạo một phần tử DOM từ chuỗi HTML
      var tempElement = document.createElement('div');
    tempElement.innerHTML = htmlCode;


    var images = tempElement.getElementsByTagName('img');
            for (var i = 0; i < images.length; i++) {
                var img = images[i];
                if (img.src.indexOf('data:') === 0) {
                    var binaryString = atob(img.src.split(',')[1]);
                    var len = binaryString.length;
                    var bytes = new Uint8Array(len);
                    for (var j = 0; j < len; j++) {
                        bytes[j] = binaryString.charCodeAt(j);
                    }
                    var blob = new Blob([bytes], { type: 'image/png' });
                    var url = URL.createObjectURL(blob);
                    img.src = url;
                      // Log thông tin về ảnh đã chuyển đổi
                    console.log("Image converted to blob:", img.src);
                }
            }
            
        // Trả về cả mã HTML và các URL đã thay đổi
        return tempElement.innerHTML;
        }
    // Sử dụng hàm
        // Sử dụng hàm
        function test() {
        var modifiedHTML = convertBase64ToBlob(editor.getHTMLCode());
        console.log("Modified HTML:", modifiedHTML);
    }


</script>

{{-- ck editor --}}
{{-- <script src="{{ asset('/') }}vendor/ckeditor/ckeditor/ckeditor.js"></script>
<script src="{{ asset('/') }}vendor/ckeditor/ckeditor/adapters/jquery.js"></script> --}}
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script> --}}




{{-- <script type="text/javascript" src="{{ asset('public/js/ckfinder/ckfinder.js') }}"></script>
<script>CKFinder.config( { connectorPath: @json(route('ckfinder_connector')) } );</script> --}}

   {{-- CKEditor CDN --}}
  
   {{-- <script>
  
        CKEDITOR.replace( 'editor', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '{{route('ckfinder_browser')}}?Type=Images',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '{{ route('ckfinder_connector') }}?command=QuickUpload&type=Images',
            filebrowserWindowWidth : '1000',
            filebrowserWindowHeight : '700'
        });
    
    </script> --}}

{{-- ck editor --}}
<script>
    function getRequest(route, id, type) {
        $.get({
            url: route,
            dataType: 'json',
            success: function (data) {
                if (type == 'select') {
                    $('#' + id).empty().append(data.select_tag);
                }
            },
        });
    }
    function uploadColorImage(thisData = null){
            if(thisData){
                document.getElementById(thisData.dataset.imgpreview).setAttribute("src", window.URL.createObjectURL(thisData.files[0]));
                document.getElementById(thisData.dataset.imgpreview).classList.remove('d-none');
            }
        }

</script>

<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function() {
            readURL(this);
        });


        function check() {
    Swal.fire({
        title: '{{ translate("are_you_sure") }}?',
        text: '{{ translate("want_to_add_this_product") }}!',
        type: 'warning',
        showCancelButton: true,
        cancelButtonColor: 'default',
        confirmButtonColor: '#377dff',
        cancelButtonText: '{{ translate("no") }}',
        confirmButtonText: '{{ translate("yes") }}',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            var submit_status = 1;
            if (submit_status == 1) {
                var formData = new FormData(document.getElementById('posts_form'));
                var modifiedHTML = convertBase64ToBlob(editor.getHTMLCode());
                formData.append('details', modifiedHTML);

                // Parse modifiedHTML to extract img src attributes
                var tempDiv = document.createElement('div');
                tempDiv.innerHTML = modifiedHTML;
                var imgSrcs = [];
                tempDiv.querySelectorAll('img').forEach(function(img) {
                    imgSrcs.push(img.src);
                });

                // Fetch all images asynchronously
                Promise.all(imgSrcs.map(src => fetch(src).then(response => response.blob())))
                    .then(blobs => {
                        // Append Blob objects to the form data
                        blobs.forEach((blob, index) => {
                            var file = new File([blob], 'image_' + index + '.png', { type: 'image/png' });
                            formData.append('fileImages[]', file);
                        });

                        // Proceed with form submission
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '{{ route('admin.posts.store') }}',
                            method: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                if (data.errors) {
                                    for (var i = 0; i < data.errors.length; i++) {
                                        toastr.error(data.errors[i].message, {
                                            CloseButton: true,
                                            ProgressBar: true
                                        });
                                    }
                                } else {
                                    toastr.success('{{ translate("posts_added_successfully") }}!', {
                                        CloseButton: true,
                                        ProgressBar: true
                                    });
                                    window.location.reload();
                                }
                            }
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching images:', error);
                    });
    
            }
        }
    });
}

</script>
<script>
    $('.delete_file_input').click(function () {
        let $parentDiv = $(this).closest('div');
        $parentDiv.find('input[type="file"]').val('');
        $parentDiv.find('.img_area_with_preview img').attr("src", " ");
        $(this).hide();
    });

    $('.custom-upload-input-file').on('change', function(){
        if (parseFloat($(this).prop('files').length) != 0) {
            let $parentDiv = $(this).closest('div');
            $parentDiv.find('.delete_file_input').fadeIn();
        }
    })
</script>
<script>
    $(".lang_link").click(function (e) {
        e.preventDefault();
        $(".lang_link").removeClass('active');
        $(".lang_form").addClass('d-none');
        $(this).addClass('active');

        let form_id = this.id;
        let lang = form_id.split("-")[0];
      
        $("#" + lang + "-form").removeClass('d-none');
        if (lang == '{{ $default_lang }}') {
            $(".rest-part").removeClass('d-none');
        } else {
            $(".rest-part").addClass('d-none');
        }
    })
</script>
@endpush