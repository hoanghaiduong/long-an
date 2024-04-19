
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
    <div class="<?php echo e(Request::is('posts*')?'col-lg-3 col-md-4 col-sm-12 col-6':''); ?>">
        <a href="<?php echo e(route('post_view',['id'=>$post['id']])); ?>" class="d-block">
            <div class="card card-container h-100">  
                   <img class="card-img-top"  onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                   src="<?php echo e(\App\CPU\PostManager::post_image_path('thumbnail').'/'.$post->thumbnail); ?>" alt="others-post" style="height: 200px; width: 100%; display: block;">
                   <div class="card-body">
                       <h5 class="card-title two-row-truncate"><?php echo e($post->title); ?></h5>
                       <p class="card-text two-row-truncate"><?php echo e($post->sub_title); ?></p>
                   </div>
                   <div class="card-footer">
                       <small class="text-muted"><?php echo e($post->created_at->format('d-m-Y H:i:s')); ?></small>
   
                   </div>
           </div>   
        </a>  
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/posts/_ajax-posts.blade.php ENDPATH**/ ?>