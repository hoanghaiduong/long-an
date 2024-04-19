<?php ($overallRating = \App\CPU\ProductManager::get_overall_rating($product->reviews)); ?>
<div class="product-single-hover style--category shadow-none">
    <div class="overflow-hidden position-relative">
        <div class=" inline_product clickable d-flex justify-content-center">
            <?php if($product->discount > 0): ?>
                <div class="d-flex">
                    <span class="for-discoutn-value p-1 pl-2 pr-2">
                    <?php if($product->discount_type == 'percent'): ?>
                            <?php echo e(round($product->discount,(!empty($decimal_point_settings) ? $decimal_point_settings: 0))); ?>%
                        <?php elseif($product->discount_type =='flat'): ?>
                            <?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?>

                        <?php endif; ?>
                        <?php echo e(translate('off')); ?>

                    </span>
                </div>
            <?php else: ?>
                <div class="d-flex justify-content-end for-dicount-div-null">
                    <span class="for-discoutn-value-null"></span>
                </div>
            <?php endif; ?>
            <div class="d-block pb-0">
                <a href="<?php echo e(route('product',$product->slug)); ?>" class="d-block">
                    <img src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'">
                </a>
            </div>

            <div class="quick-view">
                <a class="btn-circle stopPropagation" href="javascript:" onclick="quickView('<?php echo e($product->id); ?>')">
                    <i class="czi-eye align-middle"></i>
                </a>
            </div>
            <?php if($product->product_type == 'physical' && $product->current_stock <= 0): ?>
                <span class="out_fo_stock"><?php echo e(translate('out_of_stock')); ?></span>
            <?php endif; ?>
        </div>
        <div class="single-product-details">
            <?php if($overallRating[0] != 0 ): ?>
            <div class="rating-show justify-content-between">
                <span class="d-inline-block font-size-sm text-body" style="font-weight: 400;
                font-size: 10px;">
                    <?php for($inc=1;$inc<=5;$inc++): ?>
                        <?php if($inc <= (int)$overallRating[0]): ?>
                            <i class="tio-star text-warning"></i>
                        <?php elseif($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                            <i class="tio-star-half text-warning"></i>
                        <?php else: ?>
                            <i class="tio-star-outlined text-warning"></i>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <label class="badge-style">( <?php echo e($product->reviews_count); ?> )</label>
                </span>
            </div>
            <?php endif; ?>
            <div class="">
                <a href="<?php echo e(route('product',$product->slug)); ?>" class="text-capitalize fw-semibold">
                    <?php echo e(Str::limit($product['name'], 18)); ?>

                </a>
            </div>
            <div class="justify-content-between ">
                <div class="product-price d-flex flex-wrap gap-8 align-items-center row-gap-0 " style="font-weight: 400;
                font-size: 12px;">
                    <?php if($product->discount > 0): ?>
                        <strike style="font-size: 12px!important;color: #9B9B9B!important;">
                            <?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?>

                        </strike>
                    <?php endif; ?>
                    <span class="text-accent text-dark">
                        <?php echo e(\App\CPU\Helpers::currency_converter(
                            $product->unit_price-(\App\CPU\Helpers::get_product_discount($product,$product->unit_price))
                        )); ?>

                    </span>
                </div>
            </div>
        </div>
    </div>
</div>


<?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/partials/_category-single-product.blade.php ENDPATH**/ ?>