

<?php $__env->startSection('title', translate('All_Seller_Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    
<link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/owl.carousel.min.css"/>
<link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end')); ?>/css/owl.theme.default.min.css"/>

    <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="og:title" content="Brands of <?php echo e($web_config['name']->value); ?> "/>
    <meta property="og:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['web_logo']->value); ?>"/>
    <meta property="twitter:title" content="Brands of <?php echo e($web_config['name']->value); ?>"/>
    <meta property="twitter:url" content="<?php echo e(env('APP_URL')); ?>">
    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">
    <style>
        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>    !important;
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
     <!-- Page Content-->
     <div class="container mb-md-4 <?php echo e(Session::get('direction') === "rtl" ? 'rtl' : ''); ?> __inline-65">
        <div class="bg-primary-light rounded-10 my-4 mx-2 p-3 p-sm-4" data-bg-img="<?php echo e(asset('public/assets/front-end/img/media/bg.png')); ?>">
            <div class="row g-2 align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex flex-column gap-1 text-primary">
                        <h4 class="mb-0 text-start fw-bold text-primary text-uppercase"><?php echo e(translate('all_posts')); ?></h4>
                        <p class="fs-14 fw-semibold mb-0"><?php echo e(translate('Find all articles according to your wishes')); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <form 
                     action="<?php echo e(route('posts')); ?>" 
                    >
                        <div class="input-group">
                            <input type="text" class="form-control rounded-10" value="<?php echo e(request('search')); ?>"  placeholder="<?php echo e(translate('Search_Posts')); ?>" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded-10" type="submit"><?php echo e(translate('search')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row mb-4 g-2 no-gutters __inline-61 position-relative rtl">
                
                <div class="col-12 col-xl-8 top-slider-images">  
                    <div class="card">
                                <div class="<?php echo e(Session::get('direction') === "rtl" ? '' : ''); ?>">
                                    <div class="owl-theme owl-carousel posts-slider">
                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="" class="d-block">
                                            <div class="position-absolute w-100  p-lg-4 p-sm-2" style="bottom: 0px;left: 0px; z-index: 10;background: rgba(255, 255, 255, 0.1);">
                                                <h5 class="text-white two-row-truncate"><?php echo e($post->title); ?></h5>
                                                <p class="text-white two-row-truncate"><?php echo e($post->sub_title); ?></p>
                                                <p class="text-white two-row-truncate"><?php echo e($post->created_at->format('d-m-Y')); ?></p>
                                             
                                            </div>
                                         
                                            <img class="w-100 __slide-img rounded"
                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(asset('storage/app/public/posts/photo/'.$post->photo??'')); ?>"
                                            alt="">
                                        </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                    </div>
                </div>
          
            <div class="col-12 col-xl-4">  
                <div class="bg-primary-light rounded-10 mb-3 p-3" data-bg-img="<?php echo e(asset('public/assets/front-end/img/media/bg.png')); ?>">
                   <span class="font-weight-bold text-uppercase" style="color: <?php echo e($web_config['primary_color']); ?>!important">SỰ KIỆN </span>
                   <span class="badge badge-light radius-50 fz-full ml-1"><?php echo e($latestEventPost ? $latestEventPost->count() : 0); ?></span>
                    <div class="float-right">
                        <a class="text-capitalize view-all-text" href="<?php echo e(route('products',['data_from'=>'featured','page'=>1])); ?>" style="color: <?php echo e($web_config['primary_color']); ?>!important">
                            <?php echo e(translate('view_all')); ?>

                            <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'); ?>"></i>
                        </a>
                    </div>
                </div>
          
                 <div class="rounded-10">
                        <img class="img-event" src="<?php echo e($latestEventPost!==null ? asset('storage/app/public/posts/thumbnail/' . $latestEventPost->photo) :  asset('public/assets/front-end/img/image-place-holder.png')); ?>" height="300" alt="">
                </div>   
              

                
            </div>
            
        </div>
        <div class="d-flex flex-wrap gap-3 pb-4 mx-2 justify-content-sm-between" dir="<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
            <div class="d-flex flex-wrap justify-content-between align-items-center w-max-md-100 me-auto gap-3">
                <h3 class="widget-title align-self-center font-bold __text-18px my-0"><?php echo e(translate('filter')); ?></h3>
                <div class="filter-ico-button btn btn--primary p-2 m-0 d-lg-none d-flex align-items-center">
                    <i class="tio-filter"></i>
                </div>
            </div>
            <span id="filter_url" data-url="<?php echo e(url('/')); ?>/posts"></span>
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
                            <span class="text-nowrap"><?php echo e(translate('author')); ?></span>
                        </label>
                
                        <select name="author_id" onchange="filter_data(this.value)">
                            <?php if($adminsWithPostsManagementAccess->count() > 0): ?>
                                <?php $__currentLoopData = $adminsWithPostsManagementAccess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($admin->id); ?>"><?php echo e($admin->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <option disabled hidden><?php echo e(translate('No options available')); ?></option>
                            <?php endif; ?>
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
                            <span class="text-nowrap"><?php echo e(translate('sort_by')); ?></span>
                        </label>
                        <select onchange="sort_by_data(this.value)">
                            <option value="latest"><?php echo e(translate('latest')); ?></option>
                            <option
                                value="created_at_asc"><?php echo e(translate('Created_at_ASC')); ?> </option>
                            <option
                                value="created_at_desc"><?php echo e(translate('Created_at_DESC')); ?></option>
                            <option
                                value="a-z"><?php echo e(translate('A_to_Z_Title')); ?></option>
                            <option
                                value="z-a"><?php echo e(translate('Z_to_A_Title')); ?></option>
                        </select>
                    </div>
                </form>
               
                <form method="get" 
                 action="<?php echo e(route('posts')); ?>" 
                >
                    <div class="search_form input-group search-form-input-group">
                   
                        <input type="text" class="form-control rounded-left" name="search" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" value="<?php echo e(request('search')); ?>" placeholder="<?php echo e(translate('search_posts')); ?>">
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
                        <div class="feature-item-title mt-0"  style="color: <?php echo e($web_config['primary_color']); ?>">
                            <?php echo e(translate('recent_articles')); ?>

                        </div>
                        <div class="text-end px-3 d-none d-md-block">
                            <a class="text-capitalize view-all-text" 
                         
                             style="color: <?php echo e($web_config['primary_color']); ?>!important"
                            >
                                <?php echo e(translate('view_all')); ?>

                                <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1' : 'right ml-1'); ?>"></i>
                            </a>
                        </div>
                    </div>

                        <!-- Posts grid-->
                        <?php if(count($posts) > 0): ?>
                            <div class="row g-4" id="ajax-posts">
                                <?php echo $__env->make('web-views.posts._ajax-posts',['posts'=>$posts], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center pt-5 text-capitalize">
                                <img src="<?php echo e(asset('public/assets/front-end/img/icons/product.svg')); ?>" alt="">
                                <h5><?php echo e(translate('no_posts_found')); ?>!</h5>
                            </div>
                        <?php endif; ?>
                   
                </section>
            </div>
         
            <div class="row mt-3">
                <div class="col-md-12">
                    <center>
                        <?php echo e($posts->links()); ?>

                    </center>
                </div>
            </div>
         
        </div>
      
        
     </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<!-- Owl Carousel -->
<script src="<?php echo e(asset('public/assets/front-end')); ?>/js/owl.carousel.min.js"></script>
<script>
    $('.posts-slider').owlCarousel({
        loop: false,
        autoplay: false,
        margin: 20,
        nav: true,
        navText: ["<i class='czi-arrow-left'></i>", "<i class='czi-arrow-right'></i>"],
        dots: true,
        autoplayHoverPause: false,
        // '<?php echo e(session('direction')); ?>': false,
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
                    // post_type_id : '<?php echo e(request('post_type_id')); ?>',
                    // search : '<?php echo e(request('search')); ?>',
                    // filter : '<?php echo e(request('filter')); ?>',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/posts.blade.php ENDPATH**/ ?>