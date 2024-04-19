<?php $__env->startSection('title', translate('attribute')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/back-end/css/croppie.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 d-flex gap-2">
            <img src="<?php echo e(asset('/public/assets/back-end/img/attribute.png')); ?>" alt="">
            <?php echo e(translate('attribute_Setup')); ?>

        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12 mb-3">
            <div class="card">
                <!-- <div class="card-header">
                    <?php echo e(translate('add_new_attribute')); ?>

                </div> -->
                <div class="card-body" style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <form action="<?php echo e(route('admin.attribute.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php ($language=\App\Model\BusinessSetting::where('type','pnc_language')->first()); ?>
                        <?php ($language = $language->value ?? null); ?>
                        <?php ($default_lang = 'en'); ?>

                        <?php ($default_lang = json_decode($language)[0]); ?>
                        <ul class="nav nav-tabs w-fit-content mb-4">
                            <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item text-capitalize">
                                    <a class="nav-link lang_link <?php echo e($lang == $default_lang? 'active':''); ?>"
                                        href="#"
                                        id="<?php echo e($lang); ?>-link"><?php echo e(\App\CPU\Helpers::get_language_name($lang).'('.strtoupper($lang).')'); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <?php $__currentLoopData = json_decode($language); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="form-group <?php echo e($lang != $default_lang ? 'd-none':''); ?> lang_form"
                                    id="<?php echo e($lang); ?>-form">
                            <input type="hidden" id="id">
                            <label class="title-color" for="name"><?php echo e(translate('attribute_Name')); ?><span class="text-danger">*</span>
                                    (<?php echo e(strtoupper($lang)); ?>)</label>
                            <input type="text" name="name[]" class="form-control" id="name"
                                   placeholder="<?php echo e(translate('enter_Attribute_Name')); ?>" <?php echo e($lang == $default_lang? 'required':''); ?>>
                        </div>
                        <input type="hidden" name="lang[]" value="<?php echo e($lang); ?>" id="lang">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <button type="reset" class="btn btn-secondary"><?php echo e(translate('reset')); ?></button>
                            <button type="submit" class="btn btn--primary"><?php echo e(translate('submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="px-3 py-4">
                    <div class="row align-items-center">
                            <div class="col-sm-4 col-md-6 col-lg-8 mb-2 mb-sm-0">
                                <h5 class="mb-0 d-flex align-items-center gap-2"><?php echo e(translate('attribute_list')); ?>

                                    <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($attributes->total()); ?></span>
                                </h5>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <!-- Search -->
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-custom input-group-merge">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input id="datatableSearch_" type="search" name="search" class="form-control"
                                            placeholder="<?php echo e(translate('search_by_Attribute_Name')); ?>" aria-label="Search orders" value="<?php echo e($search); ?>" required>
                                        <button type="submit" class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                                <!-- End Search -->
                            </div>
                        </div>
                </div>
                <div style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                    <div class="table-responsive">
                        <table id="datatable"
                               class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                            <thead class="thead-light thead-50 text-capitalize">
                                <tr>
                                    <th><?php echo e(translate('SL')); ?></th>
                                    <th class="text-center"><?php echo e(translate('attribute_Name')); ?> </th>
                                    <th class="text-center"><?php echo e(translate('action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($attributes->firstItem()+$key); ?></td>
                                    <td class="text-center"><?php echo e(translate($attribute['name'])); ?></td>
                                    <td>
                                       <div class="d-flex justify-content-center gap-2">
                                            <a class="btn btn-outline-info btn-sm square-btn"
                                                title="<?php echo e(translate('edit')); ?>"
                                                href="<?php echo e(route('admin.attribute.edit',[$attribute['id']])); ?>">
                                                <i class="tio-edit"></i>
                                            </a>
                                            <a class="btn btn-outline-danger btn-sm delete square-btn"
                                                title="<?php echo e(translate('delete')); ?>"
                                                id="<?php echo e($attribute['id']); ?>">
                                                <i class="tio-delete"></i>
                                            </a>
                                       </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="table-responsive mt-4">
                    <div class="d-flex justify-content-lg-end">
                        <!-- Pagination -->
                        <?php echo $attributes->links(); ?>

                    </div>
                </div>

                <?php if(count($attributes)==0): ?>
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
<script>
        $(".lang_link").click(function (e) {
            e.preventDefault();
            $(".lang_link").removeClass('active');
            $(".lang_form").addClass('d-none');
            $(this).addClass('active');

            let form_id = this.id;
            let lang = form_id.split("-")[0];
            console.log(lang);
            $("#" + lang + "-form").removeClass('d-none');
            if (lang == '<?php echo e($default_lang); ?>') {
                $(".from_part_2").removeClass('d-none');
            } else {
                $(".from_part_2").addClass('d-none');
            }
        });

        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
    <script>


        $(document).on('click', '.delete', function () {
            var id = $(this).attr("id");
            Swal.fire({
                title: '<?php echo e(translate('are_you_sure_to_delete_this')); ?>?',
                text: "<?php echo e(translate('you_will not_be_able_to_revert_this')); ?>!",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<?php echo e(translate('yes_delete_it')); ?>!',
                cancelButtonText: '<?php echo e(translate("cancel")); ?>',
                type: 'warning',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "<?php echo e(route('admin.attribute.delete')); ?>",
                        method: 'POST',
                        data: {id: id},
                        success: function () {
                            toastr.success('<?php echo e(translate('attribute_deleted_successfully')); ?>');
                            location.reload();
                        }
                    });
                }
            })
        });



         // Call the dataTables jQuery plugin


    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/attribute/view.blade.php ENDPATH**/ ?>