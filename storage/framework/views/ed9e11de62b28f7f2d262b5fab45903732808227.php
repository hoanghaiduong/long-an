<?php $__env->startSection('title', translate('All_Seller_Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
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
        /**/
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page Content-->
    <div class="container mb-md-4 <?php echo e(Session::get('direction') === "rtl" ? 'rtl' : ''); ?> __inline-65">
        <div class="bg-primary-light rounded-10 my-4 p-3 p-sm-4" data-bg-img="<?php echo e(asset('public/assets/front-end/img/media/bg.png')); ?>">
            <div class="row g-2 align-items-center">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex flex-column gap-1 text-primary">
                        <h4 class="mb-0 text-start fw-bold text-primary text-uppercase"><?php echo e(translate('all_Stores')); ?></h4>
                        <p class="fs-14 fw-semibold mb-0"><?php echo e(translate('Find your desired stores and shop your favourite products')); ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <form action="<?php echo e(route('search-shop')); ?>">
                        <div class="input-group">
                            <input type="text" class="form-control rounded-10" value="<?php echo e(request('shop_name')); ?>"  placeholder="<?php echo e(translate('Search_Store')); ?>" name="shop_name">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary rounded-10" type="submit"><?php echo e(translate('search')); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Content  -->
            <section class="col-lg-12">
                <!-- Products grid-->
                <div class="row mx-n2 __min-h-200px">
                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php ($current_date = date('Y-m-d')); ?>
                        <?php ($start_date = date('Y-m-d', strtotime($seller['vacation_start_date']))); ?>
                        <?php ($end_date = date('Y-m-d', strtotime($seller['vacation_end_date']))); ?>

                        <div class="col-lg-3 col-md-6 col-sm-12 px-2 pb-4 text-center">
                            <a href="<?php echo e(route('shopView',['id'=>$seller['id']])); ?>" class="others-store-card text-capitalize">
                                <div class="overflow-hidden other-store-banner">
                                    <img src="<?php echo e(asset('storage/app/public/shop/banner/'.$seller->banner)); ?>"
                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/seller-banner.png')); ?>'"
                                         class="w-100 h-100 object-cover" alt="">
                                </div>
                                <div class="name-area">
                                    <div class="position-relative">
                                        <div class="overflow-hidden other-store-logo rounded-full">
                                            <img class="rounded-full" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                 src="<?php echo e(asset('storage/app/public/shop/'.$seller->image)); ?>" alt="others-store">
                                        </div>
                                        <!-- Temporary Closed Store Status -->
                                        <?php if($seller->temporary_close || ($seller->vacation_status && ($current_date >= $seller->vacation_start_date) && ($current_date <= $seller->vacation_end_date))): ?>
                                            <span class="temporary-closed position-absolute text-center rounded-full">
                                                <span><?php echo e(translate('closed_now')); ?></span>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="info pt-2">
                                        <h5 class="text-start"><?php echo e($seller->name); ?></h5>
                                        <div class="d-flex align-items-center">
                                            <h6 style="color:<?php echo e($web_config['primary_color']); ?>"><?php echo e(number_format($seller->average_rating,1)); ?></h6>
                                            <i class="tio-star text-star mx-1"></i>
                                            <small><?php echo e(translate('rating')); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-area">
                                    <div class="info-item">
                                        <h6 style="color:<?php echo e($web_config['primary_color']); ?>"><?php echo e($seller->review_count < 1000 ? $seller->review_count : number_format($seller->review_count/1000 , 1).'K'); ?></h6>
                                        <span><?php echo e(translate('reviews')); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <h6 style="color:<?php echo e($web_config['primary_color']); ?>"><?php echo e($seller->product_count < 1000 ? $seller->product_count : number_format($seller->product_count/1000 , 1).'K'); ?></h6>
                                        <span><?php echo e(translate('products')); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="row mx-n2">
                    <div class="col-md-12">
                        <center>
                            <?php echo e($sellers->links()); ?>

                        </center>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/sellers.blade.php ENDPATH**/ ?>