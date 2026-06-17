<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'POBA - Palandarians Old Boys Association'); ?></title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', 'Official POBA Alumni Network'); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/poba.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>


<div class="top-banner">PALANDARIANS' OLD BOYS' ASSOCIATION (POBA)</div>


<nav class="navbar">
    <div class="navbar-inner">
        
        <ul class="navbar-nav nav-left">
            <li><a href="<?php echo e(route('home')); ?>" class="<?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a></li>
            <li><a href="<?php echo e(route('about')); ?>" class="<?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">About Us</a></li>
            <!-- <li><a href="#">Sponsor</a></li> -->
             <li><a href="<?php echo e(route('news.index')); ?>" class="<?php echo e(request()->routeIs('news.*') ? 'active' : ''); ?>">Updates</a></li>
            <li><a href="<?php echo e(route('events.index')); ?>" class="<?php echo e(request()->routeIs('events.*') ? 'active' : ''); ?>">Events</a></li>
        </ul>

        
        <div class="navbar-logo-container">
            <a href="<?php echo e(route('home')); ?>" class="navbar-brand-centered">
                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="POBA Logo" onerror="this.style.display='none'">
            </a>
        </div>

        
        <ul class="navbar-nav nav-right">
            <li><a href="<?php echo e(route('star.alumni')); ?>" class="<?php echo e(request()->routeIs('star.*') ? 'active' : ''); ?>">Star Alumni</a></li>
            <li class="dropdown">
                <a href="#" class="<?php echo e(request()->routeIs('alumni.*') || request()->routeIs('gallery.*') ? 'active' : ''); ?>">Alumni ▾</a>
                <div class="dropdown-menu">
                    <a href="<?php echo e(route('member.index')); ?>">Become Member</a>
                    <a href="<?php echo e(route('alumni.index')); ?>">Alumni Directory</a>
                    <a href="#">Achievements</a>
                    <a href="#">Networking</a>
                    <a href="#">Career Services</a>
                    <a href="<?php echo e(route('gallery.index')); ?>">Gallery</a>
                </div>
            </li>
            <li><a href="<?php echo e(route('contact')); ?>" class="<?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">Contact</a></li>
            <li>
                <?php if(auth()->guard('alumni')->check()): ?>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" style="display:inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn-teal-nav" style="border:none;cursor:pointer">Logout</button>
                    </form>
                <?php else: ?>
                    <a href="<?php echo e(route('member.index')); ?>" class="btn-teal-nav">Become a Member</a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>


<?php if(session('success')): ?>
    <div class="container" style="margin-top:16px">
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="container" style="margin-top:16px">
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    </div>
<?php endif; ?>


<?php echo $__env->yieldContent('content'); ?>


<footer>
    <div class="container">
        <div class="grid-4" style="gap:30px">
            <div>
                <div class="footer-logo">
                    <div class="footer-logo-circle">
                        <img src="<?php echo e(asset('images/logo.png')); ?>" alt="POBA Logo" onerror="this.style.display='none'">
                    </div>
                    <div>
                        <div class="footer-logo-text">POBA</div>
                        <div class="footer-logo-sub">Palandarians Old Boys Association</div>
                    </div>
                </div>
            </div>
            <div>
                <h5>Quick Links</h5>
                <a href="<?php echo e(route('about')); ?>">About Us</a>
                <a href="<?php echo e(route('news.index')); ?>">News</a>
                <a href="<?php echo e(route('events.index')); ?>">Events</a>
                <a href="#">Donate Now</a>
            </div>
            <div>
                <h5>Alumni</h5>
                <a href="<?php echo e(route('alumni.index')); ?>">Alumni Directory</a>
                <a href="#">Achievements</a>
                <a href="#">Networking</a>
                <a href="<?php echo e(route('star.alumni')); ?>">Star Alumni</a>
                <a href="#">Career Services</a>
            </div>
            <div>
                <div class="contact-info" style="flex-direction:column;gap:10px">
                    <span>📞 +92 21 123 4567</span>
                    <span>✉️ info@poba.edu.pk</span>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 POBA. All rights reserved.</p>
            <div class="social-links">
                <a href="#" title="Twitter">𝕏</a>
                <a href="#" title="LinkedIn">in</a>
                <a href="#" title="Facebook">f</a>
                <a href="#" title="Instagram">📷</a>
                <a href="#" title="TikTok">♪</a>
            </div>
        </div>
    </div>
</footer>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH E:\poba-new\POBA-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>