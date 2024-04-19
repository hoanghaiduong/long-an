<!-- Header -->
<div class="card-header gap-10">
    <h4 class="d-flex align-items-center text-capitalize gap-10 mb-0">
        <img width="20" src="<?php echo e(asset('/public/assets/back-end/img/shop-info.png')); ?>" alt="">
        <?php echo e(translate('top_selling_store')); ?>

    </h4>
</div>
<!-- End Header -->

<!-- Body -->
<div class="card-body">
    <div class="grid-item-wrap">
        <?php if($top_store_by_earning): ?>
            <?php $__currentLoopData = $top_store_by_earning; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($shop=\App\Model\Shop::where('seller_id',$item['seller_id'])->first()); ?>
                <?php if(isset($shop)): ?>
                    <div class="cursor-pointer"
                         onclick="location.href='<?php echo e(route('admin.sellers.view',$item['seller_id'])); ?>'">
                        <div class="grid-item basic-box-shadow">
                            <div class="d-flex align-items-center gap-10">
                                <img class="avatar rounded-circle avatar-sm"
                                     onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                     src="<?php echo e(asset('storage/app/public/shop/'.$shop->image??'')); ?>">

                                <h5 class="shop-name"><?php echo e($shop['name']??'Not exist'); ?></h5>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="shop-sell"><?php echo e(\App\CPU\Helpers::currency_converter($item['count'])); ?></h5>
                                <img src="<?php echo e(asset('/public/assets/back-end/img/cart.png')); ?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="text-center">
                <p class="text-muted"><?php echo e(translate('no_Top_Selling_Products')); ?></p>
                <img class="w-75" src="<?php echo e(asset('/public/assets/back-end/img/no-data.png')); ?>" alt="">
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- End Body -->
<?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/partials/_top-selling-store.blade.php ENDPATH**/ ?>