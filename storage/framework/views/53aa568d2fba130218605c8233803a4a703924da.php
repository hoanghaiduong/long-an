<?php if(count($combinations) > 0): ?>
<table class="table physical_product_show table-borderless">
    <thead class="thead-light thead-50 text-capitalize">
        <tr>
            <th class="text-center">
                <label for="" class="control-label"><?php echo e(translate('SL')); ?></label>
            </th>
            <th class="text-center">
                <label for="" class="control-label"><?php echo e(translate('attribute_Variation')); ?></label>
            </th>
            <th class="text-center">
                <label for="" class="control-label"><?php echo e(translate('variation_Wise_Price')); ?> (<?php echo e(\App\CPU\BackEndHelper::currency_symbol()); ?>)</label>
            </th>
            <th class="text-center">
                <label for="" class="control-label"><?php echo e(translate('SKU')); ?></label>
            </th>
            <th class="text-center">
                <label for="" class="control-label"><?php echo e(translate('Variation_Wise_Stock')); ?></label>
            </th>
        </tr>
    </thead>
    <tbody>
    <?php endif; ?>

    <?php
        $serial = 1;
    ?>

    <?php $__currentLoopData = $combinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $combination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td class="text-center">
                <?php echo e($serial++); ?>

            </td>
            <td>
                <label for="" class="control-label"><?php echo e($combination['type']); ?></label>
                <input value="<?php echo e($combination['type']); ?>" name="type[]" class="d-none">
            </td>
            <td>
                <input type="number" name="price_<?php echo e($combination['type']); ?>"
                       value="<?php echo e(\App\CPU\Convert::default($combination['price'])); ?>" min="0"
                       step="0.01"
                       class="form-control" required placeholder="<?php echo e(translate('ex')); ?>: 535">
            </td>
            <td>
                <input type="text" name="sku_<?php echo e($combination['type']); ?>" value="<?php echo e($combination['sku']); ?>"
                       class="form-control" placeholder="<?php echo e(translate('ex')); ?>: MCU47V593M">
            </td>
            <td>
                <input type="number" onkeyup="update_qty()" name="qty_<?php echo e($combination['type']); ?>" value="<?php echo e($combination['qty']); ?>" min="1" max="100000" step="1"
                       class="form-control" placeholder="<?php echo e(translate('ex')); ?>: 5"
                       required>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>

<?php /**PATH C:\xampp\htdocs\long-an\resources\views/admin-views/product/partials/_edit_sku_combinations.blade.php ENDPATH**/ ?>