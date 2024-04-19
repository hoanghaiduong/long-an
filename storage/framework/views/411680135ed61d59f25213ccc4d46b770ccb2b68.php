

<?php $__env->startSection('title',translate('post_Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <?php if($post['id'] != 0): ?>
        <meta property="og:image" content="<?php echo e(asset('storage/app/public/posts')); ?>/<?php echo e($post->thumbnail); ?>"/>
        <meta property="og:title" content="<?php echo e($post->title); ?> "/>
        <meta property="og:url" content="<?php echo e(route('post_view',[$post['id']])); ?>">
    <?php else: ?>
        <meta property="og:image" content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="og:title" content="<?php echo e($post['name']); ?> "/>
        <meta property="og:url" content="<?php echo e(route('post_view',[$post['id']])); ?>">
    <?php endif; ?>
    <meta property="og:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">

    <?php if($post['id'] != 0): ?>
        <meta property="twitter:card" content="<?php echo e(asset('storage/app/public/posts')); ?>/<?php echo e($post->thumbnail); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('post_view',[$post['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('post_view',[$post['id']])); ?>">
    <?php else: ?>
        <meta property="twitter:card"
              content="<?php echo e(asset('storage/app/public/company')); ?>/<?php echo e($web_config['fav_icon']->value); ?>"/>
        <meta property="twitter:title" content="<?php echo e(route('post_view',[$post['id']])); ?>"/>
        <meta property="twitter:url" content="<?php echo e(route('post_view',[$post['id']])); ?>">
    <?php endif; ?>

    <meta property="twitter:description" content="<?php echo e(substr(strip_tags(str_replace('&nbsp;', ' ', $web_config['about']->value)),0,160)); ?>">


    <link href="<?php echo e(asset('public/assets/front-end')); ?>/css/home.css" rel="stylesheet">
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
            background-color: <?php echo e($web_config['primary_color']); ?>                  !important;
        }

        /*  */
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
 <!-- Page Content-->
 <div class="container py-4 __inline-67">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item<?php echo e(Request::is('/') ? ' active' : ''); ?>" aria-current="page"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item<?php echo e(Request::is('post/*') ? ' active' : ''); ?>" aria-current="page"><?php echo e($post->title); ?></li>
        </ol>
    </nav>
   
    <div class="rtl my-3">
        <h4><?php echo e($post->title); ?></h4>
        <p><?php echo e($post->sub_title); ?></p>
        <a href="#" class="badge badge-light p-2 mb-2 mr-2"> <i class="tio-time"></i> Posted on <?php echo e($post->created_at->format('d-m-Y')); ?></a>
        <div class="badge badge-light p-2">
            <i class="tio-folder"></i>
        </div>
     
            <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('posts', ['tag_id' => $tag->id])); ?>" class="badge badge-light p-2">
                    <?php echo e($tag->tag); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <div class="d-flex">
            <span class="badge badge-light p-2"><i class="tio-invisible"></i>
            <?php echo e($post->view_count); ?> Lượt xem
            </span>
            <div class="badge badge-light p-2 ml-2"><i class="tio-user"></i>
                Người đăng : <a href="<?php echo e(route('posts', ['author_id' => $post->author_id])); ?>" class="font-weight-bold"> <?php echo e($post->author->name); ?></a>
            </div>
        </div>
        
        <div class="card card-body mt-4 rounded-10 w-100">
            <div id="decoded-content">
            <?php echo html_entity_decode($post->details); ?>

            </div>
        </div>
    </div>
  
 </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/posts/view.blade.php ENDPATH**/ ?>