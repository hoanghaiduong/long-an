@extends('layouts.front-end.app')

@section('title', translate('All_Seller_Page'))

@push('css_or_js')
    
<link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/owl.carousel.min.css"/>
<link rel="stylesheet" href="{{asset('public/assets/front-end')}}/css/owl.theme.default.min.css"/>

    <meta property="og:image" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="og:title" content="Brands of {{$web_config['name']->value}} "/>
    <meta property="og:url" content="{{env('APP_URL')}}">
    <meta property="og:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">

    <meta property="twitter:card" content="{{asset('storage/app/public/company')}}/{{$web_config['web_logo']->value}}"/>
    <meta property="twitter:title" content="Brands of {{$web_config['name']->value}}"/>
    <meta property="twitter:url" content="{{env('APP_URL')}}">
    <meta property="twitter:description" content="{{ substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160) }}">
    <style>
        .page-item.active .page-link {
            background-color: {{$web_config['primary_color']}}    !important;
        }
        .card-container {
        border-color: #f4f4f4;
        box-shadow: 0px 5px 10px rgba(51, 66, 87, 0.05);
        transition: all 0.3s ease;
        }
        .card-img-top {
            width: 100%;
            height: 10vw;
            object-fit: cover;
           
        }
        .two-row-truncate {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            white-space: normal; /* Set to 'normal' to wrap text */
            -webkit-line-clamp: 2; /* Limit to 2 lines */
            text-overflow: ellipsis;
            
        }
        .feature-item-title {
            text-align: center;
            font-size: 22px;
            margin-top: 15px;
            font-style: normal;
            font-weight: 700;
          
        }
        .img-event{
            object-fit: cover;
            width: 100%;
            height: 315px;
        }
        .pagination{
            display: inline-flex;
        }
        @media (min-width: 768px) {
            .top-slider-images .__slide-img {
                height: 340px;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: left center;
                object-position: left center;
            }
        }
        @media (min-width: 992px) {
            .top-slider-images .__slide-img {
                height: 386px;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: left center;
                object-position: left center;
            }
        }
        @media (max-width: 767px) {
            .__slide-img {
                height: 240px;
                width: 100%;
                -o-object-fit: cover;
                object-fit: cover;
                -o-object-position: left center;
                object-position: left center;
            }
        }
    </style>
@endpush

