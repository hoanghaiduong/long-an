<?php if(isset($product)): ?>
    <?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews)); ?>
    <div class="flash_deal_product rtl" onclick="location.href='<?php echo e(route('product',$product->slug)); ?>'">
        <?php if($product->discount > 0): ?>
        <span class="for-discoutn-value p-1 pl-2 pr-2">
            <?php if($product->discount_type == 'percent'): ?>
                <?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
            <?php elseif($product->discount_type =='flat'): ?>
                <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

            <?php endif; ?> <?php echo e(translate('off')); ?>

        </span>
        <?php endif; ?>
        <div class=" d-flex">
            <div class="d-flex align-items-center justify-content-center"
                 style="padding-<?php echo e(Session::get('direction') === "rtl" ?'right:12px':'left:12px'); ?>;padding-block:12px;">
                <div class="flash-deals-background-image">
                    <img class="__img-125px"
                     src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"/>
                </div>
            </div>
            <div class="flash_deal_product_details pl-3 pr-3 pr-1 d-flex mt-3">
                <div>
                    <div>
                        <a href="<?php echo e(route('product',$product->slug)); ?>" class="flash-product-title text-capitalize fw-semibold">
                            <?php echo e(Str::limit($product['name'], 23)); ?>

                        </a>
                    </div>
                    <?php if($overallRating[0] != 0 ): ?>
                    <div class="flash-product-review">
                        <?php for($inc=1;$inc<=5;$inc++): ?>
                            <?php if($inc <= (int)$overallRating[0]): ?>
                                <i class="tio-star text-warning"></i>
                            <?php elseif($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                                <i class="tio-star-half text-warning"></i>
                            <?php else: ?>
                                <i class="tio-star-outlined text-warning"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <label class="badge-style2">
                            ( <?php echo e($product->reviews->count()); ?> )
                        </label>
                    </div>
                    <?php endif; ?>
                    <div class="d-flex flex-wrap gap-8 align-items-center row-gap-0">
                        <?php if($product->discount > 0): ?>
                            <strike
                                style="font-size: 12px!important;color: #9B9B9B!important;">
                                <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                            </strike>
                        <?php endif; ?>
                        <span class="flash-product-price text-dark fw-semibold">
                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price-\App\CPU\Helpers::get_product_discount($product,$product->unit_price))); ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/partials/_product-card-2.blade.php ENDPATH**/ ?>