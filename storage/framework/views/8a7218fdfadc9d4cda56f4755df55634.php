<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title><?php echo $__env->yieldContent('title'); ?> &mdash; <?php echo e(env('APP_NAME')); ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/modules/fontawesome/css/all.min.css')); ?>">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/components.css')); ?>">

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo e(asset('assets/img/avatar/avatar-1.png')); ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo e(Auth::user()->name); ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/"><?php echo e(env('APP_NAME')); ?></a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">
            <?php echo e(substr(env('APP_NAME'), 0, 1)); ?>

            </a>
          </div>
          <ul class="sidebar-menu" style="bottom: 0;">
            <li class="menu-header">Master</li>
            <li class="">
              <a href="<?php echo e(route('genre')); ?>" class="nav-link "><i class="fas fa-heart"></i> <span>Genre</span></a>
            </li>
            <li class="">
              <a href="<?php echo e(route('movie')); ?>" class="nav-link "><i class="fas fa-ticket-alt"></i> <span>Movie</span></a>
            </li>
            <li class="">
              <a href="<?php echo e(route('review')); ?>" class="nav-link "><i class="fas fa-feather-alt"></i> <span>Review</span></a>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <?php echo $__env->yieldContent('title'); ?>
          </div>

          <div class="section-body">
            <?php echo $__env->yieldContent('content'); ?>
          </div>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <?php echo $__env->yieldContent('script'); ?>

  <!-- General JS Scripts -->
  <script src="<?php echo e(asset('assets/modules/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/modules/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/modules/tooltip.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/modules/moment.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/stisla.js')); ?>"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?php echo e(asset('assets/js/scripts.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>
</body>
</html><?php /**PATH /var/www/html/ta-undip/resources/views/layouts/admin.blade.php ENDPATH**/ ?>