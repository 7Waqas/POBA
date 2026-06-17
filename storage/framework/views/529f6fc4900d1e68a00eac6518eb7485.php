<?php $__env->startSection('title','Login - POBA'); ?>
<?php $__env->startSection('content'); ?>
<div class="login-wrap">
    <div class="login-box">
        <h1>Login</h1>
        <p class="subtitle"><a href="#" style="color:var(--orange)">Login to access Alumni Section</a></p>

        <?php if($errors->any()): ?>
            <div class="alert alert-danger"><?php echo e($errors->first()); ?></div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="mail@abc.com" value="<?php echo e(old('email')); ?>" required>
            </div>
            <div class="form-group" style="position:relative">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="pwField" placeholder="••••••••••••••••" required>
                <button type="button" onclick="togglePw()" style="position:absolute;right:14px;top:38px;background:none;border:none;cursor:pointer;color:#888">
                    👁
                </button>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:22px">
                <label style="display:flex;align-items:center;gap:8px;font-size:13px;cursor:pointer">
                    <input type="checkbox" name="remember" style="accent-color:var(--teal)"> Remember Me
                </label>
                <a href="#" style="font-size:13px;font-weight:600;color:var(--teal)">Forgot Password?</a>
            </div>
            <button type="submit" class="btn-teal" style="width:100%;padding:14px;font-size:16px;border-radius:10px">Login</button>
        </form>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
function togglePw(){
    const f=document.getElementById('pwField');
    f.type = f.type==='password' ? 'text' : 'password';
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\poba-new\POBA-main\resources\views/auth/login.blade.php ENDPATH**/ ?>