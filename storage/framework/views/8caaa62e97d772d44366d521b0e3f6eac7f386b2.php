<?php $__env->startSection('title', translate('product_Preview')); ?>

<?php $__env->startPush('css_or_js'); ?>
<style>
    .pair-list .key {
        min-width: 100px;
        --flex-basis: 100px;
        flex-basis: var(--flex-basis);
        text-wrap: nowrap;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid text-start">
        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-10 mb-3">
            <!-- Page Title -->
            <div class="">
                <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
                    <?php echo e(translate('product_details')); ?>

                </h2>
            </div>
            <!-- End Page Title -->
        </div>


        <!-- Card -->
        <div class="card card-top-bg-element">
            <div class="card-body">
                <div class="d-flex flex-wrap flex-lg-nowrap gap-3 justify-content-between">
                    <div class="media flex-wrap flex-sm-nowrap gap-3">
                        <a class="aspect-1 float-left overflow-hidden"

                            <?php if(file_exists(base_path("storage/app/public/product/thumbnail/".$product['thumbnail']))): ?>
                                href="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>"
                            <?php else: ?>
                                href="<?php echo e(asset("public/assets/front-end/img/image-place-holder.png")); ?>"
                            <?php endif; ?>


                            data-lightbox="mygallery">
                            <img class="avatar avatar-170 rounded-0" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'" src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($product['thumbnail']); ?>" alt="Image Description">
                        </a>
                        <div class="d-block">
                            <div class="d-flex flex-wrap flex-sm-nowrap align-items-start gap-2 mb-2 min-h-50">

                                <?php if($product->product_type == 'physical' && $product->color_image): ?>
                                    <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="aspect-1 float-left overflow-hidden"
                                            <?php if(file_exists(base_path("storage/app/public/product/".$photo->image_name))): ?>
                                                href="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>"
                                            <?php else: ?>
                                                href="<?php echo e(asset("public/assets/front-end/img/image-place-holder.png")); ?>"
                                            <?php endif; ?> data-lightbox="mygallery">

                                            <img width="50" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>" alt="Product image">
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="aspect-1 float-left overflow-hidden" href="<?php echo e(asset("storage/app/public/product/$photo")); ?>" data-lightbox="mygallery">
                                            <img width="50" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(asset("storage/app/public/product/$photo")); ?>" alt="Product image">
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                <?php if($product->denied_note && $product['request_status'] == 2): ?>
                                    <div class="alert alert-danger bg-danger-light py-2" role="alert">
                                        <strong><?php echo e(translate('note')); ?> :</strong> <?php echo e($product->denied_note); ?>

                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-block">
                                <div class="d-flex">
                                    <h2 class="mb-2 pb-1 text-gulf-blue"><?php echo e($product['name']); ?></h2>
                                    <a class="btn btn-outline--primary btn-sm square-btn mx-2 w-auto h-25"
                                        title="<?php echo e(translate('edit')); ?>"
                                        href="<?php echo e(route('admin.product.edit',[$product['id']])); ?>">
                                        <i class="tio-edit"></i>
                                    </a>
                                </div>
                                <div class="d-flex gap-3 flex-wrap mb-3 lh-1">
                                    <a href="#" class="text-dark"><?php echo e(count($product->order_details)); ?> <?php echo e(translate('orders')); ?></a>
                                    <span class="border-left"></span>
                                    <div class="review-hover position-relative cursor-pointer d-flex gap-2 align-items-center">
                                        <i class="tio-star"></i>
                                        <span><?php echo e(count($product->rating)>0?number_format($product->rating[0]->average, 2, '.', ' '):0); ?></span>

                                        <div class="review-details-popup">
                                            <h6 class="mb-2"><?php echo e(translate('rating')); ?></h6>
                                            <div class="">
                                                <ul class="list-unstyled list-unstyled-py-2 mb-0">
                                                    <?php ($total = $product->reviews->count()); ?>
                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <?php ($five=\App\CPU\Helpers::rating_count($product['id'],5)); ?>
                                                        <span
                                                            class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('5')); ?> <?php echo e(translate('star')); ?></span>
                                                        <div class="progress flex-grow-1">
                                                            <div class="progress-bar" role="progressbar"
                                                                    style="width: <?php echo e($total==0?0:($five/$total)*100); ?>%;"
                                                                    aria-valuenow="<?php echo e($total==0?0:($five/$total)*100); ?>"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($five); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <?php ($four=\App\CPU\Helpers::rating_count($product['id'],4)); ?>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('4')); ?> <?php echo e(translate('star')); ?></span>
                                                        <div class="progress flex-grow-1">
                                                            <div class="progress-bar" role="progressbar"
                                                                    style="width: <?php echo e($total==0?0:($four/$total)*100); ?>%;"
                                                                    aria-valuenow="<?php echo e($total==0?0:($four/$total)*100); ?>"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($four); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <?php ($three=\App\CPU\Helpers::rating_count($product['id'],3)); ?>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('3')); ?> <?php echo e(translate('star')); ?></span>
                                                        <div class="progress flex-grow-1">
                                                            <div class="progress-bar" role="progressbar"
                                                                    style="width: <?php echo e($total==0?0:($three/$total)*100); ?>%;"
                                                                    aria-valuenow="<?php echo e($total==0?0:($three/$total)*100); ?>"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span
                                                            class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($three); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <?php ($two=\App\CPU\Helpers::rating_count($product['id'],2)); ?>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('2')); ?> <?php echo e(translate('star')); ?></span>
                                                        <div class="progress flex-grow-1">
                                                            <div class="progress-bar" role="progressbar"
                                                                    style="width: <?php echo e($total==0?0:($two/$total)*100); ?>%;"
                                                                    aria-valuenow="<?php echo e($total==0?0:($two/$total)*100); ?>"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($two); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->

                                                    <!-- Review Ratings -->
                                                    <li class="d-flex align-items-center font-size-sm">
                                                        <?php ($one=\App\CPU\Helpers::rating_count($product['id'],1)); ?>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?>"><?php echo e(translate('1')); ?> <?php echo e(translate('star')); ?></span>
                                                        <div class="progress flex-grow-1">
                                                            <div class="progress-bar" role="progressbar"
                                                                    style="width: <?php echo e($total==0?0:($one/$total)*100); ?>%;"
                                                                    aria-valuenow="<?php echo e($total==0?0:($one/$total)*100); ?>"
                                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>"><?php echo e($one); ?></span>
                                                    </li>
                                                    <!-- End Review Ratings -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="border-left"></span>
                                    <a href="javascript:" class="text-dark"><?php echo e($product->reviews_count); ?> <?php echo e(translate('ratings')); ?></a>
                                    <span class="border-left"></span>
                                    <a href="javascript:" class="text-dark"><?php echo e($product->reviews->whereNotNull('comment')->count()); ?> <?php echo e(translate('reviews')); ?></a>
                                </div>

                                <?php if($product_active): ?>
                                    <a href="<?php echo e(route('product',$product['slug'])); ?>" class="btn btn-outline--primary mr-1" target="_blank">
                                        <i class="tio-globe"></i>
                                        <?php echo e(translate('view_live')); ?>

                                    </a>
                                <?php endif; ?>
                                <?php if($product->digital_file_ready && file_exists(base_path('storage/app/public/product/digital-product/'.$product->digital_file_ready))): ?>
                                <a href="<?php echo e(asset('storage/app/public/product/digital-product/'.$product->digital_file_ready)); ?>" class="btn btn-outline--primary mr-1" title="Download" download>
                                    <i class="tio-download"></i>
                                    <?php echo e(translate('download')); ?>

                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    
                    <?php if($product['added_by'] == 'seller' && ($product['request_status'] == 0 || $product['request_status'] == 1)): ?>
                    <div class="d-flex justify-content-sm-end flex-wrap gap-2 mb-3">
                        <div>
                            <button class="btn btn-danger px-5" data-toggle="modal" data-target="#publishNoteModal">
                                <?php echo e(translate('reject')); ?>

                            </button>

                        </div>
                        <div>
                            <?php if($product['request_status'] == 0): ?>
                                <a href="<?php echo e(route('admin.product.approve-status', ['id'=>$product['id']])); ?>" class="btn btn-success px-5">
                                    <?php echo e(translate('approve')); ?>

                                </a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php if($product['added_by'] == 'seller' && ($product['request_status'] == 2)): ?>
                    <div class="d-flex justify-content-sm-end flex-wrap gap-2 mb-3">
                        <div>
                            <button class="btn btn-danger px-5">
                                <?php echo e(translate('rejected')); ?>

                            </button>

                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <hr>

                <div class="d-flex gap-3 flex-wrap">
                    <div class="border p-3 w-170">
                        <div class="d-flex flex-column mb-1">
                            <h6 class="font-weight-normal"><?php echo e(translate('total_sold')); ?> :</h6>
                            <h3 class="text-primary fs-18"><?php echo e($product->order_delivered_sum_qty ?? 0); ?></h3>
                        </div>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-normal"><?php echo e(translate('total_sold_amount')); ?> :</h6>
                            <h3 class="text-primary fs-18"><?php echo e(\App\CPU\Helpers::currency_converter(($product->order_delivered_sum_price * $product->order_delivered_sum_qty) - $product->order_delivered_sum_discount)); ?></h3>
                        </div>
                    </div>

                    <div class="row gy-3 flex-grow-1">
                        <div class="col-sm-6 col-xl-4">
                            <h4 class="mb-3"><?php echo e(translate('general_information')); ?></h4>

                            <div class="pair-list">
                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('brand')); ?></span>
                                    <span>:</span>
                                    <span class="value">
                                        <?php echo e(isset($product->brand) ? $product->brand->default_name : translate('brand_not_found')); ?>

                                    </span>
                                </div>

                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('category')); ?></span>
                                    <span>:</span>
                                    <span class="value">
                                        <?php echo e(isset($product->category) ? $product->category->default_name : translate('category_not_found')); ?>

                                    </span>
                                </div>

                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('product_type')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e(translate($product->product_type)); ?></span>
                                </div>
                                <?php if($product->product_type == 'physical'): ?>
                                    <div>
                                        <span class="key text-nowrap"><?php echo e(translate('current_Stock')); ?></span>
                                        <span>:</span>
                                        <span class="value"><?php echo e($product->current_stock); ?></span>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('SKU')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e($product->code); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-4">
                            <h4 class="mb-3"><?php echo e(translate('price_information')); ?></h4>

                            <div class="pair-list">
                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('purchase_price')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e(\App\CPU\Helpers::currency_converter($product->purchase_price)); ?></span>
                                </div>

                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('unit_price')); ?></span>
                                    <span>:</span>
                                    <span class="value"><?php echo e(\App\CPU\Helpers::currency_converter($product->unit_price)); ?></span>
                                </div>

                                <div>
                                    <span class="key text-nowrap"><?php echo e(translate('tax')); ?></span>
                                    <span>:</span>
                                    <?php if($product->tax_type =='percent'): ?>
                                        <span class="value"><?php echo e($product->tax); ?>% (<?php echo e($product->tax_model); ?>)</span>
                                    <?php else: ?>
                                        <span class="value"><?php echo e(\App\CPU\Helpers::currency_converter($product->tax)); ?> (<?php echo e($product->tax_model); ?>)</span>
                                    <?php endif; ?>
                                </div>
                                <?php if($product->product_type == 'physical'): ?>
                                    <div>
                                        <span class="key text-nowrap"><?php echo e(translate('shipping_cost')); ?></span>
                                        <span>:</span>
                                        <span class="value">
                                            <?php echo e(\App\CPU\Helpers::currency_converter($product->shipping_cost)); ?>

                                            <?php if($product->multiply_qty == 1): ?>
                                                (<?php echo e(translate('multiply_with_quantity')); ?>)
                                            <?php endif; ?>

                                        <span>
                                    </div>
                                <?php endif; ?>
                                <?php if($product->discount > 0): ?>
                                    <div>
                                        <span class="key text-nowrap"><?php echo e(translate('discount')); ?></span>
                                        <span>:</span>
                                        <?php if($product->discount_type == 'percent'): ?>
                                            <span class="value"><?php echo e($product->discount); ?>%</span>
                                        <?php else: ?>
                                            <span class="value"><?php echo e(\App\CPU\Helpers::currency_converter($product->discount)); ?></span>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if($product->product_type == 'physical' && count(json_decode($product->choice_options)) >0 || count(json_decode($product->colors)) >0 ): ?>
                            <div class="col-sm-6 col-xl-4">
                                <h4 class="mb-3"><?php echo e(translate('available_variations')); ?></h4>

                                <div class="pair-list">
                                    <?php if(json_decode($product->choice_options) != null): ?>
                                        <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div>
                                            <?php if(array_filter($value->options) != null): ?>
                                                <span class="key text-nowrap"><?php echo e(translate($value->title)); ?></span>
                                                <span>:</span>
                                                <span class="value">
                                                    <?php $__currentLoopData = $value->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php echo e($option); ?>

                                                        <?php if($key === array_key_last(($value->options))): ?><?php break; ?> <?php endif; ?>
                                                        ,
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <?php if(json_decode($product->colors) != null): ?>
                                        <div>
                                            <span class="key text-nowrap"><?php echo e(translate('color')); ?></span>
                                            <span>:</span>
                                            <span class="value">
                                                <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e(\App\CPU\get_color_name($value)); ?>

                                                    <?php if($key === array_key_last(json_decode($product->colors))): ?><?php break; ?> <?php endif; ?>
                                                    ,
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
            <!-- End Body -->
        </div>
        <!-- End Card -->

        <!-- Card -->
        <div class="card mt-3">
            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100 text-start">
                    <thead class="thead-light thead-50 text-capitalize">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('reviewer')); ?></th>
                        <th><?php echo e(translate('rating')); ?></th>
                        <th><?php echo e(translate('review')); ?></th>
                        <th><?php echo e(translate('date')); ?></th>
                        <th><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(isset($review->customer)): ?>
                        <tr>
                            <td><?php echo e($reviews->firstItem()+$key); ?></td>
                            <td>
                                <a class="d-flex align-items-center"
                                   href="<?php echo e(route('admin.customer.view',[$review['customer_id']])); ?>">
                                    <div class="avatar rounded">
                                        <img
                                            class="avatar-img"
                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(asset('storage/app/public/profile/'.$review->customer->image)); ?>"
                                            alt="Image Description">
                                    </div>
                                    <div class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3' : 'ml-3'); ?>">
                                    <span class="d-block h5 text-hover-primary mb-0"><?php echo e($review->customer['f_name']." ".$review->customer['l_name']); ?> <i
                                            class="tio-verified text-primary" data-toggle="tooltip" data-placement="top"
                                            title="Verified Customer"></i></span>
                                        <span class="d-block font-size-sm text-body"><?php echo e($review->customer->email??""); ?></span>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2 text-primary">
                                    <i class="tio-star"></i>
                                    <span><?php echo e($review->rating); ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap max-w-400 min-w-200">
                                    <p>
                                        <?php echo e($review['comment']); ?>

                                    </p>
                                    <?php if(json_decode($review->attachment)): ?>
                                        <?php $__currentLoopData = json_decode($review->attachment); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a class="aspect-1 float-left overflow-hidden" href="<?php echo e(asset('storage/app/public/review')); ?>/<?php echo e($img); ?>" data-lightbox="mygallery">
                                                <img class="p-2" width="60" height="60" src="<?php echo e(asset('storage/app/public/review')); ?>/<?php echo e($img); ?>" alt="" onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'">
                                            </a>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <?php echo e(date('d M Y H:i:s',strtotime($review['updated_at']))); ?>

                            </td>
                            <td>
                                <form action="<?php echo e(route('admin.reviews.status', [$review['id'], $review->status ? 0 : 1])); ?>" method="get" id="reviews_status<?php echo e($review['id']); ?>_form" class="reviews_status_form">
                                    <label class="switcher mx-auto">
                                        <input type="checkbox" class="switcher_input" id="reviews_status<?php echo e($review['id']); ?>" <?php echo e($review->status ? 'checked' : ''); ?> onclick="toogleStatusModal(event,'reviews_status<?php echo e($review['id']); ?>','customer-reviews-on.png','customer-reviews-off.png','<?php echo e(translate('Want_to_Turn_ON_Customer_Reviews')); ?>','<?php echo e(translate('Want_to_Turn_OFF_Customer_Reviews')); ?>',`<p><?php echo e(translate('if_enabled_anyone_can_see_this_review_on_the_user_website_and_customer_app')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_review_will_be_hidden_from_the_user_website_and_customer_app')); ?></p>`)">
                                        <span class="switcher_control"></span>
                                    </label>
                                </form>
                            </td>
                        </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <!-- Pagination -->
                    <?php echo $reviews->links(); ?>

                </div>
            </div>

            <?php if(count($reviews)==0): ?>
                <div class="text-center p-4">
                    <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                    <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                </div>
            <?php endif; ?>
        </div>
        <!-- End Card -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="publishNoteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('denied_note')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-group" action="<?php echo e(route('admin.product.deny', ['id'=>$product['id']])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <textarea class="form-control" name="denied_note" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(translate('close')); ?>

                        </button>
                        <button type="submit" class="btn btn--primary"><?php echo e(translate('save_changes')); ?></button>
                    </div>
                </form>
            </div>
        </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/tags-input.min.js"></script>
    <script src="<?php echo e(asset('public/assets/select2/js/select2.min.js')); ?>"></script>
    <script>
        $('input[name="colors_active"]').on('change', function () {
            if (!$('input[name="colors_active"]').is(':checked')) {
                $('#colors-selector').prop('disabled', true);
            } else {
                $('#colors-selector').prop('disabled', false);
            }
        });
        $(document).ready(function () {
            $('.color-var-select').select2({
                templateResult: colorCodeSelect,
                templateSelection: colorCodeSelect,
                escapeMarkup: function (m) {
                    return m;
                }
            });

            function colorCodeSelect(state) {
                var colorCode = $(state.element).val();
                if (!colorCode) return state.text;
                return "<span class='color-preview' style='background-color:" + colorCode + ";'></span>" + state.text;
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/product/view.blade.php ENDPATH**/ ?>