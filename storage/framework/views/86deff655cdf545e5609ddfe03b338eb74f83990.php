

<?php $__env->startSection('title', translate('posts_List')); ?>


<?php $__env->startPush('css_or_js'); ?>
<link href="<?php echo e(asset('public/assets/select2/css/select2.min.css')); ?>" rel="stylesheet">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #dedede;
        border: 1px solid #dedede;
        border-radius: 2px;
        color: #222;
        display: flex;
        gap: 4px;
        align-items: center;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex gap-2">
            <img src="<?php echo e(asset('/public/assets/back-end/img/inhouse-product-list.png')); ?>" alt="">
                <?php echo e(translate('posts_List')); ?>

            <span class="badge badge-soft-dark radius-50 fz-14 ml-1"><?php echo e($posts->total()); ?></span>
        </h2>
    </div>
    <!-- End Page Title -->
    <!-- Filter -->
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(url()->current()); ?>"  method="GET">
                <div class="row gx-2">
                    <div class="col-12">
                        <h4 class="mb-3"><?php echo e(translate('filter_Posts')); ?></h4>
                    </div>
                
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="title-color" for="post_type_id"><?php echo e(translate('post_type')); ?></label>
                            <select name="post_type_id"  class="form-control text-capitalize js-select2-custom">
                                <option value=""  selected><?php echo e(translate('all_posts')); ?></option>
                                <?php $__currentLoopData = $post_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($pts->id); ?>"<?php echo e(request('post_type_id')==$pts->id ? 'selected' :''); ?>>
                                        <?php echo e($pts->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="title-color" for="status"><?php echo e(translate('post_status')); ?></label>
                            <select name="status" class="form-control js-select2-custom">
                                <option value="" selected disabled><?php echo e(translate('all_post_status')); ?></option>
                                <?php $__currentLoopData = $statusValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($status); ?>"<?php echo e(request('status') == $status ? 'selected' : ''); ?>>
                                        <?php echo e(translate($status)); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="form-group">
                            <label class="title-color" for="author_id"><?php echo e(translate('Authors')); ?></label>
                            <select name="author_id"  class="form-control text-capitalize js-select2-custom">
                                <option value=""  selected><?php echo e(translate('all_authors')); ?></option>
                                <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($admin->id); ?>"<?php echo e(request('author_id')==$admin->id ? 'selected' :''); ?>>
                                        <?php echo e($admin->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex gap-3 justify-content-end">
                            <a href="<?php echo e(route('admin.posts.list')); ?>" class="btn btn-secondary px-5">
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
                                            <a class="dropdown-item" href="<?php echo e(route('admin.posts.export-excel')); ?>">
                                                <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                                <?php echo e(translate('excel')); ?>

                                            </a>
                                        </li>
                                    </ul>
                                </div>
                         
                            
                                <a href="<?php echo e(route('admin.posts.add-new')); ?>" class="btn btn--primary">
                                    <i class="tio-add"></i>
                                    <span class="text"><?php echo e(translate('add_new_post')); ?></span>
                                </a>
                          
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;" class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                        <thead class="thead-light thead-50 text-capitalize">
                            <tr>
                                <th><?php echo e(translate('title')); ?></th>
                                <th><?php echo e(translate('sub_title')); ?></th>
                                <th><?php echo e(translate('thumbnail')); ?></th>
                                <th><?php echo e(translate('post_status')); ?></th>
                                <th class="text-center"><?php echo e(translate('action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <tr>
                               
                                <td><?php echo e($post->title); ?></td>
                                <td><?php echo e($post->sub_title); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.posts.view',[$post['id']])); ?>" class="media align-items-center gap-2">
                                        <img src="<?php echo e(\App\CPU\PostManager::post_image_path('thumbnail')); ?>/<?php echo e($post['thumbnail']); ?>"
                                             onerror="this.src='<?php echo e(asset('/public/assets/back-end/img/brand-logo.png')); ?>'"class="avatar border" alt="">
                                        <span class="media-body title-color hover-c1">
                                            <?php echo e(\Illuminate\Support\Str::limit($post['name'],20)); ?>

                                        </span>
                                    </a>
                                </td>
                                <td><?php echo e($post->status); ?></td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-outline-info btn-sm square-btn" title="<?php echo e(translate('barcode')); ?>"
                                            href="<?php echo e(route('admin.posts.view', [$post['id']])); ?>">
                                            <i class="tio-barcode"></i>
                                        </a>
                                        <a class="btn btn-outline-info btn-sm square-btn" title="View" href="<?php echo e(route('admin.posts.view',[$post['id']])); ?>">
                                            <i class="tio-invisible"></i>
                                        </a>
                                        <a class="btn btn-outline--primary btn-sm square-btn"
                                            title="<?php echo e(translate('edit')); ?>"
                                            href="<?php echo e(route('admin.posts.edit',[$post['id']])); ?>">
                                            <i class="tio-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm square-btn" href="javascript:"
                                            title="<?php echo e(translate('delete')); ?>"
                                            onclick="form_alert('posts-<?php echo e($post['id']); ?>','<?php echo e(translate('want_to_delete_this_item?')); ?>')">
                                            <i class="tio-delete"></i>
                                        </a>
                                    </div>
                                    <form action="<?php echo e(route('admin.posts.view',[$post['id']])); ?>"
                                            method="post" id="posts-<?php echo e($post['id']); ?>">
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
                        <?php echo e($posts->links()); ?>

                    </div>
                </div>

                <?php if(count($posts)==0): ?>
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

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/posts/list.blade.php ENDPATH**/ ?>