@extends('layouts.front-end.app')

@section('title',translate('post_Page'))

@push('css_or_js')
    @if($post['id'] != 0)
        <meta property="og:image" content="{{asset('storage/app/public/posts')}}/{{$post->thumbnail}}"/>
        <meta property="og:title" content="{{$post->title}} "/>
        <meta property="og:url" content="{{route('post_view',[$post['id']])}}">
    @else
        <meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}"/>
        <meta property="og:title" content="{{ $post['name']}} "/>
        <meta property="og:url" content="{{route('post_view',[$post['id']])}}">
    @endif
    <meta property="og:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    @if($post['id'] != 0)
        <meta property="twitter:card" content="{{asset('storage/app/public/posts')}}/{{$post->thumbnail}}"/>
        <meta property="twitter:title" content="{{route('post_view',[$post['id']])}}"/>
        <meta property="twitter:url" content="{{route('post_view',[$post['id']])}}">
    @else
        <meta property="twitter:card"
              content="{{asset('storage/app/public/company')}}/{{$web_config['fav_icon']->value}}"/>
        <meta property="twitter:title" content="{{route('post_view',[$post['id']])}}"/>
        <meta property="twitter:url" content="{{route('post_view',[$post['id']])}}">
    @endif

    <meta property="twitter:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">


    <link href="{{asset('public/assets/front-end')}}/css/home.css" rel="stylesheet">
    <style>
            .__post-banner-main {
                position: relative;
                padding: 70px 10px 10px;
                min-height: 500px;
                display: flex;
                align-items: flex-end;
                justify-content: center;
            }
            .__post-banner-main .__post-page-banner {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                max-height: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: center center;
                object-position: center center;
            }

        .page-item.active .page-link {
            background-color: {{$web_config['primary_color']}}                  !important;
        }

        /*  */
    </style>
@endpush

@section('content')
 <!-- Page Content-->
 <div class="container py-4 __inline-67">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item{{ Request::is('/') ? ' active' : '' }}" aria-current="page"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item{{ Request::is('post/*') ? ' active' : '' }}" aria-current="page">{{$post->title}}</li>
        </ol>
    </nav>
   
    <div class="rtl my-3">
        <h4>{{$post->title}}</h4>
        <p>{{$post->sub_title}}</p>
        <a href="#" class="badge badge-light p-2 mb-2 mr-2"> <i class="tio-time"></i> Posted on {{$post->created_at->format('d-m-Y')}}</a>
        <div class="badge badge-light p-2">
            <i class="tio-folder"></i>
        </div>
     
            @foreach($post->tags as $key=>$tag)
            <a href="{{ route('posts', ['tag_id' => $tag->id]) }}" class="badge badge-light p-2">
                    {{$tag->tag}}
            </a>
            @endforeach
        
        <div class="d-flex">
            <span class="badge badge-light p-2"><i class="tio-invisible"></i>
            {{$post->view_count}} Lượt xem
            </span>
            <div class="badge badge-light p-2 ml-2"><i class="tio-user"></i>
                Người đăng : <a href="{{ route('posts', ['author_id' => $post->author_id]) }}" class="font-weight-bold"> {{$post->author->name}}</a>
            </div>
        </div>
        {{-- body --}}
        <div class="card card-body mt-4 rounded-10 w-100">
            <div id="decoded-content">
            {!! html_entity_decode($post->details) !!}
            </div>
        </div>
    </div>
  
 </div>

@endsection

@push('script')
 <script>
  $(document).ready(function() {
    // Chọn tất cả các phần tử con trong #decoded-content
    $('#decoded-content *').each(function() {
        // Kiểm tra xem phần tử hiện tại không phải là hình ảnh
        if (!$(this).is('img')) {
            $(this).css('width', '100%'); // Thiết lập chiều rộng 100%
           
        }
       // Kiểm tra xem phần tử hiện tại là thẻ a
       if ($(this).is('a')) {
            $(this).attr('target', '_blank'); // Thiết lập attribute target để mở trong tab mới
        }
    });
});
 </script>
@endpush
