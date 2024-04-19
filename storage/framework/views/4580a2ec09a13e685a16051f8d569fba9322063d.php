<?php $__env->startSection('title', translate('employee_list')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <!-- Custom styles for this page -->
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Title -->
        <div class="mb-3">
            <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
                <img src="<?php echo e(asset('/public/assets/back-end/img/employee.png')); ?>" width="20" alt="">
                <?php echo e(translate('employee_list')); ?>

            </h2>
        </div>
        <!-- End Page Title -->

        <div class="card">
            <div class="card-header flex-wrap gap-10">
                <!-- start -->
                <div class="px-sm-3 py-4 flex-grow-1">
                    <div class="d-flex justify-content-between gap-3 flex-wrap align-items-center">
                        <div class="">
                            <h5 class="mb-0 text-capitalize gap-2">
                                <?php echo e(translate('employee_table')); ?>

                                <span class="badge badge-soft-dark radius-50 fz-12"><?php echo e($em->total()); ?></span>
                            </h5>
                        </div>
                        <div class="align-items-center d-flex gap-3 justify-content-lg-end flex-wrap flex-lg-nowrap flex-grow-1">
                            <div class="">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="input-group input-group-merge input-group-custom">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="tio-search"></i>
                                            </div>
                                        </div>
                                        <input type="search" name="search" class="form-control"
                                                placeholder="<?php echo e(translate('search_by_name_or_email_or_phone')); ?>"
                                                value="<?php echo e($search); ?>" required>
                                        <button type="submit"
                                                class="btn btn--primary"><?php echo e(translate('search')); ?></button>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <form action="<?php echo e(url()->current()); ?>" method="GET">
                                    <div class="d-flex gap-2 align-items-center text-left">
                                        <div class="">
                                            <select class="form-control text-ellipsis min-w-200" name="employee_role_id">
                                                <option value="all" <?php echo e(request('employee_role') == 'all' ? 'selected' : ''); ?>><?php echo e(translate('all')); ?></option>
                                                    <?php $__currentLoopData = $employee_roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($employee_role['id']); ?>" <?php echo e(request('employee_role_id') == $employee_role['id'] ? 'selected' : ''); ?>>
                                                            <?php echo e($employee_role['name']); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn--primary px-4 w-100 text-nowrap">
                                                <?php echo e(translate('filter')); ?>

                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-outline--primary text-nowrap" data-toggle="dropdown">
                                    <i class="tio-download-to"></i>
                                    <?php echo e(translate('export')); ?>

                                    <i class="tio-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.employee.export',['role'=>request('employee_role_id'),'search'=>request('search')])); ?>">
                                            <img width="14" src="<?php echo e(asset('/public/assets/back-end/img/excel.png')); ?>" alt="">
                                            <?php echo e(translate('excel')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="">

                                <a href="<?php echo e(route('admin.employee.add-new')); ?>" class="btn btn--primary text-nowrap">
                                    <i class="tio-add"></i>
                                    <span class="text "><?php echo e(translate('add_new')); ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->


            <div class="table-responsive">
                <table id="datatable"
                        style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;"
                        class="table table-hover table-borderless table-thead-bordered table-align-middle card-table w-100">
                    <thead class="thead-light thead-50 text-capitalize table-nowrap">
                    <tr>
                        <th><?php echo e(translate('SL')); ?></th>
                        <th><?php echo e(translate('name')); ?></th>
                        <th><?php echo e(translate('email')); ?></th>
                        <th><?php echo e(translate('phone')); ?></th>
                        <th><?php echo e(translate('role')); ?></th>
                        <th><?php echo e(translate('status')); ?></th>
                        <th class="text-center"><?php echo e(translate('action')); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $em; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($e->role): ?>
                            <tr>
                                <th scope="row"><?php echo e($k+1); ?></th>
                                <td class="text-capitalize">
                                    <div class="media align-items-center gap-10">
                                        <img class="rounded-circle avatar avatar-lg"
                                                onerror="this.src='<?php echo e(asset('public/assets/back-end/img/160x160/img1.jpg')); ?>'"
                                                src="<?php echo e(asset('storage/app/public/admin')); ?>/<?php echo e($e['image']); ?>">
                                        <div class="media-body">
                                            <?php echo e($e['name']); ?>

                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php echo e($e['email']); ?>

                                </td>
                                <td><?php echo e($e['phone']); ?></td>
                                <td><?php echo e($e->role['name']); ?></td>
                                <td>
                                    <form action="<?php echo e(url('/')); ?>/admin/employee/status" method="post" id="employee_id_<?php echo e($e['id']); ?>_form" class="employee_id_form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($e['id']); ?>">
                                        <label class="switcher">
                                            <input type="checkbox" class="switcher_input" id="employee_id_<?php echo e($e['id']); ?>" name="status" class="toggle-switch-input" <?php echo e($e->status?'checked':''); ?> onclick="toogleStatusModal(event,'employee_id_<?php echo e($e['id']); ?>','employee-on.png','employee-off.png','<?php echo e(translate('Want_to_Turn_ON_Employee_Status')); ?>','<?php echo e(translate('Want_to_Turn_OFF_Employee_Status')); ?>',`<p><?php echo e(translate('if_enabled_this_employee_can_log_in_to_the_system_and_perform_his_role')); ?></p>`,`<p><?php echo e(translate('if_disabled_this_employee_can_not_log_in_to_the_system_and_perform_his_role')); ?></p>`)">
                                            <span class="switcher_control"></span>
                                        </label>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex gap-10 justify-content-center">
                                        <a href="<?php echo e(route('admin.employee.update',[$e['id']])); ?>"
                                            class="btn btn-outline--primary btn-sm square-btn"
                                            title="<?php echo e(translate('edit')); ?>">
                                            <i class="tio-edit"></i>
                                        </a>
                                        <a class="btn btn-outline-info btn-sm square-btn" title="View" href="<?php echo e(route('admin.employee.view',['id'=>$e['id']])); ?>">
                                            <i class="tio-invisible"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive mt-4">
                <div class="px-4 d-flex justify-content-lg-end">
                    <!-- Pagination -->
                    <?php echo e($em->links()); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $('.employee_id_form').on('submit', function(event){
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('/')); ?>/admin/employee/status",
                method: 'POST',
                data: $(this).serialize(),
                success: function (data) {
                    toastr.success(data.message);
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/employee/list.blade.php ENDPATH**/ ?>