<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(translate('ready_to_Leave')); ?>?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><?php echo e(translate('Select_Logout_below_if_you_are_ready_to_end_your_current_session')); ?>.</div>
            <div class="modal-footer">
                <form action="<?php echo e(route('admin.auth.logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button class="btn btn-danger" type="button" data-dismiss="modal"><?php echo e(translate('cancel')); ?></button>
                    <button class="btn btn--primary" type="submit"><?php echo e(translate('logout')); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="popup-modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <h2 class="__color-8a8a8a">
                                <i class="tio-shopping-cart-outlined"></i> <?php echo e(translate('you_have_new_order')); ?>, <?php echo e(translate('check_please')); ?>.
                            </h2>
                            <hr>
                            <button onclick="check_order()" class="btn btn--primary"><?php echo e(translate('ok')); ?>, <?php echo e(translate('let_me_check')); ?></button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\long-an\resources\views/layouts/back-end/partials/_modals.blade.php ENDPATH**/ ?>