<?php $__env->startSection('title','Alumni Users - Admin'); ?>
<?php $__env->startSection('page-title','Alumni Users'); ?>
<?php $__env->startSection('content'); ?>

<div class="admin-table-wrap">
    <div style="padding:20px 24px 0">
        <div class="tab-btns" style="margin-bottom:0">
            <a href="<?php echo e(route('admin.alumni.index')); ?>" class="tab-btn <?php echo e(request()->routeIs('admin.alumni.index') ? 'active' : ''); ?>" style="text-decoration:none">User List</a>
            <a href="<?php echo e(route('admin.alumni.approvals')); ?>" class="tab-btn <?php echo e(request()->routeIs('admin.alumni.approvals') ? 'active' : ''); ?>" style="text-decoration:none">Approvals</a>
        </div>
    </div>

    <div class="admin-table-toolbar">
        <form method="GET" action="<?php echo e(route('admin.alumni.index')); ?>" style="display:flex;gap:10px">
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
                <td>
                    <label class="toggle">
                        <input type="checkbox" <?php echo e($u->is_active ? 'checked' : ''); ?> onchange="toggleStatus(<?php echo e($u->id); ?>, this)">
                        <span class="toggle-slider"></span>
                    </label>
                </td>
                <td>
                    <div class="action-icons">
                        <a href="<?php echo e(route('admin.alumni.show', $u->id)); ?>" class="btn-view" title="View">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="7" style="text-align:center;padding:40px;color:var(--text-muted)">No alumni users found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="admin-table-footer">
        <div>
            <span>Result per page</span>
            <select style="border:1px solid var(--border);border-radius:6px;padding:4px 8px;margin-left:8px;font-size:13px">
                <option>10</option><option>25</option><option>50</option>
            </select>
        </div>
        <div><?php echo e($users->links('vendor.pagination.simple-default')); ?></div>
        <div><?php echo e($users->firstItem()); ?>-<?php echo e($users->lastItem()); ?> of <?php echo e($users->total()); ?></div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
function toggleStatus(id, checkbox) {
    fetch(`/admin/alumni-users/${id}/toggle-status`, {
        method: 'POST',
        headers: {'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>','Content-Type': 'application/json'}
    })
    .then(r => r.json())
    .then(data => { checkbox.checked = data.is_active; });
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\poba-new\POBA-main\resources\views/admin/alumni/index.blade.php ENDPATH**/ ?>