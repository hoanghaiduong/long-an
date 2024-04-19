<div class="modal fade" id="chatting_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-faded-info">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(translate('Send_Message_to_seller')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('messages_store')); ?>" method="post" id="chat-form">
                    <?php echo csrf_field(); ?>
                    <?php if(isset($seller->shop->id) && $seller->shop->id != 0): ?>
                        <input value="<?php echo e($seller->shop->id); ?>" name="shop_id" hidden>
                        <input value="<?php echo e($seller->id); ?>}" name="seller_id" hidden>
                    <?php endif; ?>

                    <textarea name="message" class="form-control" required placeholder="<?php echo e(translate('Write_here')); ?>..."></textarea>
                    <br>
                    <div class="justify-content-end gap-2 d-flex flex-wrap">
                        <a href="<?php echo e(route('chat', ['type' => 'seller'])); ?>" class="btn btn-soft-primary bg--secondary border">
                            <?php echo e(translate('go_to_chatbox')); ?>

                        </a>
                        <?php if(isset($seller->shop->id) && $seller->shop->id  != 0): ?>
                            <button
                                class="btn btn--primary text-white"><?php echo e(translate('send')); ?></button>
                        <?php else: ?>
                            <button class="btn btn--primary text-white"
                                    disabled><?php echo e(translate('send')); ?></button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\long-an\resources\themes\default/layouts/front-end/partials/modal/_chatting.blade.php ENDPATH**/ ?>