<?php $__env->startSection('title',translate('shop_Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <?php if($shop['id'] != 0): ?>
        <meta property="og:image" content="<?php echo e(asset('storage/app/public/shop')); ?>/<?php echo e($shop->image); ?>"/>
        <meta property="og:title" content="<?php echo e($shop->name); ?> "/>
        <meta property="og:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php else: ?>
        <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="og:title" content="<?php echo e($shop['name']); ?> "/>
        <meta property="og:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php endif; ?>
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <?php if($shop['id'] != 0): ?>
        <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/shop')); ?>/<?php echo e($shop->image); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('shopView',[$shop['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php else: ?>
        <meta property="twitter:card"
              content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('shopView',[$shop['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('shopView',[$shop['id']])); ?>">
    <?php endif; ?>

    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">


    <link href="<?php echo e(asset('public/assets/front-end')); ?>/css/home.css" rel="stylesheet">
    <style>

        .page-item.active .page-link {
            background-color: <?php echo e($web_config['primary_color']); ?>                        !important;
        }

        /*  */
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php ($decimal_point_settings = \App\CPU\Helpers::get_business_settings('decimal_point_settings')); ?>
    <!-- Page Content-->
    <div class="container py-4 __inline-67">
        <div class="rtl">
            <!-- banner  -->
            <div class="bg-white __shop-banner-main">
                <?php if($shop['id'] != 0): ?>
                    <img class="__shop-page-banner"
                            src="<?php echo e(asset('storage/app/public/shop/banner')); ?>/<?php echo e($shop->banner); ?>"
                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                            alt="">
                <?php else: ?>
                    <?php ($banner=\App\CPU\Helpers::get_business_settings('shop_banner')); ?>
                    <img class="__shop-page-banner"
                            src="<?php echo e(asset("storage/app/public/shop")); ?>/<?php echo e($banner??""); ?>"
                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                            alt="">
                <?php endif; ?>
                <!-- seller info+contact -->
                <div class="position-relatve z-index-99 rtl w-100" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="__rounded-10 bg-white position-relative">
                        <div class="d-flex flex-wrap justify-content-between seller-details">
                            <!-- logo -->
                            <div class="d-flex align-items-center p-2 flex-grow-1">
                                <div class="">
                                    <?php if($shop['id'] != 0): ?>
                                        <div class="position-relative">
                                            <?php if($seller_temporary_close || $inhouse_temporary_close): ?>
                                                <span class="temporary-closed-details">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                                            <?php elseif(($seller_id==0 && $inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date) ||
                                            $seller_id!=0 && $seller_vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date): ?>
                                                <span class="temporary-closed-details">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                                            <?php endif; ?>
                                            <img class="__inline-68"
                                                src="<?php echo e(asset('storage/app/public/shop')); ?>/<?php echo e($shop->image); ?>"
                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                alt="">
                                        </div>
                                    <?php else: ?>
                                        <div class="position-relative">
                                            <?php if($seller_temporary_close || $inhouse_temporary_close): ?>
                                                <span class="temporary-closed-details">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                                            <?php elseif(($seller_id==0 && $inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date) ||
                                            $seller_id!=0 && $seller_vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date): ?>
                                                <span class="temporary-closed-details">
                                                    <span><?php echo e(translate('closed_now')); ?></span>
                                                </span>
                                            <?php endif; ?>
                                            <img class="__inline-68"
                                                src="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"
                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                alt="">
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="__w-100px flex-grow-1 <?php echo e(Session::get('direction') === "rtl" ? ' pr-2 pr-sm-4' : ' pl-2 pl-sm-4'); ?>">
                                    <span class="font-weight-bold ">
                                        <?php if($shop['id'] != 0): ?>
                                            <?php echo e($shop->name); ?>

                                        <?php else: ?>
                                            <?php echo e($web_config['name']->value); ?>

                                        <?php endif; ?>
                                    </span>
                                    <div class="">
                                        <div class="d-flex flex-wrap __text-12px py-1 fw-bold" style="color : <?php echo e($web_config['primary_color']); ?>">
                                            <span class="text-nowrap"><?php echo e($total_review); ?> <?php echo e(translate('reviews')); ?> </span>

                                            <span class="__inline-69"></span>

                                            <span class="text-nowrap"><?php echo e($total_order); ?> <?php echo e(translate('orders')); ?></span>
                                            <?php ($minimum_order_amount_status=\App\CPU\Helpers::get_business_settings('minimum_order_amount_status')); ?>
                                            <?php ($minimum_order_amount_by_seller=\App\CPU\Helpers::get_business_settings('minimum_order_amount_by_seller')); ?>
                                            <?php if($minimum_order_amount_status ==1 && $minimum_order_amount_by_seller ==1): ?>
                                                <span class="__inline-69"></span>
                                                <?php if($shop['id'] == 0): ?>
                                                    <?php ($minimum_order_amount=\App\CPU\Helpers::get_business_settings('minimum_order_amount')); ?>
                                                    <span><?php echo e(\App\CPU\Helpers::currency_converter($minimum_order_amount)); ?> <?php echo e(translate('minimum_order_amount')); ?></span>
                                                <?php else: ?>
                                                    <span><?php echo e(\App\CPU\Helpers::currency_converter($shop->seller->minimum_order_amount)); ?> <?php echo e(translate('minimum_order_amount')); ?></span>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php if($i <=$avg_rating): ?>
                                                    <i class="tio-star text-warning"></i>
                                                <?php elseif($avg_rating != 0 && $i <= (int)$avg_rating + 1 && $avg_rating>=((int)$avg_rating+.30)): ?>
                                                    <i class="tio-star-half text-warning"></i>
                                                <?php else: ?>
                                                    <i class="tio-star-outlined text-warning"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            (<span class="ml-1"><?php echo e(round($avg_rating,1)); ?></span>)
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- contact -->
                            <div class="d-flex align-items-center">
                                <div class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-sm-4' : 'mr-sm-4'); ?>">
                                    <?php if($seller_id!=0): ?>
                                        <?php if(auth('customer')->check()): ?>
                                            <div class="d-flex">
                                                <button class="btn btn--primary __inline-70 rounded-10  text-capitalize chat-with-seller-button d-none d-sm-inline-block" data-toggle="modal"
                                                        data-target="#exampleModal" <?php echo e(($shop->temporary_close || ($shop->vacation_status && date('Y-m-d') >= date('Y-m-d', strtotime($shop->vacation_start_date)) && date('Y-m-d') <= date('Y-m-d', strtotime($shop->vacation_end_date)))) ? 'disabled' : ''); ?>>
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/shopview-chat.png')); ?>" loading="eager" class="" alt="">
                                                    <span class="d-none d-sm-inline-block">
                                                        <?php echo e(translate('chat_with_seller')); ?>

                                                    </span>
                                                </button>

                                                <button class="btn bg-transparent border-0 __inline-70 rounded-10  text-capitalize chat-with-seller-button d-sm-inline-block d-md-none" data-toggle="modal"
                                                        data-target="#exampleModal" <?php echo e(($shop->temporary_close || ($shop->vacation_status && date('Y-m-d') >= date('Y-m-d', strtotime($shop->vacation_start_date)) && date('Y-m-d') <= date('Y-m-d', strtotime($shop->vacation_end_date)))) ? 'disabled' : ''); ?>>
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/icons/shopview-chat-blue.svg')); ?>" loading="eager" class="" alt="">
                                                </button>


                                            </div>
                                        <?php else: ?>
                                            <div class="d-flex">
                                                <a href="<?php echo e(route('customer.auth.login')); ?>"
                                                class="btn btn--primary __inline-70 rounded-10  text-capitalize chat-with-seller-button">
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/shopview-chat.png')); ?>" loading="eager" class="" alt="">
                                                    <span class="d-none d-sm-inline-block">
                                                        <?php echo e(translate('chat_with_seller')); ?>

                                                    </span>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-3 justify-content-sm-between py-4" dir="<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
            <div class="d-flex flex-wrap justify-content-between align-items-center w-max-md-100 me-auto gap-3">
                <h3 class="widget-title align-self-center font-bold __text-18px my-0"><?php echo e(translate('categories')); ?></h3>
                <div class="filter-ico-button btn btn--primary p-2 m-0 d-lg-none d-flex align-items-center">
                    <i class="tio-filter"></i>
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row gap-3">
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
                                value="low-high"><?php echo e(translate('low_to_High_Price')); ?> </option>
                            <option
                                value="high-low"><?php echo e(translate('high_to_Low_Price')); ?></option>
                            <option
                                value="a-z"><?php echo e(translate('A_to_Z_Order')); ?></option>
                            <option
                                value="z-a"><?php echo e(translate('Z_to_A_Order')); ?></option>
                        </select>
                    </div>
                </form>
                <!-- shopView -->
                <form method="get" action="<?php echo e(route('shopView',['id'=>$seller_id])); ?>">
                    <div class="search_form input-group search-form-input-group">
                        <input type="hidden" name="category_id" value="<?php echo e(request('category_id')); ?>" >
                        <input type="hidden" name="sub_category_id" value="<?php echo e(request('sub_category_id')); ?>" >
                        <input type="hidden" name="sub_sub_category_id" value="<?php echo e(request('sub_sub_category_id')); ?>" >
                        <input type="text" class="form-control rounded-left" name="product_name" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" value="<?php echo e(request('product_name')); ?>" placeholder="<?php echo e(translate('search_products_from_this_store')); ?>">
                        <button type="submit" class="btn--primary btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <div class="row rtl">
            <div class="col-lg-3 mr-0 <?php echo e(Session::get('direction') === "rtl" ? 'pl-4' : 'pr-4'); ?>">
                <aside class="SearchParameters" id="SearchParameters">
                    <!-- Categories Sidebar-->
                    <div class="__shop-page-sidebar">
                        <div class="cz-sidebar-header">
                            <button class="close <?php echo e(Session::get('direction') === "rtl" ? 'mr-auto' : 'ml-auto'); ?>" type="button" data-dismiss="sidebar" aria-label="Close">
                                <i class="tio-clear"></i>
                            </button>
                        </div>
                        <div class="accordion __cate-side-arrordion">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="menu--caret-accordion">

                                <div class="card-header flex-between">
                                    <div>
                                        <label class="for-hover-lable cursor-pointer" onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'category_id'=>$category['id']])); ?>'">
                                            <?php echo e($category['name']); ?>

                                        </label>
                                    </div>
                                    <div class="px-2 cursor-pointer menu--caret">
                                        <strong class="pull-right for-brand-hover">
                                            <?php if($category->childes->count()>0): ?>
                                                <i class="tio-next-ui fs-13"></i>
                                            <?php endif; ?>
                                        </strong>
                                    </div>
                                </div>
                                <div class="card-body p-0 <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?>"
                                        id="collapse-<?php echo e($category['id']); ?>"
                                        style="display: none">
                                    <?php $__currentLoopData = $category->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="menu--caret-accordion">
                                            <div class="for-hover-lable card-header flex-between">
                                                <div>
                                                    <label class="cursor-pointer" onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'sub_category_id'=>$child['id']])); ?>'">
                                                        <?php echo e($child['name']); ?>

                                                    </label>
                                                </div>
                                                <div class="px-2 cursor-pointer menu--caret">
                                                    <strong class="pull-right">
                                                        <?php if($child->childes->count()>0): ?>
                                                            <i class="tio-next-ui fs-13"></i>
                                                        <?php endif; ?>
                                                    </strong>
                                                </div>
                                            </div>
                                            <div class="card-body p-0 <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?>"
                                                id="collapse-<?php echo e($child['id']); ?>"
                                                style="display: none">
                                                <?php $__currentLoopData = $child->childes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="card-header">
                                                        <label class="for-hover-lable d-block cursor-pointer text-left" onclick="location.href='<?php echo e(route('shopView',['id'=> $seller_id,'sub_sub_category_id'=>$ch['id']])); ?>'">
                                                            <?php echo e($ch['name']); ?>

                                                        </label>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </aside>
            </div>
            
            <div class="col-lg-9 product-div">
                <!-- Products grid-->
                <?php if(count($products) > 0): ?>
                    <div class="row g-3" id="ajax-products">
                        <?php echo $__env->make('web-views.products._ajax-products',['products'=>$products,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center pt-5 text-capitalize">
                        <img src="<?php echo e(asset('public/assets/front-end/img/icons/product.svg')); ?>" alt="">
                        <h5><?php echo e(translate('no_product_found')); ?>!</h5>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <span id="filter_url" data-url="<?php echo e(url('/')); ?>/shopView/<?php echo e($shop['id']); ?>"></span>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-faded-info">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(translate('Send_Message_to_seller')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('messages_store')); ?>" method="post" id="chat-form">
                        <?php echo csrf_field(); ?>
                        <?php if($shop['id'] != 0): ?>
                            <input value="<?php echo e($shop->id); ?>" name="shop_id" hidden>
                            <input value="<?php echo e($shop->seller_id); ?>}" name="seller_id" hidden>
                        <?php endif; ?>

                        <textarea name="message" class="form-control" required placeholder="<?php echo e(translate('Write_here')); ?>..."></textarea>
                        <br>

                        <div class="justify-content-end gap-2 d-flex flex-wrap">
                            <a href="<?php echo e(route('chat', ['type' => 'seller'])); ?>" class="btn btn-soft-primary bg--secondary border">
                                <?php echo e(translate('go_to_chatbox')); ?>

                            </a>
                            <?php if($shop['id'] != 0): ?>
                                <button
                                    class="btn btn--primary text-white"><?php echo e(translate('send')); ?></button>
                            <?php else: ?>
                                <button class="btn btn--primary text-white"
                                        disabled><?php echo e(translate('send')); ?></button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.filter-ico-button').on('click', function(){
            $('.__shop-page-sidebar').toggleClass('active')
        })
        $('.close').on('click', function(){
            $('.__shop-page-sidebar').removeClass('active')
        })
    </script>

    <script>
        $('#chat-form').on('submit', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: '<?php echo e(route('messages_store')); ?>',
                data: $('#chat-form').serialize(),
                success: function (respons) {

                    toastr.success('<?php echo e(translate("send_successfully")); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#chat-form').trigger('reset');
                }
            });

        });
    </script>
    <script>
		$(".menu--caret").on("click", function (e) {
			var element = $(this).closest(".menu--caret-accordion");
			if (element.hasClass("open")) {
				element.removeClass("open");
				element.find(".menu--caret-accordion").removeClass("open");
				element.find(".card-body").slideUp(300, "swing");
			} else {
				element.addClass("open");
				element.children(".card-body").slideDown(300, "swing");
				element.siblings(".menu--caret-accordion").children(".card-body").slideUp(300, "swing");
				element.siblings(".menu--caret-accordion").removeClass("open");
				element.siblings(".menu--caret-accordion").find(".menu--caret-accordion").removeClass("open");
				element.siblings(".menu--caret-accordion").find(".card-body").slideUp(300, "swing");
			}
		});
        function sort_by_data(value) {
            $.get({
                url: $("#filter_url").data("url"),
                data: {
                    sort_by: value,
                    category_id : '<?php echo e(request('category_id')); ?>',
                    sub_category_id : '<?php echo e(request('sub_category_id')); ?>',
                    sub_sub_category_id : '<?php echo e(request('sub_sub_category_id')); ?>',
                    product_name : '<?php echo e(request('product_name')); ?>',

                },
                dataType: 'json',
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (response) {
                    $('#ajax-products').html(response.view);
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/shop-page.blade.php ENDPATH**/ ?>