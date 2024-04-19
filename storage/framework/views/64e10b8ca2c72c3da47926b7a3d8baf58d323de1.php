<?php $__env->startSection('title', translate('employee_Edit')); ?>
<?php $__env->startPush('css_or_js'); ?>
    <link href="<?php echo e(asset('public/assets/back-end')); ?>/css/select2.min.css" rel="stylesheet"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="content container-fluid">
    <!-- Page Title -->
    <div class="mb-3">
        <h2 class="h1 mb-0 text-capitalize d-flex align-items-center gap-2">
            <img src="<?php echo e(asset('/public/assets/back-end/img/add-new-employee.png')); ?>" alt="">
            <?php echo e(translate('employee_Update')); ?>

        </h2>
    </div>
    <!-- End Page Title -->

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo e(route('admin.employee.update',[$e['id']])); ?>" method="post" enctype="multipart/form-data"
                          style="text-align: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;">
                        <?php echo csrf_field(); ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                            <i class="tio-user"></i>
                            <?php echo e(translate('general_Information')); ?>

                        </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"
                                        class="title-color"><?php echo e(translate('full_Name')); ?></label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="<?php echo e(translate('ex')); ?> : Jhon Doe"
                                        value="<?php echo e($e['name']); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title-color"><?php echo e(translate('phone')); ?></label>
                                    <input type="number" name="phone" value="<?php echo e($e['phone']); ?>" class="form-control"
                                        id="phone"
                                        placeholder="<?php echo e(translate('ex')); ?> : +88017********" required>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="title-color"><?php echo e(translate('role')); ?></label>
                                    <select class="form-control" name="role_id">
                                        <option value="0" selected disabled>---<?php echo e(translate('select')); ?>---
                                        </option>
                                        <?php $__currentLoopData = $rls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($r->id); ?>" <?php echo e($r['id']==$e['admin_role_id']?'selected':''); ?>><?php echo e($r->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <!-- identify Type -->
                                <div class="form-group">
                                    <label for="name" class="title-color"><?php echo e(translate('identify_type')); ?></label>
                                    <select class="form-control" name="identify_type">
                                        <option value="" selected disabled><?php echo e(translate('select_identify_type')); ?> </option>
                                        <option value="nid" <?php echo e($e->identify_type == 'nid' ?'selected' : ''); ?>><?php echo e(translate('NID')); ?></option>
                                        <option value="passport" <?php echo e($e->identify_type == 'passport' ?'selected' : ''); ?>><?php echo e(translate('passport')); ?></option>
                                    </select>
                                </div>
                                <!-- identify Type -->
                                <div class="form-group">
                                    <label for="name" class="title-color"><?php echo e(translate('identify_number')); ?></label>
                                    <input type="number" name="identify_number" value="<?php echo e($e->identify_number); ?>" class="form-control"
                                        placeholder="<?php echo e(translate('ex')); ?> : 9876123123">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="text-center mb-3">
                                        <img class="upload-img-view" id="viewer"
                                            onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                            src="<?php echo e(asset('storage/app/public/admin')); ?>/<?php echo e($e['image']); ?>"
                                            alt="Product thumbnail"/>
                                    </div>
                                    <label for="name" class="title-color"><?php echo e(translate('employee_image')); ?></label>
                                    <span class="text-info">( <?php echo e(translate('ratio')); ?> 1:1 )</span>
                                    <div class="form-group">
                                        <div class="custom-file text-left">
                                            <input type="file" name="image" id="customFileUpload"
                                                class="custom-file-input"
                                                accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*">
                                            <label class="custom-file-label"
                                                for="customFileUpload"><?php echo e(translate('choose_File')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="title-color" for="exampleFormControlInput1"><?php echo e(translate('identity_image')); ?></label>
                                    <div>
                                        <div class="row" id="coba">
                                            <?php if($e['identify_image']): ?>
                                                <?php $__currentLoopData = json_decode($e['identify_image'],true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-4 mb-3">
                                                        <img height="150"
                                                        onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                        src="<?php echo e(asset('storage/app/public/admin').'/'.$img); ?>">
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="mb-0 page-header-title d-flex align-items-center gap-2 border-bottom pb-3 mb-3">
                            <i class="tio-user"></i>
                            <?php echo e(translate('account_Information')); ?>

                        </h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="title-color"><?php echo e(translate('email')); ?></label>
                                    <input type="email" name="email" value="<?php echo e($e['email']); ?>" class="form-control"
                                        id="email"
                                        placeholder="<?php echo e(translate('ex')); ?> : ex@gmail.com" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password" class="title-color"><?php echo e(translate('password')); ?></label><small> ( <?php echo e(translate('input_if_you_want_to_change')); ?> )</small>
                                    <input type="text" name="password" class="form-control" id="password"
                                        placeholder="<?php echo e(translate('password')); ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="confirm_password"
                                        class="title-color"><?php echo e(translate('confirm_password')); ?></label>
                                    <input type="text" name="confirm_password" class="form-control"
                                        id="confirm_password"
                                        placeholder="<?php echo e(translate('confirm_password')); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3">
                            <button type="submit" class="btn btn--primary px-4"><?php echo e(translate('update')); ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--modal-->
    <?php echo $__env->make('shared-partials.image-process._image-crop-modal',['modal_id'=>'employee-image-modal'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--modal-->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('public/assets/back-end')); ?>/js/select2.min.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#viewer').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#customFileUpload").change(function () {
            readURL(this);
        });


        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-responsive").select2({
            width: 'resolve'
        });

    </script>
    <script src="<?php echo e(asset('public/assets/back-end/js/spartan-multi-image-picker.js')); ?>"></script>
    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'identity_image[]',
                maxCount: 5,
                rowHeight: 'auto',
                groupClassName: 'col-6 col-lg-4',
                maxFileSize: '',
                placeholderImage: {
                    image: '<?php echo e(asset("public/assets/back-end/img/400x400/img2.jpg")); ?>',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('<?php echo e(translate("please_only_input_png_or_jpg_type_file")); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('<?php echo e(translate("file_size_too_big")); ?>', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
        </script>

    <?php echo $__env->make('shared-partials.image-process._script',[
   'id'=>'employee-image-modal',
   'height'=>200,
   'width'=>200,
   'multi_image'=>false,
   'route'=>route('image-upload')
   ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.back-end.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/employee/edit.blade.php ENDPATH**/ ?>