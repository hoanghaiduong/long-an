<?php $__currentLoopData = $reviews_of_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productReview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="p-2" style="margin-bottom: 20px">
    <div class="row product-review d-flex ">
        <div
            class="col-md-3 d-flex mb-3 <?php echo e(Session::get('direction') === "rtl" ? 'pl-5' : 'pr-5'); ?>">
            <div
                class="media media-ie-fix  <?php echo e(Session::get('direction') === "rtl" ? 'ml-4 pl-2' : 'mr-4 pr-2'); ?>">
                <img class="rounded-circle __img-64 object-cover"
                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                    src="<?php echo e(asset("storage/app/public/profile")); ?>/<?php echo e((isset($productReview->user)?$productReview->user->image:'')); ?>"
                    alt="<?php echo e(isset($productReview->user)?$productReview->user->f_name:'not exist'); ?>"/>
                <div
                    class="media-body <?php echo e(Session::get('direction') === "rtl" ? 'pr-3' : 'pl-3'); ?> text-body">
                    <span class="font-size-sm mb-0 text-body" style="font-weight: 700;font-size: 12px;"><?php echo e(isset($productReview->user)?$productReview->user->f_name:'not exist'); ?></span>
                    <div class="d-flex ">

                        <div class=" <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>">

                                    <i class="sr-star czi-star-filled active"></i>

                        </div>
                        <div class="text-body text-nowrap" style="font-weight: 400;font-size: 15px;"><?php echo e(isset($productReview->rating) ? $productReview->rating : 0); ?> / 5 </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <p class="mb-3 text-body __text-sm" style="word-wrap:break-word;"><?php echo e(isset($productReview->comment) ? $productReview->comment : ''); ?></p>
            <?php if(isset($productReview->attachment) && !empty(json_decode($productReview->attachment))): ?>
                <?php $__currentLoopData = json_decode($productReview->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img onclick="showInstaImage('<?php echo e(asset("storage/app/public/review/$photo")); ?>')" class="cz-image-zoom __img-70 rounded border" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'" src="<?php echo e(asset("storage/app/public/review/$photo")); ?>" alt="Product review">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="col-md-2 text-body">
            <span style="float: right;font-weight: 400;font-size: 13px;"><?php echo e(isset($productReview->updated_at) ? $productReview->updated_at->format('M-d-Y') : ''); ?></span>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/partials/product-reviews.blade.php ENDPATH**/ ?>