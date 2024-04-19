<?php $__env->startSection('title', $product['name']); ?>

<?php $__env->startPush('css_or_js'); ?>
    <meta name="description" content="<?php echo e($product->slug); ?>">
    <meta name="keywords" content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <?php if($product->added_by=='seller'): ?>
        <meta name="author" content="<?php echo e($product->seller->shop?$product->seller->shop->name:$product->seller->f_name); ?>">
    <?php elseif($product->added_by=='admin'): ?>
        <meta name="author" content="<?php echo e($web_config['name']->value); ?>">
    <?php endif; ?>
    <!-- Viewport-->

    <?php if($product['meta_image']!=null): ?>
        <meta property="og:image" content="<?php echo e(asset("storage/app/public/product/meta")); ?>/<?php echo e($product->meta_image); ?>"/>
        <meta property="twitter:card"
              content="<?php echo e(asset("storage/app/public/product/meta")); ?>/<?php echo e($product->meta_image); ?>"/>
    <?php else: ?>
        <meta property="og:image" content="<?php echo e(asset("storage/app/public/product/thumbnail")); ?>/<?php echo e($product->thumbnail); ?>"/>
        <meta property="twitter:card"
              content="<?php echo e(asset("storage/app/public/product/thumbnail/")); ?>/<?php echo e($product->thumbnail); ?>"/>
    <?php endif; ?>

    <?php if($product['meta_title']!=null): ?>
        <meta property="og:title" content="<?php echo e($product->meta_title); ?>"/>
        <meta property="twitter:title" content="<?php echo e($product->meta_title); ?>"/>
    <?php else: ?>
        <meta property="og:title" content="<?php echo e($product->name); ?>"/>
        <meta property="twitter:title" content="<?php echo e($product->name); ?>"/>
    <?php endif; ?>
    <meta property="og:url" content="<?php echo e(route('product',[$product->slug])); ?>">

    <?php if($product['meta_description']!=null): ?>
        <meta property="twitter:description" content="<?php echo $product['meta_description']; ?>">
        <meta property="og:description" content="<?php echo $product['meta_description']; ?>">
    <?php else: ?>
        <meta property="og:description"
              content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
        <meta property="twitter:description"
              content="<?php $__currentLoopData = explode(' ',$product['name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($keyword.' , '); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <?php endif; ?>
    <meta property="twitter:url" content="<?php echo e(route('product',[$product->slug])); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/front-end/css/product-details.css')); ?>"/>
    <style>
        .btn-number:hover {
            color: <?php echo e($web_config['secondary_color']); ?>;

        }

        .for-total-price {
            margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: -30%;
        }

        .feature_header span {
            padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 15px;
        }

        .flash-deals-background-image{
            background: <?php echo e($web_config['primary_color']); ?>10;
        }

        @media (max-width: 768px) {
            .for-total-price {
                padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 30%;
            }

            .product-quantity {
                padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 4%;
            }

            .for-margin-bnt-mobile {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 7px;
            }

        }

        @media (max-width: 375px) {
            .for-margin-bnt-mobile {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 3px;
            }

            .for-discount {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 10% !important;
            }

            .for-dicount-div {
                margin-top: -5%;
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: -7%;
            }

            .product-quantity {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 4%;
            }

        }

        @media (max-width: 500px) {
            .for-dicount-div {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: -5%;
            }

            .for-total-price {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: -20%;
            }

            .view-btn-div {
                float: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>;
            }

            .for-discount {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 7%;
            }
            .for-mobile-capacity {
                margin-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 7%;
            }
        }
    </style>
    <style>
        thead {
            background: <?php echo e($web_config['primary_color']); ?> !important;
        }
        /**/
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="__inline-23">
        <!-- Page Content-->
        <div class="container mt-4 rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <!-- General info tab-->
            <div class="row <?php echo e(Session::get('direction') === "rtl" ? '__dir-rtl' : ''); ?>">
                <!-- Product gallery-->
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-md-4 col-12">
                            <div class="cz-product-gallery">
                                <div class="cz-preview">
                                    <?php if($product->images!=null && json_decode($product->images)>0): ?>
                                        <?php if(json_decode($product->colors) && $product->color_image): ?>
                                            <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($photo->color != null): ?>
                                                    <div class="cz-preview-item d-flex align-items-center justify-content-center <?php echo e($key==0?'active':''); ?>"
                                                         id="image<?php echo e($photo->color); ?>">
                                                        <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                             src="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>"
                                                             data-zoom="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>"
                                                             alt="Product image" width="">
                                                        <div class="cz-image-zoom-pane"></div>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="cz-preview-item d-flex align-items-center justify-content-center <?php echo e($key==0?'active':''); ?>"
                                                         id="image<?php echo e($key); ?>">
                                                        <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                             src="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>"
                                                             data-zoom="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>"
                                                             alt="Product image" width="">
                                                        <div class="cz-image-zoom-pane"></div>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="cz-preview-item d-flex align-items-center justify-content-center <?php echo e($key==0?'active':''); ?>"
                                                     id="image<?php echo e($key); ?>">
                                                    <img class="cz-image-zoom img-responsive w-100 __max-h-323px"
                                                         onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                         src="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                                         data-zoom="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                                         alt="Product image" width="">
                                                    <div class="cz-image-zoom-pane"></div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>

                                <div class="d-flex flex-column gap-3">
                                    <button type="button" onclick="addWishlist('<?php echo e($product['id']); ?>')"
                                            class="btn __text-18px border wishlight-pos-btn d-sm-none">
                                        <i class="fa <?php echo e(($wishlist_status == 1?'fa-heart':'fa-heart-o')); ?> wishlist_icon_<?php echo e($product['id']); ?>" style="color: <?php echo e($web_config['primary_color']); ?>"
                                        aria-hidden="true"></i>
                                    </button>

                                    <div style="text-align:<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                                        class="sharethis-inline-share-buttons share--icons">
                                    </div>
                                </div>

                                <div class="cz">
                                    <div class="table-responsive __max-h-515px" data-simplebar>
                                        <div class="d-flex">
                                            <?php if($product->images!=null && json_decode($product->images)>0): ?>
                                                <?php if(json_decode($product->colors) && $product->color_image): ?>
                                                    <?php $__currentLoopData = json_decode($product->color_image); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($photo->color != null): ?>
                                                            <div class="cz-thumblist">
                                                                <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center"
                                                                   id="preview-img<?php echo e($photo->color); ?>" href="#image<?php echo e($photo->color); ?>">
                                                                    <img
                                                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                        src="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>"
                                                                        alt="Product thumb">
                                                                </a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="cz-thumblist">
                                                                <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center"
                                                                   id="preview-img<?php echo e($key); ?>" href="#image<?php echo e($key); ?>">
                                                                    <img
                                                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                        src="<?php echo e(asset("storage/app/public/product/$photo->image_name")); ?>"
                                                                        alt="Product thumb">
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <?php $__currentLoopData = json_decode($product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="cz-thumblist">
                                                            <a class="cz-thumblist-item  <?php echo e($key==0?'active':''); ?> d-flex align-items-center justify-content-center"
                                                               id="preview-img<?php echo e($key); ?>" href="#image<?php echo e($key); ?>">
                                                                <img
                                                                    onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                                    src="<?php echo e(asset("storage/app/public/product/$photo")); ?>"
                                                                    alt="Product thumb">
                                                            </a>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Product details-->
                        <div class="col-lg-7 col-md-8 col-12 mt-md-0 mt-sm-3" style="direction: <?php echo e(Session::get('direction')); ?>">
                            <div class="details __h-100">
                                <span class="mb-2 __inline-24"><?php echo e($product->name); ?></span>
                                <div class="d-flex flex-wrap align-items-center mb-2 pro">
                                    <div class="star-rating" style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-left: 10px;' : 'margin-right: 10px;'); ?>">
                                        <?php for($inc=1;$inc<=5;$inc++): ?>
                                            <?php if($inc <= (int)$overallRating[0]): ?>
                                                <i class="tio-star text-warning"></i>
                                            <?php elseif($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                                                <i class="tio-star-half text-warning"></i>
                                            <?php else: ?>
                                                <i class="tio-star-outlined text-warning"></i>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    <span
                                        class="d-inline-block  align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'ml-md-2 ml-sm-0' : 'mr-md-2 mr-sm-0'); ?> fs-14 text-muted">(<?php echo e($overallRating[0]); ?>)</span>
                                    <span class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'); ?>"><span style="color: <?php echo e($web_config['primary_color']); ?>"><?php echo e($overallRating[1]); ?></span> <?php echo e(translate('reviews')); ?></span>
                                    <span class="__inline-25"></span>
                                    <span class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-1 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-1 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'); ?>"><span style="color: <?php echo e($web_config['primary_color']); ?>"><?php echo e($countOrder); ?></span> <?php echo e(translate('orders')); ?>   </span>
                                    <span class="__inline-25">    </span>
                                    <span class="font-regular font-for-tab d-inline-block font-size-sm text-body align-middle mt-1 <?php echo e(Session::get('direction') === "rtl" ? 'mr-1 ml-md-2 ml-0 pr-md-2 pr-sm-1 pl-md-2 pl-sm-1' : 'ml-1 mr-md-2 mr-0 pl-md-2 pl-sm-1 pr-md-2 pr-sm-1'); ?> text-capitalize"> <span style="color: <?php echo e($web_config['primary_color']); ?>"> <?php echo e($countWishlist); ?></span> <?php echo e(translate('wish_listed')); ?> </span>

                                </div>
                                <div class="mb-3">
                                    <span class="f-20 font-weight-normal text-accent ">
                                        <?php echo \App\CPU\Helpers::get_price_range_with_discount($product); ?>

                                    </span>
                                </div>

                                <form id="add-to-cart-form" class="mb-2">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                    <div class="position-relative <?php echo e(Session::get('direction') === "rtl" ? 'ml-n4' : 'mr-n4'); ?> mb-2">
                                        <?php if(count(json_decode($product->colors)) > 0): ?>
                                            <div class="flex-start align-items-center mb-2">
                                                <div class="product-description-label m-0 text-dark font-bold"><?php echo e(translate('color')); ?>:
                                                </div>
                                                <div>
                                                    <ul class="list-inline checkbox-color mb-0 flex-start <?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?>"
                                                        style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0;">
                                                        <?php $__currentLoopData = json_decode($product->colors); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <input type="radio"
                                                                    id="<?php echo e($product->id); ?>-color-<?php echo e(str_replace('#','',$color)); ?>"
                                                                    name="color" value="<?php echo e($color); ?>"
                                                                    <?php if($key == 0): ?> checked <?php endif; ?>>
                                                                <label style="background: <?php echo e($color); ?>;"
                                                                    for="<?php echo e($product->id); ?>-color-<?php echo e(str_replace('#','',$color)); ?>"
                                                                    data-toggle="tooltip" onclick="focus_preview_image_by_color('<?php echo e(str_replace('#','',$color)); ?>')">
                                                                <span class="outline"></span></label>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <?php
                                            $qty = 0;
                                            if(!empty($product->variation)){
                                            foreach (json_decode($product->variation) as $key => $variation) {
                                                    $qty += $variation->qty;
                                                }
                                            }
                                        ?>
                                    </div>
                                    <?php $__currentLoopData = json_decode($product->choice_options); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $choice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="row flex-start mx-0 align-items-center">
                                            <div
                                                class="product-description-label text-dark font-bold <?php echo e(Session::get('direction') === "rtl" ? 'pl-2' : 'pr-2'); ?> text-capitalize mb-2"><?php echo e($choice->title); ?>

                                                :
                                            </div>
                                            <div>
                                                <ul class="list-inline checkbox-alphanumeric checkbox-alphanumeric--style-1 mb-0 mx-1 flex-start row"
                                                    style="padding-<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>: 0;">
                                                    <?php $__currentLoopData = $choice->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div>
                                                            <li class="for-mobile-capacity">
                                                                <input type="radio"
                                                                    id="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"
                                                                    name="<?php echo e($choice->name); ?>" value="<?php echo e($option); ?>"
                                                                    <?php if($key == 0): ?> checked <?php endif; ?> >
                                                                <label class="__text-12px"
                                                                    for="<?php echo e($choice->name); ?>-<?php echo e($option); ?>"><?php echo e($option); ?></label>
                                                            </li>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <!-- Quantity + Add to cart -->
                                    <div class="mt-3">
                                        <div class="product-quantity d-flex flex-column __gap-15">
                                            <!-- quantity section -->
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="product-description-label text-dark font-bold mt-0"><?php echo e(translate('quantity')); ?>:</div>
                                                <div class="d-flex justify-content-center align-items-center quantity-box border rounded border-base"
                                                    style="color: <?php echo e($web_config['primary_color']); ?>">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button"
                                                                data-type="minus" data-field="quantity"
                                                                disabled="disabled" style="color: <?php echo e($web_config['primary_color']); ?>">
                                                            -
                                                        </button>
                                                    </span>
                                                    <input type="text" name="quantity"
                                                        class="form-control input-number text-center cart-qty-field __inline-29 border-0 "
                                                        placeholder="1" value="<?php echo e($product->minimum_order_qty ?? 1); ?>" product-type="<?php echo e($product->product_type); ?>" min="<?php echo e($product->minimum_order_qty ?? 1); ?>" max="<?php echo e($product['product_type'] == 'physical' ? $product->current_stock : 100); ?>">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-number __p-10" type="button" product-type="<?php echo e($product->product_type); ?>" data-type="plus"
                                                                data-field="quantity" style="color: <?php echo e($web_config['primary_color']); ?>">
                                                        +
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="chosen_price_div">
                                                <div class="d-none d-sm-flex justify-content-start align-items-center <?php echo e(Session::get('direction') === "rtl" ? 'ml-2' : 'mr-2'); ?>">
                                                    <div class="product-description-label text-dark font-bold text-capitalize"><strong><?php echo e(translate('total_price')); ?></strong> : </div>
                                                    &nbsp; <strong id="chosen_price" class="text-base"></strong>
                                                    <small class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?>  font-regular">
                                                        (<small><?php echo e(translate('tax')); ?> : </small>
                                                        <small id="set-tax-amount"></small>)
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters d-none mt-2 flex-start d-flex">
                                        <div class="col-12">
                                            <?php if(($product['product_type'] == 'physical') && ($product['current_stock']<=0)): ?>
                                                <h5 class="mt-3 text-danger"><?php echo e(translate('out_of_stock')); ?></h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="__btn-grp mt-2 mb-3 d-none d-sm-flex">
                                        <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                         ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                            <button class="btn btn-secondary" type="button" disabled>
                                                <?php echo e(translate('buy_now')); ?>

                                            </button>
                                            <button class="btn btn--primary string-limit" type="button" disabled>
                                                <?php echo e(translate('add_to_cart')); ?>

                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-secondary element-center __iniline-26 btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>" onclick="buy_now()" type="button">
                                                <span class="string-limit"><?php echo e(translate('buy_now')); ?></span>
                                            </button>
                                            <button
                                                class="btn btn--primary element-center btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>"
                                                onclick="addToCart()" type="button">
                                                <span class="string-limit"><?php echo e(translate('add_to_cart')); ?></span>
                                            </button>
                                        <?php endif; ?>
                                        <button type="button" onclick="addWishlist('<?php echo e($product['id']); ?>')"
                                                class="btn __text-18px border d-none d-sm-block">
                                            <i class="fa <?php echo e(($wishlist_status == 1?'fa-heart':'fa-heart-o')); ?> wishlist_icon_<?php echo e($product['id']); ?>" style="color: <?php echo e($web_config['primary_color']); ?>"
                                            aria-hidden="true"></i>
                                            <span class="fs-14 text-muted align-bottom countWishlist-<?php echo e($product['id']); ?>"><?php echo e($countWishlist); ?></span>
                                        </button>
                                        <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                                         ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php echo e(translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mt-4 rtl col-12" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                            <div class="row" >
                                <div class="col-12">
                                    <div>
                                        <div class="px-4 pb-3 mb-3 mr-0 mr-md-2 bg-white __review-overview __rounded-10 pt-3">
                                            <!-- Tabs-->
                                            <ul class="nav nav-tabs nav--tabs d-flex justify-content-center mt-3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link __inline-27 active " href="#overview" data-toggle="tab" role="tab">
                                                        <?php echo e(translate('overview')); ?>

                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link __inline-27" href="#reviews" data-toggle="tab" role="tab">
                                                        <?php echo e(translate('reviews')); ?>

                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content px-lg-3">
                                                <!-- Tech specs tab-->
                                                <div class="tab-pane fade show active text-justify" id="overview" role="tabpanel">
                                                    <div class="row pt-2 specification">

                                                        <?php if($product->video_url != null && (str_contains($product->video_url, "youtube.com/embed/"))): ?>
                                                            <div class="col-12 mb-4">
                                                                <iframe width="420" height="315"
                                                                        src="<?php echo e($product->video_url); ?>">
                                                                </iframe>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if($product['details']): ?>
                                                            <div class="text-body col-lg-12 col-md-12 overflow-scroll fs-13 text-justify">
                                                                <?php echo $product['details']; ?>

                                                            </div>
                                                        <?php endif; ?>

                                                    </div>
                                                    <?php if(!$product['details'] && ($product->video_url == null || !(str_contains($product->video_url, "youtube.com/embed/")))): ?>
                                                        <div>
                                                            <div class="text-center text-capitalize">
                                                                <img class="mw-90" src="<?php echo e(asset('/public/assets/front-end/img/icons/nodata.svg')); ?>" alt="">
                                                                <p class="text-capitalize mt-2">
                                                                    <small><?php echo e(translate('product_details_not_found')); ?>!</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Reviews tab-->
                                                <div class="tab-pane fade" id="reviews" role="tabpanel">
                                                    <?php if(count($product->reviews)==0 && $reviews_of_product->total() == 0): ?>
                                                        <div>
                                                            <div class="text-center text-capitalize">
                                                                <img class="mw-100" src="<?php echo e(asset('/public/assets/front-end/img/icons/empty-review.svg')); ?>" alt="">
                                                                <p class="text-capitalize">
                                                                    <small><?php echo e(translate('No_review_given_yet')); ?>!</small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="row pt-2 pb-3">
                                                            <div class="col-lg-4 col-md-5 ">
                                                                <div class=" row d-flex justify-content-center align-items-center">
                                                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                                                        <h2 class="overall_review mb-2 __inline-28">
                                                                            <?php echo e($overallRating[0]); ?>

                                                                        </h2>
                                                                    </div>
                                                                    <div  class="d-flex justify-content-center align-items-center star-rating ">
                                                                        <?php for($inc=1;$inc<=5;$inc++): ?>
                                                                            <?php if($inc <= (int)$overallRating[0]): ?>
                                                                                <i class="tio-star text-warning"></i>
                                                                            <?php elseif($overallRating[0] != 0 && $inc <= (int)$overallRating[0] + 1.1 && $overallRating[0] > ((int)$overallRating[0])): ?>
                                                                                <i class="tio-star-half text-warning"></i>
                                                                            <?php else: ?>
                                                                                <i class="tio-star-outlined text-warning"></i>
                                                                            <?php endif; ?>
                                                                        <?php endfor; ?>
                                                                    </div>
                                                                    <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                                                                        <span class="text-center">
                                                                            <?php echo e($reviews_of_product->total()); ?> <?php echo e(translate('ratings')); ?>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8 col-md-7 pt-sm-3 pt-md-0" >
                                                                <div class="d-flex align-items-center mb-2 font-size-sm">
                                                                    <div
                                                                        class="__rev-txt"><span
                                                                            class="d-inline-block align-middle text-body"><?php echo e(translate('excellent')); ?></span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress text-body __h-5px">
                                                                            <div class="progress-bar " role="progressbar"
                                                                                style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[0] != 0) ? ($rating[0] / $overallRating[1]) * 100 : (0); ?>%;"
                                                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1 text-body">
                                                                        <span
                                                                            class=" <?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?> ">
                                                                            <?php echo e($rating[0]); ?>

                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                    <div
                                                                        class="__rev-txt"><span
                                                                            class="d-inline-block align-middle "><?php echo e(translate('good')); ?></span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar" role="progressbar"
                                                                                style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[1] != 0) ? ($rating[1] / $overallRating[1]) * 100 : (0); ?>%; background-color: #a7e453;"
                                                                                aria-valuenow="27" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                            class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                                <?php echo e($rating[1]); ?>

                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                    <div
                                                                        class="__rev-txt"><span
                                                                            class="d-inline-block align-middle "><?php echo e(translate('average')); ?></span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar" role="progressbar"
                                                                                style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[2] != 0) ? ($rating[2] / $overallRating[1]) * 100 : (0); ?>%; background-color: #ffda75;"
                                                                                aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                            class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                            <?php echo e($rating[2]); ?>

                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center mb-2 text-body font-size-sm">
                                                                    <div
                                                                        class="__rev-txt "><span
                                                                            class="d-inline-block align-middle"><?php echo e(translate('below_Average')); ?></span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar" role="progressbar"
                                                                                style="background-color: <?php echo e($web_config['primary_color']); ?> !important;width: <?php echo $widthRating = ($rating[3] != 0) ? ($rating[3] / $overallRating[1]) * 100 : (0); ?>%; background-color: #fea569;"
                                                                                aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                                class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                            <?php echo e($rating[3]); ?>

                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex align-items-center text-body font-size-sm">
                                                                    <div
                                                                        class="__rev-txt"><span
                                                                            class="d-inline-block align-middle "><?php echo e(translate('poor')); ?></span>
                                                                    </div>
                                                                    <div class="w-0 flex-grow">
                                                                        <div class="progress __h-5px">
                                                                            <div class="progress-bar" role="progressbar"
                                                                                style="background-color: <?php echo e($web_config['primary_color']); ?> !important;backbround-color:<?php echo e($web_config['primary_color']); ?>;width: <?php echo $widthRating = ($rating[4] != 0) ? ($rating[4] / $overallRating[1]) * 100 : (0); ?>%;"
                                                                                aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-1">
                                                                        <span
                                                                            class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-3 float-left' : 'ml-3 float-right'); ?>">
                                                                                <?php echo e($rating[4]); ?>

                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row pb-4 mb-3">
                                                            <div class="__inline-30">
                                                                <span class="text-capitalize"><?php echo e(translate('Product_review')); ?></span>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="row pb-4">
                                                        <div class="col-12" id="product-review-list">
                                                            <?php echo $__env->make('web-views.partials.product-reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        </div>

                                                        <?php if(count($product->reviews) > 2): ?>
                                                        <div class="col-12">
                                                            <div class="card-footer d-flex justify-content-center align-items-center">
                                                                <button class="btn text-white view_more_button" style="background: <?php echo e($web_config['primary_color']); ?>;" onclick="load_review()"><?php echo e(translate('view_more')); ?></button>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3">
                    <!-- company reliability -->
                    <?php ($company_reliability = \App\CPU\Helpers::get_business_settings('company_reliability')); ?>
                    <?php if($company_reliability != null): ?>
                        <div class="product-details-shipping-details">
                            <?php $__currentLoopData = $company_reliability; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($value['status'] == 1 && !empty($value['title'])): ?>
                                    <div class="shipping-details-bottom-border">
                                        <div class="px-3 py-3">
                                            <img class="<?php echo e(Session::get('direction') === "rtl" ? 'float-right ml-2' : 'mr-2'); ?> __img-20"  src="<?php echo e(asset("/storage/app/public/company-reliability").'/'.$value['image']); ?>"
                                            onerror="this.src='<?php echo e(asset('/public/assets/front-end/img').'/'.$value['item'].'.png'); ?>'"
                                                    alt="">
                                            <span><?php echo e(translate($value['title'] ?? 'title_not_found')); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                    <!-- end -->
                    <div class="__inline-31">
                        <!--seller section-->
                        <?php if($product->added_by=='seller'): ?>
                            <?php if(isset($product->seller->shop)): ?>
                                <div class="row position-relative">
                                    <div class="col-12 position-relative">
                                        <a href="<?php echo e(route('shopView',['id'=>$product->seller->id])); ?>" class="d-block">
                                            <div class="d-flex __seller-author align-items-center">
                                                <div>
                                                    <img class="__img-60 img-circle" src="<?php echo e(asset('storage/app/public/shop')); ?>/<?php echo e($product->seller->shop->image); ?>"
                                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                        alt="">
                                                </div>
                                                <div class="<?php echo e(Session::get('direction') === "rtl" ? 'mr-2' : 'ml-2'); ?> w-0 flex-grow">
                                                    <h6 >
                                                        <?php echo e($product->seller->shop->name); ?>

                                                    </h6>
                                                    <span><?php echo e(translate('seller_info')); ?></span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">

                                                <?php if(($product->added_by == 'seller' && ($seller_temporary_close || ($product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date)))): ?>
                                                    <span class="chat-seller-info" style="position: absolute; inset-inline-end: 24px; inset-block-start: -4px" data-toggle="tooltip" title="<?php echo e(translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now')); ?>">
                                                        <img src="<?php echo e(asset('/public/assets/front-end/img/info.png')); ?>" alt="i">
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-12 mt-2">
                                        <div class="row d-flex justify-content-between">
                                            <div class="col-6 ">
                                                <div class="d-flex justify-content-center align-items-center rounded __h-79px hr-right-before">
                                                    <div class="text-center">
                                                        <img src="<?php echo e(asset('/public/assets/front-end/img/rating.svg')); ?>" class="mb-2" alt="">
                                                        <div class="__text-12px text-base">
                                                            <strong><?php echo e($total_reviews); ?></strong> <?php echo e(translate('reviews')); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex justify-content-center align-items-center rounded __h-79px">
                                                    <div class="text-center">
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/products.svg')); ?>" class="mb-2" alt="">
                                                        <div class="__text-12px text-base">
                                                            <strong><?php echo e($products_for_review->count()); ?></strong> <?php echo e(translate('products')); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 position-static mt-3">
                                        <div class="chat_with_seller-btns">
                                            <?php if(auth('customer')->id()): ?>
                                                <button class="btn w-100 d-block text-center" style="background: <?php echo e($web_config['primary_color']); ?>;color:#ffffff" data-toggle="modal"
                                                data-target="#chatting_modal" <?php echo e(($product->seller->shop->temporary_close || ($product->seller->shop->vacation_status && date('Y-m-d') >= date('Y-m-d', strtotime($product->seller->shop->vacation_start_date)) && date('Y-m-d') <= date('Y-m-d', strtotime($product->seller->shop->vacation_end_date)))) ? 'disabled' : ''); ?>>
                                                <img src="<?php echo e(asset('/public/assets/front-end/img/chat-16-filled-icon.png')); ?>" class="mb-1" alt="">
                                                    <span class="d-none d-sm-inline-block"><?php echo e(translate('chat_with_seller')); ?></span>
                                                </button>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('customer.auth.login')); ?>" class="btn w-100 d-block text-center" style="background: <?php echo e($web_config['primary_color']); ?>;color:#ffffff" >
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/chat-16-filled-icon.png')); ?>" class="mb-1" alt="">
                                                        <span class="d-none d-sm-inline-block"><?php echo e(translate('chat_with_seller')); ?></span>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="row d-flex justify-content-between">
                                <div class="col-9 ">
                                    <a href="<?php echo e(route('shopView',[0])); ?>" class="row d-flex ">
                                        <div>
                                            <img class="__inline-32"
                                                src="<?php echo e(asset("storage/app/public/company")); ?>/<?php echo e($web_config['fav_icon']->value); ?>"
                                                onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                alt="">
                                        </div>
                                        <div class="<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'mt-3 ml-2'); ?>" onclick="location.href='<?php echo e(route('shopView',[0])); ?>'">
                                            <span class="font-bold __text-16px">
                                                <?php echo e($web_config['name']->value); ?>

                                            </span><br>
                                        </div>

                                        <?php if($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date))): ?>
                                            <div class="<?php echo e(Session::get('direction') === "rtl" ? 'right' : 'ml-3'); ?>">
                                                <span class="chat-seller-info" data-toggle="tooltip" title="<?php echo e(translate('this_shop_is_temporary_closed_or_on_vacation._You_cannot_add_product_to_cart_from_this_shop_for_now')); ?>">
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/info.png')); ?>" alt="i">
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                </div>

                                <div class="col-12 mt-2">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-6 ">
                                            <div class="d-flex justify-content-center align-items-center rounded __h-79px hr-right-before">
                                                <div class="text-center">
                                                    <img src="<?php echo e(asset('/public/assets/front-end/img/rating.svg')); ?>" class="mb-2" alt="">
                                                    <div class="__text-12px text-base">
                                                        <strong><?php echo e($total_reviews); ?></strong> <?php echo e(translate('reviews')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="d-flex justify-content-center align-items-center rounded __h-79px">
                                                <div class="text-center">
                                                   <img src="<?php echo e(asset('/public/assets/front-end/img/products.svg')); ?>" class="mb-2" alt="">
                                                    <div class="__text-12px text-base">
                                                        <strong><?php echo e($products_for_review->count()); ?></strong> <?php echo e(translate('products')); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <a href="<?php echo e(route('shopView',[0])); ?>" class="text-center d-block w-100">
                                        <button class="btn text-center d-block w-100" style="background: <?php echo e($web_config['primary_color']); ?>;color:#ffffff" >
                                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                            <?php echo e(translate('visit_Store')); ?>

                                        </button>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="pt-4 pb-3">
                        <span class=" __text-16px font-bold text-capitalize">
                            <?php echo e(translate('more_from_the_store')); ?>

                        </span>
                    </div>
                    <div>
                        <?php $__currentLoopData = $more_product_from_seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo $__env->make('web-views.partials.seller-products-product-details',['product'=>$item,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- for mobile -->
        <div class="bottom-sticky bg-white d-sm-none">
            <div class="d-flex flex-column gap-1 py-2">
                <div class="d-flex justify-content-center align-items-center fs-13">
                    <div class="product-description-label text-dark font-bold"><strong class="text-capitalize"><?php echo e(translate('total_price')); ?></strong> : </div>
                    &nbsp; <strong id="chosen_price_mobile" class="text-base"></strong>
                    <small class="ml-2  font-regular">
                        (<small><?php echo e(translate('tax')); ?> : </small>
                        <small id="set-tax-amount-mobile"></small>)
                    </small>
                </div>
                <div class="d-flex gap-3 justify-content-center">
                    <?php if(($product->added_by == 'seller' && ($seller_temporary_close || (isset($product->seller->shop) && $product->seller->shop->vacation_status && $current_date >= $seller_vacation_start_date && $current_date <= $seller_vacation_end_date))) ||
                        ($product->added_by == 'admin' && ($inhouse_temporary_close || ($inhouse_vacation_status && $current_date >= $inhouse_vacation_start_date && $current_date <= $inhouse_vacation_end_date)))): ?>
                        <button class="btn btn-secondary btn-sm btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>" type="button" disabled>
                            <?php echo e(translate('buy_now')); ?>

                        </button>
                        <button class="btn btn--primary btn-sm string-limit btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>" type="button" disabled>
                            <?php echo e(translate('add_to_cart')); ?>

                        </button>
                   <?php else: ?>
                       <button class="btn btn-secondary btn-sm btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>" onclick="buy_now()" type="button">
                           <span class="string-limit"><?php echo e(translate('buy_now')); ?></span>
                       </button>
                       <button
                           class="btn btn--primary btn-sm string-limit btn-gap-<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>"
                           onclick="addToCart()" type="button">
                           <span class="string-limit"><?php echo e(translate('add_to_cart')); ?></span>
                       </button>
                   <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- end -->

        <?php if(count($relatedProducts)>0): ?>
            <div class="container rtl" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                <div class="card __card border-0">
                    <div class="card-body">
                        <div class="row flex-between">
                            <div style="<?php echo e(Session::get('direction') === "rtl" ? 'margin-right: 5px;' : 'margin-left: 5px;'); ?>">
                                <h4 class="text-capitalize font-bold"><?php echo e(translate('similar_products')); ?></h4>
                            </div>
                            <div class="view_all d-flex justify-content-center align-items-center">
                                <div>
                                    <?php ($category=json_decode($product['category_ids'])); ?>
                                    <?php if($category): ?>
                                        <a class="text-capitalize view-all-text" style="color:<?php echo e($web_config['primary_color']); ?> !important;<?php echo e(Session::get('direction') === "rtl" ? 'margin-left:10px;' : 'margin-right: 8px;'); ?>"
                                        href="<?php echo e(route('products',['id'=> $category[0]->id,'data_from'=>'category','page'=>1])); ?>"><?php echo e(translate('view_all')); ?>

                                        <i class="czi-arrow-<?php echo e(Session::get('direction') === "rtl" ? 'left mr-1 ml-n1 mt-1 ' : 'right ml-1 mr-n1'); ?>"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- Grid-->

                        <!-- Product-->
                        <div class="row g-3 mt-1">
                            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-xl-2 col-sm-3 col-6">
                                    <?php echo $__env->make('web-views.partials._single-product',['product'=>$relatedProduct,'decimal_point_settings'=>$decimal_point_settings], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="modal fade rtl" id="show-modal-view" tabindex="-1" role="dialog" aria-labelledby="show-modal-image"
            aria-hidden="true" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body flex justify-content-center">
                        <button class="btn btn-default __inline-33" style="<?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: -7px;"
                                data-dismiss="modal">
                            <i class="fa fa-close"></i>
                        </button>
                        <img class="element-center" id="attachment-view" src="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <?php echo $__env->make('layouts.front-end.partials.modal._chatting',['seller'=>$product->seller], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="modal fade" id="remove-wishlist-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-5">
                    <div class="text-center">
                        <img src="<?php echo e(asset('/public/assets/front-end/img/icons/remove-wishlist.png')); ?>" alt="">
                        <h6 class="font-semibold mt-3 mb-4 mx-auto __max-w-220"><?php echo e(translate('Product_has_been_removed_from_wishlist')); ?>?</h6>
                    </div>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="javascript:" class="btn btn--primary __rounded-10" data-dismiss="modal">
                            <?php echo e(translate('Okay')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            const $stickyElement = $('.bottom-sticky');
            const $offsetElement = $('.product-details-shipping-details');

            $(window).on('scroll', function() {
                const elementOffset = $offsetElement.offset().top;
                const scrollTop = $(window).scrollTop();

                if (scrollTop >= elementOffset) {
                    $stickyElement.addClass('stick');
                } else {
                    $stickyElement.removeClass('stick');
                }
            });
        });
    </script>

    <script type="text/javascript">
        cartQuantityInitialize();
        getVariantPrice();
        $('#add-to-cart-form input').on('change', function () {
            getVariantPrice();
        });

        function showInstaImage(link) {
            $("#attachment-view").attr("src", link);
            $('#show-modal-view').modal('toggle')
        }

        function focus_preview_image_by_color(key){
            $('a[href="#image'+key+'"]')[0].click();
        }
    </script>
    <script>
        let load_review_count = 1;
        function load_review()
        {

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
            $.ajax({
                    type: "post",
                    url: '<?php echo e(route('review-list-product')); ?>',
                    data:{
                        product_id:<?php echo e($product->id); ?>,
                        offset:load_review_count
                    },
                    success: function (data) {
                        $('#product-review-list').append(data.productReview)
                        if(data.checkReviews == 0){
                            $('.view_more_button').removeClass('d-none').addClass('d-none')
                        }else{
                            $('.view_more_button').addClass('d-none').removeClass('d-none')
                        }
                    }
                });
                load_review_count++
        }
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

                    toastr.success('<?php echo e(translate("message_send_successfully")); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#chat-form').trigger('reset');
                }
            });

        });
    </script>

    <script type="text/javascript"
            src="https://platform-api.sharethis.com/js/sharethis.js#property=5f55f75bde227f0012147049&product=sticky-share-buttons"
            async="async"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.front-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/web-views/products/details.blade.php ENDPATH**/ ?>