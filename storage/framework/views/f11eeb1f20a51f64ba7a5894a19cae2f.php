<?php $__env->startSection('title', 'Movie'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('movie.store')); ?>" method="POST">
<div class="card">
    <?php echo csrf_field(); ?>
    <div class="card-header">
      <h4>Tambah Movie</h4>
      <div class="card-header-action">
        <a href="<?php echo e(route('movie')); ?>" class="btn btn-info">Kembali</a>
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
        <label>Judul</label>
        <input name="title" type="text" class="form-control">
      </div>
      <div class="form-group">
        <label>Tanggal Rilis</label>
        <input name="release_date" type="date" class="form-control">
      </div>
      <div class="form-group">
        <label>Genre</label>
        <select name="id_genre" class="form-control">
          <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($genre->id_genre); ?>"><?php echo e($genre->name); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
    </div>
  </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\OneDrive\Pictures\ta-undip-rev2\resources\views/movie/create.blade.php ENDPATH**/ ?>