@section('content')
     <!-- Page Content-->
     <div class="container mb-md-4 {{Session::get('direction') === "rtl" ? 'rtl' : ''}} __inline-65">
        <div class="bg-primary-light rounded-10 my-4 mx-2 p-3 p-sm-4" data-bg-img="{{ asset('public/assets/front-end/img/media/bg.png') }}">
            <div class="row g-2 align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex flex-column gap-1 text-primary">
                        <h4 class="mb-0 text-start fw-bold text-primary text-uppercase">{{ translate('all_posts') }}</h4>
                        <p class="fs-14 fw-semibold mb-0">{{translate('Find all articles according to your wishes')}}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <form 
                     action="{{route('posts')}}" 
                    >
                        <div class="input-group">
                            <input type="text" class="form-control rounded-10" value="{{request('search')}}"  placeholder="{{translate('Search_Posts')}}" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded-10" type="submit">{{translate('search')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row mb-4 g-2 no-gutters __inline-61 position-relative rtl">
                
                <div class="col-12 col-xl-8 top-slider-images">  
                    <div class="card">
                                <div class="{{Session::get('direction') === "rtl" ? '' : ''}}">
                                    <div class="owl-theme owl-carousel posts-slider">
                                        @foreach($posts as $index=>$post)
                                        <a href="" class="d-block">
                                            <div class="position-absolute w-100  p-lg-4 p-sm-2" style="bottom: 0px;left: 0px; z-index: 10;background: rgba(255, 255, 255, 0.1);">
                                                <h5 class="text-white two-row-truncate">{{$post->title}}</h5>
                                                <p class="text-white two-row-truncate">{{$post->sub_title}}</p>
                                                <p class="text-white two-row-truncate">{{$post->created_at->format('d-m-Y')}}</p>
                                             
                                            </div>
                                         
                                            <img class="w-100 __slide-img rounded"
                                            onerror="this.src='{{asset('public/assets/front-end/img/image-place-holder.png')}}'"
                                            src="{{asset('storage/app/public/posts/photo/'.$post->photo??'')}}"
                                            alt="">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                    </div>
                </div>
          
            <div class="col-12 col-xl-4">  
                <div class="bg-primary-light rounded-10 mb-3 p-3" data-bg-img="{{ asset('public/assets/front-end/img/media/bg.png') }}">
                   <span class="font-weight-bold text-uppercase" style="color: {{$web_config['primary_color']}}!important">SỰ KIỆN </span>
                   <span class="badge badge-light radius-50 fz-full ml-1">{{ $latestEventPost ? $latestEventPost->count() : 0 }}</span>
                    <div class="float-right">
                        <a class="text-capitalize view-all-text" href="{{route('products',['data_from'=>'featured','page'=>1])}}" style="color: {{$web_config['primary_color']}}!important">
                            {{ translate('view_all')}}
                            <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'}}"></i>
                        </a>
                    </div>
                </div>
          
                 <div class="rounded-10">
                        <img class="img-event" src="{{$latestEventPost!==null ? asset('storage/app/public/posts/thumbnail/' . $latestEventPost->photo) :  asset('public/assets/front-end/img/image-place-holder.png')}}" height="300" alt="">
                </div>   
              

                {{-- <div class="rounded-10">
                    <img src="{{ asset('storage/app/public/posts/thumbnail/' . $latestEventPost->thumbnail) }}" height="300" alt="" onerror="this.src='{{ asset('public/assets/front-end/img/image-place-holder.png') }}'">
                </div>
                 --}}
            </div>
            
        </div>
        <div class="d-flex flex-wrap gap-3 pb-4 mx-2 justify-content-sm-between" dir="{{Session::get('direction') === "rtl" ? 'right' : 'left'}}">
            <div class="d-flex flex-wrap justify-content-between align-items-center w-max-md-100 me-auto gap-3">
                <h3 class="widget-title align-self-center font-bold __text-18px my-0">{{translate('filter')}}</h3>
                <div class="filter-ico-button btn btn--primary p-2 m-0 d-lg-none d-flex align-items-center">
                    <i class="tio-filter"></i>
                </div>
            </div>
            <span id="filter_url" data-url="{{url('/')}}/posts"></span>
            <div class="d-flex flex-column flex-sm-row gap-3"> 
                <form>
                    <div class="sorting-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M11.6667 7.80078L14.1667 5.30078L16.6667 7.80078" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.91675 4.46875H4.58341C4.3533 4.46875 4.16675 4.6553 4.16675 4.88542V8.21875C4.16675 8.44887 4.3533 8.63542 4.58341 8.63542H7.91675C8.14687 8.63542 8.33341 8.44887 8.33341 8.21875V4.88542C8.33341 4.6553 8.14687 4.46875 7.91675 4.46875Z" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.91675 11.9688H4.58341C4.3533 11.9688 4.16675 12.1553 4.16675 12.3854V15.7188C4.16675 15.9489 4.3533 16.1354 4.58341 16.1354H7.91675C8.14687 16.1354 8.33341 15.9489 8.33341 15.7188V12.3854C8.33341 12.1553 8.14687 11.9688 7.91675 11.9688Z" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.1667 5.30078V15.3008" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <label class="for-shoting" for="sorting">
                            <span class="text-nowrap">{{translate('author')}}</span>
                        </label>
                
                        <select name="author_id" onchange="filter_data(this.value)">
                            @if($adminsWithPostsManagementAccess->count() > 0)
                                @foreach($adminsWithPostsManagementAccess as $admin)
                                <option value="{{$admin->id}}">{{$admin->name}}</option>
                                @endforeach
                            @else
                                <option disabled hidden>{{ translate('No options available') }}</option>
                            @endif
                        </select>
                    </div>
                </form>
                <!-- Static Filter Form -->
                <form>
                    <div class="sorting-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path d="M11.6667 7.80078L14.1667 5.30078L16.6667 7.80078" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.91675 4.46875H4.58341C4.3533 4.46875 4.16675 4.6553 4.16675 4.88542V8.21875C4.16675 8.44887 4.3533 8.63542 4.58341 8.63542H7.91675C8.14687 8.63542 8.33341 8.44887 8.33341 8.21875V4.88542C8.33341 4.6553 8.14687 4.46875 7.91675 4.46875Z" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M7.91675 11.9688H4.58341C4.3533 11.9688 4.16675 12.1553 4.16675 12.3854V15.7188C4.16675 15.9489 4.3533 16.1354 4.58341 16.1354H7.91675C8.14687 16.1354 8.33341 15.9489 8.33341 15.7188V12.3854C8.33341 12.1553 8.14687 11.9688 7.91675 11.9688Z" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M14.1667 5.30078V15.3008" stroke="#D9D9D9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <label class="for-shoting" for="sorting">
                            <span class="text-nowrap">{{translate('sort_by')}}</span>
                        </label>
                        <select onchange="sort_by_data(this.value)">
                            <option value="latest">{{translate('latest')}}</option>
                            <option
                                value="created_at_asc">{{translate('Created_at_ASC')}} </option>
                            <option
                                value="created_at_desc">{{translate('Created_at_DESC')}}</option>
                            <option
                                value="a-z">{{translate('A_to_Z_Title')}}</option>
                            <option
                                value="z-a">{{translate('Z_to_A_Title')}}</option>
                        </select>
                    </div>
                </form>
               
                <form method="get" 
                 action="{{route('posts')}}" 
                >
                    <div class="search_form input-group search-form-input-group">
                   
                        <input type="text" class="form-control rounded-left" name="search" style="text-align: {{Session::get('direction') === "rtl" ? 'right' : 'left'}};" value="{{request('search')}}" placeholder="{{translate('search_posts')}}">
                        <button type="submit" class="btn--primary btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card p-3  mx-2 p-sm-4">
            <div class="row">
                <!-- Content  -->
                <section class="col-lg-12">
                    <div class="pt-3 my-3">
                        <div class="feature-item-title mt-0"  style="color: {{$web_config['primary_color']}}">
                            {{ translate('recent_articles') }}
                        </div>
                        <div class="text-end px-3 d-none d-md-block">
                            <a class="text-capitalize view-all-text" 
                         
                             style="color: {{$web_config['primary_color']}}!important"
                            >
                                {{ translate('view_all')}}
                                <i class="czi-arrow-{{Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'}}"></i>
                            </a>
                        </div>
                    </div>

                        <!-- Posts grid-->
                        @if (count($posts) > 0)
                            <div class="row g-4" id="ajax-posts">
                                @include('web-views.posts._ajax-posts',['posts'=>$posts])
                            </div>
                        @else
                            <div class="text-center pt-5 text-capitalize">
                                <img src="{{asset('public/assets/front-end/img/icons/product.svg')}}" alt="">
                                <h5>{{translate('no_posts_found')}}!</h5>
                            </div>
                        @endif
                   
                </section>
            </div>
         
            <div class="row mt-3">
                <div class="col-md-12">
                    <center>
                        {{ $posts->links() }}
                    </center>
                </div>
            </div>
         
        </div>
      
        
     </div>
@endsection

@push('script')
<!-- Owl Carousel -->
<script src="{{asset('public/assets/front-end')}}/js/owl.carousel.min.js"></script>
<script>
    $('.posts-slider').owlCarousel({
        loop: false,
        autoplay: false,
        margin: 20,
        nav: true,
        navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
        dots: true,
        autoplayHoverPause: false,
        // '{{session('direction')}}': false,
        // center: true,
        items: 1
    });
    function filter_data(value)
    {
        $.get({
                url: $("#filter_url").data("url"),
                data: {
                 
                    author_id :value,
                  
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-posts').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
    }
    function sort_by_data(value) {
            $.get({
                url: $("#filter_url").data("url"),
                data: {
                    sort_by: value,
                    // post_type_id : '{{request('post_type_id')}}',
                    // search : '{{request('search')}}',
                    // filter : '{{request('filter')}}',
                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-posts').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
</script>
@endpush
