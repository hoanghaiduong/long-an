<?php $__env->startSection('message'); ?>
    <style>
        .for-margin {
            margin: auto;

            margin-bottom: 10%;
        }

        .for-margin {

        }

        .page-not-found {
            margin-top: 30px;
            font-weight: 600;
            text-align: center;
        }
        .bg-light-blue{
            background-color: #1B7FED !important;
            border: none
        }
    </style>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <img style="" src="<?php echo e(asset("public/assets/back-end/img/404-logo.svg")); ?>" alt="">
                <h2 class="page-not-found"><?php echo e(translate('page_Not_found')); ?></h2>

                <p style="text-align: center;"><?php echo e(translate('we_are_sorry')); ?>, <?php echo e(translate('the_page_you_requested_could_not_be_found')); ?> <br>
                    <?php echo e(translate('please_go_back_to_the_homepage')); ?></p>
                <div style="text-align: center;">
                    <a class="btn btn--primary bg-light-blue" href="<?php echo e(route('home')); ?>"> <?php echo e(translate('home')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('errors::minimal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\long-an\resources\views/errors/404.blade.php ENDPATH**/ ?>