

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4 ps-2 pe-2">
        <h5 class="text-muted m-0"><i class="fas fa-list me-2"></i>Item List</h5>
        <a href="<?php echo e(route('items.create')); ?>" class="btn btn-add-new">
            <i class="fas fa-plus me-2"></i>Add New
        </a>
    </div>

    <div class="table-container">
        <table class="table table-hover text-center mb-0">
            <thead>
                <tr>
                    <th class="rounded-start">Id</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Expired date</th>
                    <th>Note</th>
                    <th class="rounded-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="fw-bold text-secondary"><?php echo e($item->id); ?></td>
                        <td><span class="badge bg-light text-dark border"><?php echo e($item->item_code); ?></span></td>
                        <td class="fw-semibold text-start ps-5"><?php echo e($item->item_name); ?></td>
                        <td>
                            <span class="badge <?php echo e($item->quantity > 0 ? 'bg-success' : 'bg-danger'); ?>">
                                <?php echo e($item->quantity); ?>

                            </span>
                        </td>
                        <td><?php echo e(date('d / m / Y', strtotime($item->expried_date))); ?></td>
                        <td class="text-muted"><?php echo e($item->note); ?></td>
                        <td>
                            <a href="<?php echo e(route('items.edit', $item->id)); ?>" class="btn-action text-primary me-2" title="Edit">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <form action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" style="display:inline-block;"
                                onsubmit="return confirm('Are you sure you want to delete this item?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-action text-danger border-0 bg-transparent" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-box-open fa-3x mb-3"></i>
                            <p>No items found. Click "Add New" to create one.</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\SQL_EXAM\SEM1_T2508M_Test\resources\views/items/index.blade.php ENDPATH**/ ?>