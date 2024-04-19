<?php $__env->startSection('title', translate('product_List')); ?>

<?php $__env->startPush('css_or_js'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
            <img src="<?php echo e(asset('/public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
            <?php if($type == 'in_house'): ?>
                <?php echo e(translate('in_House_Product_List')); ?>

            <?php elseif($type == 'seller'): ?>
                <?php echo e(translate('seller_Product_List')); ?>

            <?php endif; ?>
            <span class="badge badge-soft-dark radius-50 fz-14 ml-1"><?php echo e($pro->total()); ?></span>
        </h2>
    </div>
    <!-- End Page Title -->
    <!-- Filter -->
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.product.list',['type'=>request('type')])); ?>"  method="GET">
                <input type="hidden" value="<?php echo e(request('status')); ?>" name="status">
                <div class="row gx-2">
                    <div class="col-12">
                        <h4 class="mb-3"><?php echo e(translate('filter_Products')); ?></h4>
                    </div>
                    <?php if(request('type') == 'seller'): ?>
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label class="title-color" for="store"><?php echo e(translate('store')); ?></label>
                                <select name="seller_id"  class="form-control text-capitalize">
                                    <option value=""  selected><?php echo e(translate('all_store')); ?></option>
                                    <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($seller->id); ?>"<?php echo e(request('seller_id')==$seller->id ? 'selected' :''); ?>>
                                            <?php echo e($seller->shop->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="title-color" for="store"><?php echo e(translate('brand')); ?></label>
                            <select name="brand_id"  class="js-select2-custom form-control text-capitalize">
                                <option value="" selected><?php echo e(translate('all_brand')); ?></option>
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($brand->id); ?>" <?php echo e(request('brand_id')==$brand->id ? 'selected' :''); ?>><?php echo e($brand->default_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label for="name" class="title-color"><?php echo e(translate('category')); ?></label>
                            <select class="js-select2-custom form-control" name="category_id" onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-category-select','select')">
                                <option value="<?php echo e(old('category_id')); ?>" selected disabled><?php echo e(translate('select_category')); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category['id']); ?>"
                                        <?php echo e(request('category_id') == $category['id'] ? 'selected' : ''); ?>>
                                        <?php echo e($category['defaultName']); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label for="name" class="title-color"><?php echo e(translate('sub_Category')); ?></label>
                            <select class="js-select2-custom form-control" name="sub_category_id"
                                    id="sub-category-select"
                                    onchange="getRequest('<?php echo e(url('/')); ?>/admin/product/get-categories?parent_id='+this.value,'sub-sub-category-select','select')">
                                    <option value="<?php echo e(request('sub_category_id') != null ? request('sub_category_id') : null); ?>" selected <?php echo e(request('sub_category_id') != null ? '' : 'disabled'); ?>><?php echo e(request('sub_category_id') != null ? $sub_category['defaultName']: translate('select_Sub_Category')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label for="name" class="title-color"><?php echo e(translate('sub_Sub_Category')); ?></label>
                            <select class="js-select2-custom form-control" name="sub_sub_category_id"
                                    id="sub-sub-category-select">
                                    <option value="<?php echo e(request('sub_sub_category_id') != null ? request('sub_sub_category_id') : null); ?>" selected <?php echo e(request('sub_sub_category_id') != null ? '' : 'disabled'); ?>><?php echo e(request('sub_sub_category_id') != null ? $sub_sub_category['defaultName'] : translate('select_Sub_Sub_Category')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="<?php echo e(route('admin.product.list',['type'=>request('type')])); ?>" class="btn btn-secondary px-5">
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
    <!-- End Filter -->

    <div class="row mt-20">
        <div class="col-md-12">
            <div class="card">
                <div class="px-3 py-4">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <!-- Search -->
                            <form action="<?php echo e(url()->current()); ?>" method="GET">
                                <div class="input-group input-group-custom input-group-merge">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="tio-search"></i>
                                        </div>
                                    </div>
                                    <input id="datatableSearch_" type="search" name="search" class="form-control"
                                           placeholder="<?php echo e(translate('search_Product_Name')); ?>" aria-label="Search orders"
                                           value="<?php echo e(request('search')); ?>" >
                                    <input type="hidden" value="<?php echo e(request('status')); ?>" name="status">
                                    <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                </div>
                            </form>
                            <!-- End Search -->
                        </div>
                        <div class="col-lg-8 mt-3 mt-lg-0 d-flex flex-wrap gap-3 justify-content-lg-end">

                                <div>
                                    <button type="button" class="btn btn-outline--primary" data-toggle="dropdown">
                                        <i class="tio-download-to"></i>
                                        <?php echo e(translate('export')); ?>

                                        <i class="tio-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item" href="<?php echo e(route('admin.product.export-excel',['type'=>request('type')])); ?>?brand_id=<?php echo e(request('brand_id')); ?>&search=<?php echo e(request('search')); ?>&category_id=<?php echo e(request('category_id')); ?>&sub_category_id=<?php echo e(request('sub_category_id')); ?>&sub_sub_category_id=<?php echo e(request('sub_sub_category_id')); ?>&seller_id=<?php echo e(request('seller_id')); ?>&status=<?php echo e(request('status')); ?>">
                                                <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php if($type == 'in_house'): ?>
                                <a href="<?php echo e(route('admin.product.stock-limit-list',['in_house'])); ?>" class="btn btn-info">
                                    <span class="text"><?php echo e(translate('limited_Sotcks')); ?></span>
                                </a>
                                <a href="<?php echo e(route('admin.product.add-new')); ?>" class="btn btn--primary">
                                    <i class="tio-add"></i>
                                    <span class="text"><?php echo e(translate('add_new_product')); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('SL')); ?></th>
                                <th><?php echo e(translate('product Name')); ?></th>
                                <th class="text-right"><?php echo e(translate('product Type')); ?></th>
                                <th class="text-right"><?php echo e(translate('purchase_price')); ?></th>
                                <th class="text-right"><?php echo e(translate('selling_price')); ?></th>
                                <th class="text-center"><?php echo e(translate('show_as_featured')); ?></th>
                                <th class="text-center"><?php echo e(translate('active_status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($pro->firstItem()+$k); ?></th>
                                <td>
                                    <a href="<?php echo e(route('admin.product.view',[$p['id']])); ?>" class="media align-items-center gap-2">
                                        <img src="<?php echo e(\App\CPU\ProductManager::product_image_path('thumbnail')); ?>/<?php echo e($p['thumbnail']); ?>"
                                             onerror="this.src='<?php echo e(asset('/public/assets/back-end/img/brand-logo.png')); ?>'"class="avatar border" alt="">
                                        <span class="media-body title-color hover-c1">
                                            <?php echo e(\Illuminate\Support\Str::limit($p['name'],20)); ?>

                                        </span>
                                    </a>
                                </td>
                                <td class="text-right">
                                    <?php echo e(translate(str_replace('_',' ',$p['product_type']))); ?>

                                </td>
                                <td class="text-right">
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['purchase_price']))); ?>

                                </td>
                                <td class="text-right">
                                    <?php echo e(\App\CPU\BackEndHelper::set_symbol(\App\CPU\BackEndHelper::usd_to_currency($p['unit_price']))); ?>

                                </td>
                                <td class="text-center">

                                    <?php ($product_name = str_replace("'",'`',$p['name'])); ?>
                                    <form action="<?php echo e(route('admin.product.featured-status')); ?>" method="post" id="product_featured<?php echo e($p['id']); ?>_form" class="product_featured_form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($p['id']); ?>">
                                        <label class="switcher mx-auto">
                                            <input type="checkbox" class="switcher_input" id="product_featured<?php echo e($p['id']); ?>" name="status" value="1" <?php echo e($p['featured'] == 1 ? 'checked':''); ?>

                                                onclick="toogleStatusModal(event,'product_featured<?php echo e($p['id']); ?>',
                                                'product-status-on.png','product-status-off.png',
                                                '<?php echo e(translate('Want_to_Add')); ?> <?php echo e($product_name); ?> <?php echo e(translate('to_the_featured_section')); ?>',
                                                '<?php echo e(translate('Want_to_Remove')); ?> <?php echo e($product_name); ?> <?php echo e(translate('to_the_featured_section')); ?>',
                                                `<p><?php echo e(translate('if_enabled_this_product_will_be_shown_in_the_featured_product_on_the_website_and_customer_app')); ?></p>`,
                                                `<p><?php echo e(translate('if_disabled_this_product_will_be_removed_from_the_featured_product_section_of_the_website_and_customer_app')); ?></p>`)">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>

                                </td>
                                <td class="text-center">
                                    <form action="<?php echo e(route('admin.product.status-update')); ?>" method="post" id="product_status<?php echo e($p['id']); ?>_form" class="product_status_form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($p['id']); ?>">
                                        <label class="switcher mx-auto">
                                            <input type="checkbox" class="switcher_input" id="product_status<?php echo e($p['id']); ?>" name="status" value="1" <?php echo e($p['status'] == 1 ? 'checked':''); ?>

                                                onclick="toogleStatusModal(event,'product_status<?php echo e($p['id']); ?>',
                                                'product-status-on.png','product-status-off.png',
                                                '<?php echo e(translate('Want_to_Turn_ON')); ?> <?php echo e($product_name); ?> <?php echo e(translate('status')); ?>',
                                                '<?php echo e(translate('Want_to_Turn_OFF')); ?> <?php echo e($product_name); ?> <?php echo e(translate('status')); ?>',
                                                `<p><?php echo e(translate('if_enabled_this_product_will_be_available_on_the_website_and_customer_app')); ?></p>`,
                                                `<p><?php echo e(translate('if_disabled_this_product_will_be_hidden_from_the_website_and_customer_app')); ?></p>`)">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-outline-info btn-sm square-btn" title="<?php echo e(translate('barcode')); ?>"
                                            href="<?php echo e(route('admin.product.barcode', [$p['id']])); ?>">
                                            <i class="tio-barcode"></i>
                                        </a>
                                        <a class="btn btn-outline-info btn-sm square-btn" title="View" href="<?php echo e(route('admin.product.view',[$p['id']])); ?>">
                                            <i class="tio-invisible"></i>
                                        </a>
                                        <a class="btn btn-outline--primary btn-sm square-btn"
                                            title="<?php echo e(translate('edit')); ?>"
                                            href="<?php echo e(route('admin.product.edit',[$p['id']])); ?>">
                                            <i class="tio-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm square-btn" href="javascript:"
                                            title="<?php echo e(translate('delete')); ?>"
                                            onclick="form_alert('product-<?php echo e($p['id']); ?>','<?php echo e(translate('want_to_delete_this_item?')); ?>')">
                                            <i class="tio-delete"></i>
                                        </a>
                                    </div>
                                    <form action="<?php echo e(route('admin.product.delete',[$p['id']])); ?>"
                                            method="post" id="product-<?php echo e($p['id']); ?>">
                                        <?php echo csrf_field(); ?> <?php echo method_field('delete'); ?>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive mt-4">
                    <div class="px-4 d-flex justify-content-lg-end">
                        <!-- Pagination -->
                        <?php echo e($pro->links()); ?>

                    </div>
                </div>

                <?php if(count($pro)==0): ?>
                    <div class="text-center p-4">
                        <img class="mb-3 w-160" src="<?php echo e(asset('public/assets/back-end')); ?>/svg/illustrations/sorry.svg" alt="Image Description">
                        <p class="mb-0"><?php echo e(translate('no_data_to_show')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <!-- Page level plugins -->
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script>
        function getRequest(route, id, type) {
            $('#sub-sub-category-select').empty().append('<option value="null" selected disabled>---<?php echo e(translate('select')); ?>---</option>');
            $.get({
                url: route,
                dataType: 'json',
                success: function(data) {
                    if (type == 'select') {
                        $('#' + id).empty().append(data.select_tag);
                    }
                },
            });
        }

        // Call the dataTables jQuery plugin
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });

        $('.product_status_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.product.status-update')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    if(data.success == true) {
                        toastr.success('<?php echo e(translate("status_updated_successfully")); ?>');
                    }
                    else if(data.success == false) {
                        toastr.error('<?php echo e(translate("Status_updated_failed.")); ?> <?php echo e(translate("Product_must_be_approved")); ?>');
                        setTimeout(function(){
                            location.reload();
                        }, 2000);
                    }
                }
            });
        });

        $('.product_featured_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(route('admin.product.featured-status')); ?>",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    toastr.success('<?php echo e(translate("featured_status_updated_successfully")); ?>');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/product/list.blade.php ENDPATH**/ ?>