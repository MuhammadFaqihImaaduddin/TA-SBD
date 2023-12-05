<?php $__env->startSection('title', 'Genres'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('genre.store')); ?>" method="POST">
<?php echo csrf_field(); ?>
<div class="card">
    <div class="card-header">
      <h4>Tambah Genre</h4>
      <div class="card-header-action">
        <a href="<?php echo e(route('genre')); ?>" class="btn btn-info">Kembali</a>
        <button class="btn btn-primary mr-1" type="submit">Simpan</button>
      </div>
    </div>
    <div class="card-body">
      <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($error); ?> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>
      <div class="form-group">
        <label>Nama</label>
        <input name="name" type="text" class="form-control">
      </div>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ta-undip/resources/views/genre/create.blade.php ENDPATH**/ ?>