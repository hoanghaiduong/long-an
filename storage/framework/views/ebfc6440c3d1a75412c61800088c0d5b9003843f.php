<?php $__env->startSection('title', translate('order_List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div>
            <!-- Page Title -->
            <div class="d-flex flex-wrap gap-2 align-items-center mb-3">
                <h2 class="h1 mb-0">
                    <img src="<?php echo e(asset('/public/assets/back-end/img/all-orders.png')); ?>" class="mb-1 mr-1" alt="">
                    <span class="page-header-title">
                        <?php if($status =='processing'): ?>
                            <?php echo e(translate('packaging')); ?>

                        <?php elseif($status =='failed'): ?>
                            <?php echo e(translate('failed_to_Deliver')); ?>

                        <?php elseif($status == 'all'): ?>
                            <?php echo e(translate('all')); ?>

                        <?php else: ?>
                            <?php echo e(translate(str_replace('_',' ',$status))); ?>

                        <?php endif; ?>
                    </span>
                    <?php echo e(translate('orders')); ?>

                </h2>
                <span class="badge badge-soft-dark radius-50 fz-14"><?php echo e($orders->total()); ?></span>
            </div>
            <!-- End Page Title -->

            <!-- Order States -->
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo e(route('admin.orders.list',['status'=>request('status')])); ?>" id="form-data" method="GET">
                        <div class="row gx-2">
                            <div class="col-12">
                                <h4 class="mb-3 text-capitalize"><?php echo e(translate('filter_order')); ?></h4>
                            </div>
                            <?php if(request('delivery_man_id')): ?>
                                <input type="hidden" name="delivery_man_id" value="<?php echo e(request('delivery_man_id')); ?>">
                            <?php endif; ?>

                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label class="title-color text-capitalize" for="filter"><?php echo e(translate('order_type')); ?></label>
                                    <select name="filter" id="filter" class="form-control">
                                        <option value="all" <?php echo e($filter == 'all' ? 'selected' : ''); ?>><?php echo e(translate('all')); ?></option>
                                        <option value="admin" <?php echo e($filter == 'admin' ? 'selected' : ''); ?>><?php echo e(translate('in_House_Order')); ?></option>
                                        <option value="seller" <?php echo e($filter == 'seller' ? 'selected' : ''); ?>><?php echo e(translate('seller_Order')); ?></option>
                                        <?php if(($status == 'all' || $status == 'delivered') && !request()->has('delivery_man_id')): ?>
                                        <option value="POS" <?php echo e($filter == 'POS' ? 'selected' : ''); ?>><?php echo e(translate('POS_Order')); ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3" id="seller_id_area" style="<?php echo e($filter && $filter == 'admin'?'display:none':''); ?>">
                                <div class="form-group">
                                    <label class="title-color" for="store"><?php echo e(translate('store')); ?></label>
                                    <select name="seller_id" id="seller_id" class="form-control">
                                        <option value="all"><?php echo e(translate('all_shop')); ?></option>
                                        <option value="0" id="seller_id_inhouse"><?php echo e(translate('inhouse')); ?></option>
                                        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(isset($seller->shop)): ?>
                                                <option value="<?php echo e($seller->id); ?>"<?php echo e(request('seller_id') == $seller->id ? 'selected' :''); ?>>
                                                    <?php echo e($seller->shop->name); ?>

                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="form-group">
                                    <label class="title-color" for="customer"><?php echo e(translate('customer')); ?></label>

                                    <input type="hidden" id='customer_id'  name="customer_id" value="<?php echo e(request('customer_id') ? request('customer_id') : 'all'); ?>">
                                    <select  onchange="customer_id_value(this.value)"
                                    data-placeholder="<?php if($customer == 'all'): ?>
                                                        <?php echo e(translate('all_customer')); ?>

                                                    <?php else: ?>
                                                        <?php echo e($customer->name ? $customer->name : $customer->f_name.' '.$customer->l_name.' '.'('.$customer->phone.')'); ?>

                                                    <?php endif; ?>"
                                    class="js-data-example-ajax form-control form-ellipsis">
                                        <option value="all"><?php echo e(translate('all_customer')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <!-- week, month, year -->

                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <label class="title-color" for="date_type"><?php echo e(translate('date_type')); ?></label>
                                <div class="form-group">
                                    <select class="form-control __form-control" name="date_type" id="date_type">
                                        <option value="" selected disabled><?php echo e(translate('select_Date_Type')); ?></option>
                                        <option value="this_year" <?php echo e($date_type == 'this_year'? 'selected' : ''); ?>><?php echo e(translate('this_Year')); ?></option>
                                        <option value="this_month" <?php echo e($date_type == 'this_month'? 'selected' : ''); ?>><?php echo e(translate('this_Month')); ?></option>
                                        <option value="this_week" <?php echo e($date_type == 'this_week'? 'selected' : ''); ?>><?php echo e(translate('this_Week')); ?></option>
                                        <option value="custom_date" <?php echo e($date_type == 'custom_date'? 'selected' : ''); ?>><?php echo e(translate('custom_Date')); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3" id="from_div">
                                <label class="title-color" for="customer"><?php echo e(translate('start_date')); ?></label>
                                <div class="form-group">
                                    <input type="date" name="from" value="<?php echo e($from); ?>" id="from_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4 col-xl-3" id="to_div">
                                <label class="title-color" for="customer"><?php echo e(translate('end_date')); ?></label>
                                <div class="form-group">
                                    <input type="date" value="<?php echo e($to); ?>" name="to" id="to_date" class="form-control">
                                </div>
                            </div>
                             <!-- End week, month, year -->
                            <div class="col-12">
                                <div class="d-flex gap-3 justify-content-end">
                                    <a href="<?php echo e(route('admin.orders.list',['status'=>request('status')])); ?>" class="btn btn-secondary px-5">
                                        <?php echo e(translate('reset')); ?>

                                    </a>
                                    <button type="submit" class="btn btn--primary px-5" onclick="formUrlChange(this)" data-action="<?php echo e(url()->current()); ?>">
                                        <?php echo e(translate('show_data')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <!-- Data Table Top -->
                    <div class="px-3 py-4 light-bg">
                        <div class="row g-2 align-items-center flex-grow-1">
                            <div class="col-md-4">
                                <h5 class="text-capitalize d-flex gap-1">
                                    <?php echo e(translate('order_list')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($orders->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-md-8 d-flex gap-3 flex-wrap flex-sm-nowrap justify-content-md-end">
                                <form action="" method="GET">
                                    <!-- Search -->
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(translate('search_by_Order_ID')); ?>" aria-label="Search by Order ID" value="<?php echo e($search); ?>">
                                        <button type="submit" class="btn btn--primary input-group-text"><?php echo e(translate('search')); ?></button>
                                    </div>
                                    <!-- End Search -->
                                </form>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                        <i class="tio-download-to"></i>
                                        <?php echo e(translate('export')); ?>

                                        <i class="tio-chevron-down"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a type="submit" class="dropdown-item d-flex align-items-center gap-2" href="<?php echo e(route('admin.orders.order-bulk-export', ['delivery_man_id' => request('delivery_man_id'), 'status' => $status, 'from' => $from, 'to' => $to, 'filter' => $filter, 'search' => $search,'seller_id'=>$seller_id,'customer_id'=>$customer_id, 'date_type'=>$date_type])); ?>">
                                                <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Data Table Top -->

                    <!-- Table -->
                    <div class="table-responsive datatable-custom">
                        <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100"
                            style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th><?php echo e(translate('order_ID')); ?></th>
                                    <th><?php echo e(translate('order_Date')); ?></th>
                                    <th><?php echo e(translate('customer_Info')); ?></th>
                                    <th><?php echo e(translate('store')); ?></th>
                                    <th class="text-right"><?php echo e(translate('total_Amount')); ?></th>
                                    <th class="text-center"><?php echo e(translate('order_Status')); ?> </th>
                                    <th class="text-center"><?php echo e(translate('action')); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr class="status-<?php echo e($order['order_status']); ?> class-all">
                                    <td class="">
                                        <?php echo e($orders->firstItem()+$key); ?>

                                    </td>
                                    <td >
                                        <a class="title-color" href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>"><?php echo e($order['id']); ?> <?php echo $order->order_type == 'POS' ? '<span class="text--primary">(POS)</span>' : ''; ?></a>
                                    </td>
                                    <td>
                                        <div><?php echo e(date('d M Y',strtotime($order['created_at']))); ?>,</div>
                                        <div><?php echo e(date("h:i A",strtotime($order['created_at']))); ?></div>
                                    </td>
                                    <td>
                                        <?php if($order->is_guest): ?>
                                            <strong class="title-name"><?php echo e(translate('guest_customer')); ?></strong>
                                        <?php elseif($order->customer_id == 0): ?>
                                            <strong class="title-name"><?php echo e(translate('walking_customer')); ?></strong>
                                        <?php else: ?>
                                            <?php if($order->customer): ?>
                                                <a class="text-body text-capitalize" href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>">
                                                    <strong class="title-name"><?php echo e($order->customer['f_name'].' '.$order->customer['l_name']); ?></strong>
                                                </a>
                                                <a class="d-block title-color" href="tel:<?php echo e($order->customer['phone']); ?>"><?php echo e($order->customer['phone']); ?></a>
                                            <?php else: ?>
                                                <label class="badge badge-danger fz-12"><?php echo e(translate('invalid_customer_data')); ?></label>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="store-name font-weight-medium">
                                            <?php if($order->seller_is == 'seller'): ?>
                                                <?php echo e(isset($order->seller->shop) ? $order->seller->shop->name : 'Store not found'); ?>

                                            <?php elseif($order->seller_is == 'admin'): ?>
                                                <?php echo e(translate('in_House')); ?>

                                            <?php endif; ?>
                                        </span>
                                    </td>
                                    <td class="text-right">
                                        <div>
                                            <?php ($discount = 0); ?>
                                            <?php if($order->order_type == 'default_type' && $order->coupon_discount_bearer == 'inhouse' && !in_array($order['coupon_code'], [0, NULL])): ?>
                                                <?php ($discount = $order->discount_amount); ?>
                                            <?php endif; ?>

                                            <?php ($free_shipping = 0); ?>
                                            <?php if($order->is_shipping_free): ?>
                                                <?php ($free_shipping = $order->shipping_cost); ?>
                                            <?php endif; ?>

                                            <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($order->order_amount+$discount+$free_shipping))); ?>

                                        </div>

                                        <?php if($order->payment_status=='paid'): ?>
                                            <span class="badge text-success fz-12 px-0">
                                                <?php echo e(translate('paid')); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge text-danger fz-12 px-0">
                                                <?php echo e(translate('unpaid')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center text-capitalize">
                                        <?php if($order['order_status']=='pending'): ?>
                                            <span class="badge badge-soft-info fz-12">
                                                <?php echo e(translate($order['order_status'])); ?>

                                            </span>

                                        <?php elseif($order['order_status']=='processing' || $order['order_status']=='out_for_delivery'): ?>
                                            <span class="badge badge-soft-warning fz-12">
                                                <?php echo e(str_replace('_',' ',$order['order_status'] == 'processing' ? translate('packaging'):translate($order['order_status']))); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='confirmed'): ?>
                                            <span class="badge badge-soft-success fz-12">
                                                <?php echo e(translate($order['order_status'])); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='failed'): ?>
                                            <span class="badge badge-danger fz-12">
                                                <?php echo e(translate('failed_to_deliver')); ?>

                                            </span>
                                        <?php elseif($order['order_status']=='delivered'): ?>
                                            <span class="badge badge-soft-success fz-12">
                                                <?php echo e(translate($order['order_status'])); ?>

                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-soft-danger fz-12">
                                                <?php echo e(translate($order['order_status'])); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-outline--primary square-btn btn-sm mr-1" title="<?php echo e(translate('view')); ?>"
                                                href="<?php echo e(route('admin.orders.details',['id'=>$order['id']])); ?>">
                                                <img src="<?php echo e(asset('/public/assets/back-end/img/eye.svg')); ?>" class="svg" alt="">
                                            </a>
                                            <a class="btn btn-outline-success square-btn btn-sm mr-1" target="_blank" title="<?php echo e(translate('invoice')); ?>"
                                                href="<?php echo e(route('admin.orders.generate-invoice',[$order['id']])); ?>">
                                                <i class="tio-download-to"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <!-- Pagination -->
                    <div class="table-responsive mt-4">
                        <div class="d-flex justify-content-lg-end">
                            <!-- Pagination -->
                            <?php echo $orders->links(); ?>

                        </div>
                    </div>
                    <!-- End Pagination -->
                </div>
            </div>
            <!-- End Order States -->

            <!-- Nav Scroller -->
            <div class="js-nav-scroller hs-nav-scroller-horizontal d-none">
                <span class="hs-nav-scroller-arrow-prev d-none">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="tio-chevron-left"></i>
                    </a>
                </span>

                <span class="hs-nav-scroller-arrow-next d-none">
                    <a class="hs-nav-scroller-arrow-link" href="javascript:;">
                        <i class="tio-chevron-right"></i>
                    </a>
                </span>

                <!-- Nav -->
                <ul class="nav nav-tabs page-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><?php echo e(translate('order_list')); ?></a>
                    </li>
                </ul>
                <!-- End Nav -->
            </div>
            <!-- End Nav Scroller -->
        </div>
        <!-- End Page Header -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script_2'); ?>
    <script>
        function customer_id_value(id){
            $('#customer_id').empty().val(id);
        }
        $('.js-data-example-ajax').select2({
        // Need Add a initial option
        data: [{ id: '', text: 'Select your option', disabled: true, selected: true }],
        ajax: {
            url: '<?php echo e(route('admin.orders.customers')); ?>',
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data) {
                // console.log(data);
                return {
                results: data

                };
            },
            __port: function (params, success, failure) {
                var $request = $.ajax(params);

                $request.then(success);
                $request.fail(failure);

                return $request;
            }

        }
    });
    $(document).ready(function() {
        $('.select2-container--default').addClass('form-control');
        $('.select2-container--default').addClass('p-0');
        $('.select2-selection').addClass('border-0');
    });

    </script>
    <script>
        function filter_order() {
            $.get({
                url: '<?php echo e(route('admin.orders.inhouse-order-filter')); ?>',
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').fadeIn();
                },
                success: function (data) {
                    toastr.success('<?php echo e(translate("order_filter_success")); ?>');
                    location.reload();
                },
                complete: function () {
                    $('#loading').fadeOut();
                },
            });
        };
    </script>
    <script>
        $('#from_date,#to_date').change(function () {
            let fr = $('#from_date').val();
            let to = $('#to_date').val();
            if(fr != ''){
                $('#to_date').attr('required','required');
            }
            if(to != ''){
                $('#from_date').attr('required','required');
            }
            if (fr != '' && to != '') {
                if (fr > to) {
                    $('#from_date').val('');
                    $('#to_date').val('');
                    toastr.error('<?php echo e(translate("invalid_date_range")); ?>!', Error, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            }

        })

        $("#date_type").change(function() {
            let val = $(this).val();
            $('#from_div').toggle(val === 'custom_date');
            $('#to_div').toggle(val === 'custom_date');

            if(val === 'custom_date'){
                $('#from_date').attr('required','required');
                $('#to_date').attr('required','required');
                $('.filter-btn').attr('class','filter-btn col-12 text-right');
            }else{
                $('#from_date').val(null).removeAttr('required')
                $('#to_date').val(null).removeAttr('required')
                $('.filter-btn').attr('class','col-sm-6 col-md-3 filter-btn');
            }
        }).change();

        $("#filter").change(function() {
            let val = $(this).val();
            if(val === 'admin'){
                $('#seller_id_area').fadeOut();
            }else{
                $('#seller_id_area').fadeIn();
                $('#seller_id').val('all');
            }
            if(val === 'seller'){
                $('#seller_id_inhouse').fadeOut();
            }else{
                $('#seller_id_inhouse').fadeIn();
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/order/list.blade.php ENDPATH**/ ?>