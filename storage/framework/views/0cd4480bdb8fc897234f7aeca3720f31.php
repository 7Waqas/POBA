<?php $__env->startSection('title','Approvals - Admin'); ?>
<?php $__env->startSection('page-title','Alumni Users'); ?>
<?php $__env->startSection('content'); ?>

<div class="admin-table-wrap">
    <div style="padding:20px 24px 0">
        <div class="tab-btns" style="margin-bottom:0">
            <a href="<?php echo e(route('admin.alumni.index')); ?>" class="tab-btn" style="text-decoration:none">Users List</a>
            <a href="<?php echo e(route('admin.alumni.approvals')); ?>" class="tab-btn active" style="text-decoration:none">Approvals</a>
        </div>
    </div>

    <div class="admin-table-toolbar">
        <form method="GET" action="<?php echo e(route('admin.alumni.approvals')); ?>">
            <input type="text" name="search" class="search-input" placeholder="Search" value="<?php echo e(request('search')); ?>" style="width:260px">
        </form>
        <a href="<?php echo e(route('admin.alumni.export')); ?>" class="btn-outline-teal" style="font-size:13px;padding:8px 18px">⬆ Export</a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Name <span class="sort-icon">⇅</span></th>
                <th>Email <span class="sort-icon">⇅</span></th>
                <th>Phone Number <span class="sort-icon">⇅</span></th>
                <th>CCP No. <span class="sort-icon">⇅</span></th>
                <th>City <span class="sort-icon">⇅</span></th>
                <th>Status <span class="sort-icon">⇅</span></th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($u->full_name); ?></td>
                <td><?php echo e($u->email); ?></td>
                <td><?php echo e($u->phone_number); ?></td>
                <td><?php echo e($u->ccp_no); ?></td>
                <td><?php echo e($u->current_city); ?></td>
                <td><span class="badge badge-warning">Pending</span></td>
                <td>
                    <div class="action-icons">
                        <a href="<?php echo e(route('admin.alumni.show', $u->id)); ?>" class="btn-view" title="View">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7" style="text-align:center;padding:40px;color:var(--text-muted)">No pending approvals.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="admin-table-footer">
        <div>Result per page <select style="border:1px solid var(--border);border-radius:6px;padding:4px 8px;margin-left:8px;font-size:13px"><option>10</option><option>25</option></select></div>
        <div><?php echo e($users->links('vendor.pagination.simple-default')); ?></div>
        <div><?php echo e($users->firstItem() ?? 0); ?>-<?php echo e($users->lastItem() ?? 0); ?> of <?php echo e($users->total()); ?></div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\poba-new\POBA-main\resources\views/admin/alumni/approvals.blade.php ENDPATH**/ ?>