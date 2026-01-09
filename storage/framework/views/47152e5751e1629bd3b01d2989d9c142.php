

<?php $__env->startSection('content'); ?>
    <div class="custom-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 text-muted">Item List</h4>
            <a href="<?php echo e(route('items.create')); ?>" class="btn btn-custom">
                <i class="fas fa-plus me-2"></i> Add New Item
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-custom mb-0">
                <thead>
                    <tr>
                        <th class="rounded-start">Id</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Expired Date</th>
                        <th>Note</th>
                        <th class="rounded-end text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="fw-bold text-muted">#<?php echo e($item->id); ?></td>
                            <td><span class="badge bg-light text-dark border"><?php echo e($item->item_code); ?></span></td>
                            <td class="fw-bold"><?php echo e($item->item_name); ?></td>
                            <td><?php echo e($item->quantity); ?></td>
                            <td><?php echo e(date('d-m-Y', strtotime($item->expried_date))); ?></td>
                            <td class="text-muted"><?php echo e($item->note ?? '-'); ?></td>
                            <td class="text-center">
                                <a href="<?php echo e(route('items.edit', $item->id)); ?>"
                                    class="btn btn-sm btn-outline-primary border-0 me-2" title="Edit">
                                    <i class="fas fa-pencil-alt fa-lg"></i>
                                </a>
                                <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST"
                                    style="display:inline-block;"
                                    onsubmit="return confirm('Are you sure you want to delete this item?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Delete">
                                        <i class="fas fa-trash fa-lg"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="fas fa-box-open fa-3x mb-3 d-block opacity-50"></i>
                                No items found. Click "Add New Item" to create one.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\SQL_EXAM\SEM1_T2508M_Test\resources\views/items/index.blade.php ENDPATH**/ ?>