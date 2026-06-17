<?php $__env->startSection('title','Dashboard - Admin'); ?>
<?php $__env->startSection('page-title','Dashboard'); ?>
<?php $__env->startSection('content'); ?>

<div class="grid-4" style="gap:20px;margin-bottom:30px">
    <div style="background:#fff;border-radius:var(--radius);padding:24px;box-shadow:var(--shadow);border-left:4px solid var(--teal)">
        <div style="font-size:13px;color:var(--text-muted);margin-bottom:8px">Total Alumni</div>
        <div style="font-size:2.2rem;font-weight:800;color:var(--teal)"><?php echo e($totalAlumni); ?></div>
    </div>
    <div style="background:#fff;border-radius:var(--radius);padding:24px;box-shadow:var(--shadow);border-left:4px solid var(--orange)">
        <div style="font-size:13px;color:var(--text-muted);margin-bottom:8px">Pending Approvals</div>
        <div style="font-size:2.2rem;font-weight:800;color:var(--orange)"><?php echo e($pendingAlumni); ?></div>
    </div>
    <div style="background:#fff;border-radius:var(--radius);padding:24px;box-shadow:var(--shadow);border-left:4px solid #3498db">
        <div style="font-size:13px;color:var(--text-muted);margin-bottom:8px">Total Events</div>
        <div style="font-size:2.2rem;font-weight:800;color:#3498db"><?php echo e($totalEvents); ?></div>
    </div>
    <div style="background:#fff;border-radius:var(--radius);padding:24px;box-shadow:var(--shadow);border-left:4px solid #27ae60">
        <div style="font-size:13px;color:var(--text-muted);margin-bottom:8px">Upcoming Events</div>
        <div style="font-size:2.2rem;font-weight:800;color:#27ae60"><?php echo e($upcomingEvents); ?></div>
    </div>
</div>

<div class="grid-2" style="gap:24px">
    <div style="background:#fff;border-radius:var(--radius);padding:24px;box-shadow:var(--shadow)">
        <h3 style="font-size:17px;font-weight:700;margin-bottom:18px;color:var(--text-dark)">Quick Actions</h3>
        <div style="display:flex;flex-direction:column;gap:12px">
            <a href="<?php echo e(route('admin.alumni.approvals')); ?>" class="btn-teal" style="text-align:center;padding:12px">
                Review Pending Approvals (<?php echo e($pendingAlumni); ?>)
            </a>
            <a href="<?php echo e(route('admin.events.create')); ?>" class="btn-outline-teal" style="text-align:center;padding:12px">
                Create New Event
            </a>
            <a href="<?php echo e(route('admin.gallery.create')); ?>" class="btn-outline-teal" style="text-align:center;padding:12px">
                Add Gallery Folder
            </a>
            <a href="<?php echo e(route('admin.cms.news')); ?>" class="btn-outline-teal" style="text-align:center;padding:12px">
                Manage News
            </a>
        </div>
    </div>

    <div style="background:#fff;border-radius:var(--radius);padding:24px;box-shadow:var(--shadow)">
        <h3 style="font-size:17px;font-weight:700;margin-bottom:18px;color:var(--text-dark)">Navigation</h3>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
            <?php $__currentLoopData = [
                ['label'=>'Alumni Users',   'route'=>'admin.alumni.index',        'icon'=>'👥'],
                ['label'=>'Events',         'route'=>'admin.events.index',         'icon'=>'📅'],
                ['label'=>'CMS',            'route'=>'admin.cms.homepage',         'icon'=>'📝'],
                ['label'=>'Gallery',        'route'=>'admin.gallery.index',        'icon'=>'🖼'],
                ['label'=>'Admin Users',    'route'=>'admin.admin-users.index',    'icon'=>'👤'],
                ['label'=>'SEO Settings',   'route'=>'admin.cms.seo',              'icon'=>'🔍'],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route($item['route'])); ?>"
               style="display:flex;align-items:center;gap:10px;padding:14px;border:1.5px solid var(--border);border-radius:10px;color:var(--text-dark);font-size:14px;font-weight:500;text-decoration:none;transition:all .2s"
               onmouseover="this.style.borderColor='var(--teal)';this.style.background='var(--teal-light)'"
               onmouseout="this.style.borderColor='var(--border)';this.style.background='#fff'">
                <span style="font-size:22px"><?php echo e($item['icon']); ?></span>
                <?php echo e($item['label']); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\poba-new\POBA-main\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>