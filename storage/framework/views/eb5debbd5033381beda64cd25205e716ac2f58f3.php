<h3 class="mt-4 mb-3 text-center text-lg-left mobile-fs-20"><?php echo e(translate('shopping_cart')); ?></h3>

<?php ($shippingMethod=\App\CPU\Helpers::get_business_settings('shipping_method')); ?>
<?php ($cart=\App\Model\Cart::where(['customer_id' => (auth('customer')->check() ? auth('customer')->id() : session('guest_id'))])->get()->groupBy('cart_group_id')); ?>

<div class="row g-3 mx-max-md-0">
    <!-- List of items-->
    <section class="col-lg-8 px-max-md-0">
        <?php if(count($cart)==0): ?>
            <?php ($physical_product = false); ?>
        <?php endif; ?>
            <!-- for web -->
            <div class="table-responsive d-none d-lg-block">
                <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table __cart-table">
                    <thead class="thead-light">
                        <tr class="">
                            <th class="font-weight-bold __w-45">
                                <div class="pl-3">
                                    <?php echo e(translate('product')); ?>

                                </div>
                            </th>
                            <th class="font-weight-bold pl-0 __w-15p text-capitalize"><?php echo e(translate('unit_price')); ?></th>
                            <th class="font-weight-bold __w-15p">
                                <span class="pl-3"><?php echo e(translate('qty')); ?></span>
                            </th>
                            <th class="font-weight-bold __w-15p text-end">
                                <div class="pr-3">
                                    <?php echo e(translate('total')); ?>

                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_key=>$group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card __card cart_information __cart-table mb-3">
                        <?php
                            $physical_product = false;
                            $total_shipping_cost = 0;
                            foreach ($group as $row) {
                                if ($row->product_type == 'physical') {
                                    $physical_product = true;
                                }
                                if ($row->product_type == 'physical' && $row->shipping_type != "order_wise") {
                                    $total_shipping_cost += $row->shipping_cost;
                                }
                            }

                        ?>

                        <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($shippingMethod=='inhouse_shipping'): ?>
                                    <?php
                                        $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                                        $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                                    ?>
                            <?php else: ?>
                                    <?php
                                    if ($cartItem->seller_is == 'admin') {
                                        $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                                        $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                                    } else {
                                        $seller_shipping = \App\Model\ShippingType::where('seller_id', $cartItem->seller_id)->first();
                                        $shipping_type = isset($seller_shipping) == true ? $seller_shipping->shipping_type : 'order_wise';
                                    }
                                    ?>
                            <?php endif; ?>

                            <?php if($cart_key==0): ?>
                                <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 px-0">
                                    <?php ($verify_status = \App\CPU\OrderManager::minimum_order_amount_verify($request, $group_key)); ?>
                                    <?php if($cartItem->seller_is=='admin'): ?>
                                        <a href="<?php echo e(route('shopView',['id'=>0])); ?>" class="text-primary d-flex align-items-center gap-2">
                                            <img src="<?php echo e(asset('public/assets/front-end/img/cart-store.png')); ?>" alt="">
                                            <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?>

                                            <?php if($verify_status['minimum_order_amount'] > $verify_status['amount']): ?>
                                                <span class="pl-1 text-danger pulse-button" data-toggle="tooltip" data-placement="right"
                                                    onclick="minimum_Order_Amount_message(this.getAttribute('data-title'))"
                                                    data-title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>" title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>">
                                                    <i class="czi-security-announcement"></i>
                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('shopView',['id'=>$cartItem->seller_id])); ?>" class="text-primary d-flex align-items-center gap-2">
                                            <img src="<?php echo e(asset('public/assets/front-end/img/cart-store.png')); ?>" alt="">
                                            <?php echo e(\App\Model\Shop::where(['seller_id'=>$cartItem['seller_id']])->first()->name); ?>

                                            <?php if($verify_status['minimum_order_amount'] > $verify_status['amount']): ?>
                                                <span class="pl-1 text-danger pulse-button" data-toggle="tooltip" data-placement="right"
                                                    onclick="minimum_Order_Amount_message(this.getAttribute('data-title'))"
                                                    data-title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>" title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>">
                                                    <i class="czi-security-announcement"></i>
                                                </span>
                                            <?php endif; ?>
                                        </a>
                                    <?php endif; ?>

                                <?php ($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first()); ?>

                                <!--  shipping dropdown -->
                                <div class=" bg-white select-method-border rounded">
                                <?php if($physical_product && $shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise'): ?>
                                    <?php if(isset($choosen_shipping)==false): ?>
                                        <?php ($choosen_shipping['shipping_method_id']=0); ?>
                                    <?php endif; ?>
                                    <?php ( $shippings=\App\CPU\Helpers::get_shipping_methods($cartItem['seller_id'],$cartItem['seller_is'])); ?>
                                        <?php if($physical_product && $shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise'): ?>

                                        <div class="d-sm-flex">
                                            <?php if(isset($choosen_shipping['shipping_cost'])): ?>
                                                <div class="text-sm-nowrap mx-sm-2 mt-sm-2 mb-1">
                                                    <span class="font-weight-bold"><?php echo e(translate('shipping_cost')); ?></span> :<span><?php echo e(App\CPU\Helpers::currency_converter($choosen_shipping['shipping_cost'])); ?></span>
                                                </div>
                                            <?php endif; ?>

                                            <!-- chosen shipping method-->
                                            <select class="form-control fs-13 font-weight-bold text-capitalize border-aliceblue max-240px" onchange="set_shipping_id(this.value,'<?php echo e($cartItem['cart_group_id']); ?>')">
                                                <option><?php echo e(translate('choose_shipping_method')); ?></option>
                                                <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($shipping['id']); ?>" <?php echo e($choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''); ?>>
                                                        <?php echo e(translate('shipping_method')); ?> : <?php echo e($shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php endif; ?>
                                <?php else: ?>
                                    <?php if($shipping_type != 'order_wise'): ?>
                                        <div class="">
                                            <span class="font-weight-bold"><?php echo e(translate('total_shipping_cost')); ?></span> : <span><?php echo e(\App\CPU\Helpers::currency_converter($total_shipping_cost)); ?></span>
                                        </div>
                                    <?php elseif($shipping_type == 'order_wise' && $choosen_shipping): ?>
                                        <div class="">
                                            <span class="font-weight-bold"><?php echo e(translate('total_shipping_cost')); ?></span> : <span><?php echo e(\App\CPU\Helpers::currency_converter($choosen_shipping->shipping_cost)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>

                                </div>
                                <!-- end shipping dropdown -->
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <table class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table __cart-table">
                            <tbody>
                            <?php
                                $physical_product = false;
                                foreach ($group as $row) {
                                    if ($row->product_type == 'physical') {
                                        $physical_product = true;
                                    }
                                }
                            ?>
                            <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php ($product = $cartItem->all_product); ?>
                            <?php ($product_status = $cartItem->all_product->status); ?>
                                <tr>
                                    <td class="__w-45">
                                        <div class="d-flex gap-3">
                                            <div class="">
                                                <a href="<?php echo e($product_status == 1 ? route('product',$cartItem['slug']) : 'javascript:'); ?>" class="position-relative overflow-hidden">
                                                    <img class="rounded __img-62 <?php echo e($product_status == 0?'blur-section':''); ?>"
                                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                            src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                                                            alt="Product">
                                                    <?php if($product_status == 0): ?>
                                                        <span class="temporary-closed position-absolute text-center p-2">
                                                            <span><?php echo e(translate('N/A')); ?></span>
                                                        </span>
                                                    <?php endif; ?>
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column gap-1">
                                                <div class="text-break __line-2 __w-18rem <?php echo e($product_status == 0?'blur-section':''); ?>">
                                                    <a href="<?php echo e($product_status == 1 ? route('product',$cartItem['slug']) : 'javascript:'); ?>"><?php echo e($cartItem['name']); ?></a>
                                                </div>

                                                <div class="d-flex flex-wrap gap-2 <?php echo e($product_status == 0?'blur-section':''); ?>">
                                                    <?php $__currentLoopData = json_decode($cartItem['variations'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="">
                                                            <span class="__text-12px text-capitalize">
                                                                <span class="text-muted"><?php echo e($key1); ?> </span> : <span class="fw-semibold"><?php echo e($variation); ?></span>
                                                            </span>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <?php if( $shipping_type != 'order_wise'): ?>
                                                    <div class="d-flex flex-wrap gap-2 <?php echo e($product_status == 0?'blur-section':''); ?>">
                                                        <span class="fw-semibold"> <?php echo e(translate('shipping_cost')); ?></span>:<span><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['shipping_cost'])); ?></span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="<?php echo e($product_status == 0?'blur-section':''); ?> __w-15p">
                                        <div class="text-center">
                                            <div class="fw-semibold"><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price']-$cartItem['discount'])); ?></div>
                                            <span class="text-nowrap fs-10">
                                                <?php if($cartItem->tax_model === "exclude"): ?>
                                                    (<?php echo e(translate('tax')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['tax']*$cartItem['quantity'])); ?>)
                                                <?php else: ?>
                                                    (<?php echo e(translate('tax_included')); ?>)
                                                <?php endif; ?>
                                             </span>
                                        </div>
                                    </td>
                                    <td class="__w-15p text-center">
                                        <!-- Qty update -->
                                        <?php ($minimum_order=\App\CPU\ProductManager::get_product($cartItem['product_id'])); ?>
                                        <?php if($product_status == 1): ?>
                                            <div class="qty d-flex justify-content-center align-itmes-center gap-3">
                                                <span class="qty_minus " onclick="updateCartQuantityList('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '-1', '<?php echo e($cartItem['quantity'] == $product->minimum_order_qty ? 'delete':'minus'); ?>')">
                                                    <i class="<?php echo e($cartItem['quantity'] == (isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1) ? 'tio-delete text-danger' : 'tio-remove'); ?>"></i>
                                                </span>
                                                <input type="text" class="qty_input cartQuantity<?php echo e($cartItem['id']); ?>" value="<?php echo e($cartItem['quantity']); ?>" name="quantity[<?php echo e($cartItem['id']); ?>]" id="cart_quantity_web<?php echo e($cartItem['id']); ?>"
                                                    onchange="updateCartQuantityList('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '0')" data-min="<?php echo e(isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1); ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                <span class="qty_plus" onclick="updateCartQuantityList('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '1')">
                                                    <i class="tio-add"></i>
                                                </span>
                                            </div>
                                        <?php else: ?>
                                        <div class="qty d-flex justify-content-center align-itmes-center gap-3">
                                            <span onclick="updateCartQuantityList('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '-<?php echo e($cartItem['quantity']); ?>', 'delete')">
                                                <i class="tio-delete text-danger" data-toggle="tooltip" data-title="<?php echo e(translate('product_not_available_right_now')); ?>"></i>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                    </td>
                                    <td class="__w-15p text-end <?php echo e($product_status == 0?'blur-section':''); ?>">
                                        <div>
                                            <?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])); ?>

                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!-- free delivery section -->
                        <?php ($free_delivery_status = \App\CPU\OrderManager::free_delivery_order_amount($group[0]->cart_group_id)); ?>
                        <?php if($free_delivery_status['status'] && (session()->missing('coupon_type') || session('coupon_type') !='free_delivery')): ?>
                            <div class="free-delivery-area px-3 mb-3 mb-lg-2">
                                <div class="d-flex align-items-center gap-8">
                                    <img class="__w-30px" src="<?php echo e(asset('public/assets/front-end/img/icons/free-shipping.png')); ?>" alt="" >
                                    <?php if($free_delivery_status['amount_need'] <= 0): ?>
                                        <span class="text-muted fs-12 mt-1"><?php echo e(translate('you_Get_Free_Delivery_Bonus')); ?></span>
                                    <?php else: ?>
                                    <span class="need-for-free-delivery font-bold fs-12 mt-1 text-primary"><?php echo e(\App\CPU\Helpers::currency_converter($free_delivery_status['amount_need'])); ?></span>
                                    <span class="text-muted fs-12 mt-1"><?php echo e(translate('add_more_for_free_delivery')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="progress free-delivery-progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo e($free_delivery_status['percentage']); ?>%" aria-valuenow="<?php echo e($free_delivery_status['percentage']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!-- end of free delivery section -->
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- end web -->
            <!-- Mobile -->
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group_key=>$group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cart_information mb-3 pb-3 w-100 d-lg-none">
                <?php
                    $physical_product = false;
                    $total_shipping_cost = 0;
                    foreach ($group as $row) {
                        if ($row->product_type == 'physical') {
                            $physical_product = true;
                        }
                        if ($row->product_type == 'physical' && $row->shipping_type != "order_wise") {
                            $total_shipping_cost += $row->shipping_cost;
                        }
                    }

                ?>

                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($shippingMethod=='inhouse_shipping'): ?>
                            <?php
                                $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                                $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                            ?>
                    <?php else: ?>
                            <?php
                            if ($cartItem->seller_is == 'admin') {
                                $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                                $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                            } else {
                                $seller_shipping = \App\Model\ShippingType::where('seller_id', $cartItem->seller_id)->first();
                                $shipping_type = isset($seller_shipping) == true ? $seller_shipping->shipping_type : 'order_wise';
                            }
                            ?>
                    <?php endif; ?>

                    <?php if($cart_key==0): ?>
                        <div class="card-header d-flex flex-column gap-2 border-0 justify-content-between align-items-center">
                            <?php ($verify_status = \App\CPU\OrderManager::minimum_order_amount_verify($request, $group_key)); ?>
                            <?php if($cartItem->seller_is=='admin'): ?>
                                <a href="<?php echo e(route('shopView',['id'=>0])); ?>" class="text-primary d-flex align-items-center gap-2">
                                    <img src="<?php echo e(asset('public/assets/front-end/img/cart-store.png')); ?>">
                                    <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?>

                                    <?php if($verify_status['minimum_order_amount'] > $verify_status['amount']): ?>
                                        <span class="pl-1 text-danger pulse-button" data-toggle="tooltip" data-placement="right"
                                            onclick="minimum_Order_Amount_message(this.getAttribute('data-title'))"
                                            data-title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>" title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>">
                                            <i class="czi-security-announcement"></i>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('shopView',['id'=>$cartItem->seller_id])); ?>" class="text-primary d-flex align-items-center gap-2">
                                    <img src="<?php echo e(asset('public/assets/front-end/img/cart-store.png')); ?>">
                                    <?php echo e(\App\Model\Shop::where(['seller_id'=>$cartItem['seller_id']])->first()->name); ?>

                                    <?php if($verify_status['minimum_order_amount'] > $verify_status['amount']): ?>
                                        <span class="pl-1 text-danger pulse-button" data-toggle="tooltip" data-placement="right"
                                            onclick="minimum_Order_Amount_message(this.getAttribute('data-title'))"
                                            data-title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>" title="<?php echo e(translate('minimum_Order_Amount')); ?> <?php echo e(\App\CPU\Helpers::currency_converter($verify_status['minimum_order_amount'])); ?> <?php echo e(translate('for')); ?> <?php if($cartItem->seller_is=='admin'): ?> <?php echo e(\App\CPU\Helpers::get_business_settings('company_name')); ?> <?php else: ?> <?php echo e(\App\CPU\get_shop_name($cartItem['seller_id'])); ?> <?php endif; ?>">
                                            <i class="czi-security-announcement"></i>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            <?php endif; ?>


                            <!--  shipping dropdown -->
                            <div class=" bg-white select-method-border rounded">
                                <?php if($physical_product && $shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise'): ?>
                                    <?php ($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first()); ?>
                                    <?php if(isset($choosen_shipping)==false): ?>
                                        <?php ($choosen_shipping['shipping_method_id']=0); ?>
                                    <?php endif; ?>
                                    <?php ( $shippings=\App\CPU\Helpers::get_shipping_methods($cartItem['seller_id'],$cartItem['seller_is'])); ?>
                                        <?php if($physical_product && $shippingMethod=='sellerwise_shipping' && $shipping_type == 'order_wise'): ?>

                                            <div class="d-sm-flex">
                                            <!-- choosen shipping method-->
                                                <select class="form-control fs-13 font-weight-bold text-capitalize border-aliceblue max-240px" onchange="set_shipping_id(this.value,'<?php echo e($cartItem['cart_group_id']); ?>')">
                                                    <option><?php echo e(translate('choose_shipping_method')); ?></option>
                                                    <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($shipping['id']); ?>" <?php echo e($choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''); ?>>
                                                            <?php echo e(translate('shipping_method')); ?> : <?php echo e($shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php if(isset($choosen_shipping['shipping_cost'])): ?>
                                                <div class="text-sm-nowrap mt-2 text-center fs-12">
                                                    <span class="font-weight-bold"><?php echo e(translate('shipping_cost')); ?></span> :<span><?php echo e(App\CPU\Helpers::currency_converter($choosen_shipping['shipping_cost'])); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                    <?php if($shipping_type != 'order_wise'): ?>
                                        <div class="text-sm-nowrap text-center fs-12">
                                            <span class="font-weight-bold"><?php echo e(translate('total_shipping_cost')); ?></span> : <span><?php echo e(\App\CPU\Helpers::currency_converter($total_shipping_cost)); ?></span>
                                        </div>
                                    <?php elseif($shipping_type == 'order_wise' && $choosen_shipping): ?>
                                        <div class="text-sm-nowrap text-center fs-12">
                                            <span class="font-weight-bold"><?php echo e(translate('total_shipping_cost')); ?></span> : <span><?php echo e(\App\CPU\Helpers::currency_converter($choosen_shipping->shipping_cost)); ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <!-- end shipping dropdown -->
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $physical_product = false;
                    foreach ($group as $row) {
                        if ($row->product_type == 'physical') {
                            $physical_product = true;
                        }
                    }
                ?>
                <?php $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_key=>$cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php ($product = $cartItem->all_product); ?>
                <?php ($product_status = $cartItem->all_product->status); ?>
                    <div class="d-flex justify-content-between gap-3 p-3 fs-12  <?php echo e(count($group)-1 == $cart_key ? '' :'border-bottom border-aliceblue'); ?>">
                        <div class="d-flex gap-3">
                            <div class="">
                                <a href="<?php echo e($product_status == 1 ? route('product',$cartItem['slug']) : 'javascript:'); ?>" class="position-relative overflow-hidden">
                                    <img class="rounded __img-48 <?php echo e($product_status == 0?'blur-section':''); ?>"
                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($cartItem['thumbnail']); ?>"
                                            alt="Product">
                                    <?php if($product_status == 0): ?>
                                        <span class="temporary-closed position-absolute text-center p-2">
                                            <span><?php echo e(translate('N/A')); ?></span>
                                        </span>
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="d-flex flex-column gap-1">
                                <div class="text-break __line-2 <?php echo e($product_status == 0?'blur-section':''); ?>">
                                    <a href="<?php echo e($product_status == 1 ? route('product',$cartItem['slug']) : 'javascript:'); ?>"><?php echo e($cartItem['name']); ?></a>
                                </div>

                                <div class="d-flex flex-wrap column-gap-2 <?php echo e($product_status == 0?'blur-section':''); ?>">
                                    <?php $__currentLoopData = json_decode($cartItem['variations'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 =>$variation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="">
                                            <span class="__text-12px text-capitalize">
                                               <span class="text-muted"> <?php echo e($key1); ?> </span> : <span class="fw-semibold"><?php echo e($variation); ?></span>
                                            </span>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="d-flex flex-wrap column-gap-2">
                                    <div class="text-nowrap text-muted"><?php echo e(translate('unit_price')); ?> :</div>
                                    <div class="text-start d-flex gap-1 flex-wrap">
                                        <div class="fw-semibold"><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['price']-$cartItem['discount'])); ?></div>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <div class="text-nowrap text-muted"><?php echo e(translate('total')); ?> :</div>
                                    <div class="fw-semibold">
                                        <?php echo e(\App\CPU\Helpers::currency_converter(($cartItem['price']-$cartItem['discount'])*$cartItem['quantity'])); ?>


                                    </div>
                                    <span class="text-nowrap fs-10 mt-1px">
                                        <?php if($cartItem->tax_model === "exclude"): ?>
                                            (<?php echo e(translate('tax')); ?> : <?php echo e(\App\CPU\Helpers::currency_converter($cartItem['tax']*$cartItem['quantity'])); ?>)
                                        <?php else: ?>
                                            (<?php echo e(translate('tax_included')); ?>)
                                        <?php endif; ?>
                                    </span>
                                </div>
                                <?php if( $shipping_type != 'order_wise'): ?>
                                    <div class="d-flex flex-wrap gap-2 <?php echo e($product_status == 0?'blur-section':''); ?>">
                                        <span class="text-muted"> <?php echo e(translate('shipping_cost')); ?></span>:<span class="fw-semibold"><?php echo e(\App\CPU\Helpers::currency_converter($cartItem['shipping_cost'])); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div>
                            <!-- Qty update -->
                            <?php ($minimum_order=\App\CPU\ProductManager::get_product($cartItem['product_id'])); ?>
                            <?php if($product_status == 1): ?>
                                <div class="qty d-flex flex-column align-items-center gap-3">
                                    <span class="qty_plus" onclick="updateCartQuantityListMobile('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '1')">
                                        <i class="tio-add"></i>
                                    </span>
                                    <input type="number" class="qty_input cartQuantity<?php echo e($cartItem['id']); ?>" value="<?php echo e($cartItem['quantity']); ?>" name="quantity[<?php echo e($cartItem['id']); ?>]" id="cart_quantity_mobile<?php echo e($cartItem['id']); ?>"
                                    onchange="updateCartQuantityListMobile('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '0')" data-min="<?php echo e(isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1); ?>" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    <span class="qty_minus " onclick="updateCartQuantityListMobile('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '-1', '<?php echo e($cartItem['quantity'] == $product->minimum_order_qty ? 'delete':'minus'); ?>')">
                                        <i class="<?php echo e($cartItem['quantity'] == (isset($cartItem->product->minimum_order_qty) ? $cartItem->product->minimum_order_qty : 1) ? 'tio-delete text-danger' : 'tio-remove'); ?>"></i>
                                    </span>
                                </div>
                            <?php else: ?>
                            <div class="qty d-flex flex-column align-items-center gap-3">
                                <span class="" onclick="updateCartQuantityListMobile('<?php echo e($product->minimum_order_qty); ?>', '<?php echo e($cartItem['id']); ?>', '-<?php echo e($cartItem['quantity']); ?>', 'delete')">
                                    <i class="tio-delete text-danger" data-toggle="tooltip" data-title="<?php echo e(translate('product_not_available_right_now')); ?>"></i>
                                </span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- free delivery section -->
                <?php ($free_delivery_status = \App\CPU\OrderManager::free_delivery_order_amount($group[0]->cart_group_id)); ?>
                <?php if($free_delivery_status['status'] && (session()->missing('coupon_type') || session('coupon_type') !='free_delivery')): ?>
                    <div class="free-delivery-area px-3 mb-3 mb-lg-2">
                        <div class="d-flex align-items-center gap-8">
                            <img class="__w-30px" src="<?php echo e(asset('public/assets/front-end/img/icons/free-shipping.png')); ?>" alt="" >
                            <?php if($free_delivery_status['amount_need'] <= 0): ?>
                                <span class="text-muted fs-12 mt-1"><?php echo e(translate('you_Get_Free_Delivery_Bonus')); ?></span>
                            <?php else: ?>
                            <span class="need-for-free-delivery font-bold fs-12 mt-1 text-primary"><?php echo e(\App\CPU\Helpers::currency_converter($free_delivery_status['amount_need'])); ?></span>
                            <span class="text-muted fs-12 mt-1"><?php echo e(translate('add_more_for_free_delivery')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="progress free-delivery-progress">
                            <div class="progress-bar" role="progressbar" style="width: <?php echo e($free_delivery_status['percentage']); ?>%" aria-valuenow="<?php echo e($free_delivery_status['percentage']); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- end of free delivery section -->
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- End Mobile -->


            <?php if($shippingMethod=='inhouse_shipping'): ?>
                <?php
                    $physical_product = false;
                    foreach($cart as $group_key=>$group){
                        foreach ($group as $row) {
                            if ($row->product_type == 'physical') {
                                $physical_product = true;
                            }
                        }
                    }
                ?>

                <?php
                    $admin_shipping = \App\Model\ShippingType::where('seller_id', 0)->first();
                    $shipping_type = isset($admin_shipping) == true ? $admin_shipping->shipping_type : 'order_wise';
                ?>
                <?php if($shipping_type == 'order_wise' && $physical_product): ?>
                    <?php ($shippings=\App\CPU\Helpers::get_shipping_methods(1,'admin')); ?>
                    <?php ($choosen_shipping=\App\Model\CartShipping::where(['cart_group_id'=>$cartItem['cart_group_id']])->first()); ?>

                    <?php if(isset($choosen_shipping)==false): ?>
                        <?php ($choosen_shipping['shipping_method_id']=0); ?>
                    <?php endif; ?>
                    <div class="px-3 px-md-0 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <select class="form-control border-aliceblue" onchange="set_shipping_id(this.value,'all_cart_group')">
                                    <option><?php echo e(translate('choose_shipping_method')); ?></option>
                                    <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            value="<?php echo e($shipping['id']); ?>" <?php echo e($choosen_shipping['shipping_method_id']==$shipping['id']?'selected':''); ?>>
                                            <?php echo e(translate('shipping_method')); ?> : <?php echo e($shipping['title'].' ( '.$shipping['duration'].' ) '.\App\CPU\Helpers::currency_converter($shipping['cost'])); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if( $cart->count() == 0): ?>
            <div class="card mb-4">
                <div class="card-body py-5">
                    <div class="py-md-4">
                        <div class="text-center text-capitalize">
                            <img class="mb-3 mw-100" src="<?php echo e(asset('/public/assets/front-end/img/icons/empty-cart.svg')); ?>" alt="">
                            <p class="text-capitalize"><?php echo e(translate('Your_Cart_is_Empty')); ?>!</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>


        <div class="px-3 px-md-0 mt-3 mt-md-0">
            <form  method="get">
                <div class="mb-lg-3">
                    <div class="row">
                        <div class="col-12">
                            <label for="phoneLabel" class="form-label input-label"><?php echo e(translate('order_note')); ?> <span
                                                class="input-label-secondary">(<?php echo e(translate('optional')); ?>)</span></label>
                            <textarea class="form-control w-100 border-aliceblue" id="order_note" name="order_note"><?php echo e(session('order_note')); ?></textarea>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Sidebar-->
    <?php echo $__env->make('web-views.partials._order-summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</div>

<?php $__env->startPush('script'); ?>
    <script>
         function updateCartQuantityList(minimum_order_qty, key, incr, e) {
            let quantity_id = 'cart_quantity_web';
            updateCartCommon(minimum_order_qty, key,incr,e, quantity_id);
        }

        function updateCartQuantityListMobile(minimum_order_qty, key, incr, e) {
            let quantity_id = 'cart_quantity_mobile';
            updateCartCommon(minimum_order_qty, key,incr,e, quantity_id);
        }

         function updateCartCommon(minimum_order_qty, key,incr,e,quantity_id) {
            let quantity = parseInt($("#"+quantity_id+ key).val())+parseInt(incr);
            let ex_quantity = $("#"+quantity_id+ key);
            if(minimum_order_qty > quantity && e != 'delete' ) {
                toastr.error('<?php echo e(translate("minimum_order_quantity_cannot_be_less_than_")); ?>' + minimum_order_qty);
                $(".cartQuantity" + key).val(minimum_order_qty);
                return false;
            }
            if (ex_quantity.val() == ex_quantity.data('min') && e == 'delete') {
                $.post("<?php echo e(route('cart.remove')); ?>", {
                    _token: '<?php echo e(csrf_token()); ?>',
                    key: key
                },
                function (response) {
                    updateNavCart();
                    toastr.info("<?php echo e(translate('item_has_been_removed_from_cart')); ?>", {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    let segment_array = window.location.pathname.split('/');
                    let segment = segment_array[segment_array.length - 1];
                    if (segment === 'checkout-payment' || segment === 'checkout-details') {
                        location.reload();
                    }
                    $('#cart-summary').empty().html(response.data);
                });
            }else{
                $.post('<?php echo e(route('cart.updateQuantity')); ?>', {
                    _token: '<?php echo e(csrf_token()); ?>',
                    key,
                    quantity
                }, function (response) {
                    if (response.status == 0) {
                        toastr.error(response.message, {
                            CloseButton: true,
                            ProgressBar: true
                        });
                        $(".cartQuantity" + key).val(response['qty']);
                    } else {
                        updateNavCart();
                        $('#cart-summary').empty().html(response);
                    }
                });
            }
        }
        //Increase/Decrease Product Quantity
        /* Increase */
        $('.qty_plus').on('click', function () {
            var $qty = $(this).parent().find('input');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal)) {
                $qty.val(currentVal + 1);
            }
            quantityListener();
        });

        /* Decrease */
        $('.qty_minus').on('click', function () {
            var $qty = $(this).parent().find('input');
            var currentVal = parseInt($qty.val());
            if (!isNaN(currentVal) && currentVal > 1) {
                $qty.val(currentVal - 1);
            }
            quantityListener();
        });

        /* show hide delete icon */
        function quantityListener() {
            $('.qty_input').each(function () {
                var qty = $(this);
                if (qty.val() == 1) {
                    qty.siblings('.qty_minus').html('<i class="tio-delete text-danger fs-12"></i>')
                } else {
                    qty.siblings('.qty_minus').html('<i class="tio-remove"></i>')
                }
            });
        }
        quantityListener();
    </script>
    <script>
        cartQuantityInitialize();

        function set_shipping_id(id, cart_group_id) {
            $.get({
                url: '<?php echo e(url('/')); ?>/customer/set-shipping-method',
                dataType: 'json',
                data: {
                    id: id,
                    cart_group_id: cart_group_id
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    location.reload();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }
    </script>
    <script>
        function checkout() {
            let order_note = $('#order_note').val();
            //console.log(order_note);
            $.post({
                url: "<?php echo e(route('order_note')); ?>",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    order_note: order_note,

                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    let url = "<?php echo e(route('checkout-details')); ?>";
                    location.href = url;

                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        }

    function minimum_Order_Amount_message(data)
    {
        toastr.error(data, {
            CloseButton: true,
            ProgressBar: true
        });
    }

</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/layouts/front-end/partials/cart_details.blade.php ENDPATH**/ ?>