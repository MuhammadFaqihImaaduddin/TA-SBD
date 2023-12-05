<?php $__env->startSection('title', 'Review'); ?>

<?php $__env->startSection('content'); ?>
<style>
  .star-rating {
  direction: rtl;
  font-size: 0;
}
.star-rating input {
  display: none;
}
.star-rating label {
  font-size: 24px;
  color: #ddd;
  cursor: pointer;
}
.star-rating label:hover,
.star-rating label:hover ~ label,
.star-rating input:checked ~ label {
  color: gold;
}

.star-rating label i{
  font-size: 32pt !important;
}

</style>
<div class="card">
    <form action="<?php echo e(route('review.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="card-header">
      <h4>Tambah Review</h4>
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
        <label>Movie</label>
        <select class="form-control" name="id_movie">
          <option value="">Pilih Movie</option>
          <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($movie->id_movie); ?>"><?php echo e($movie->title); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
      </div>
      <div class="form-group">
        <label>Review</label>
        <textarea class="form-control" name="review" rows="10"></textarea>
      </div>
      <div class="form-group">
        <label>Rating</label>
        <div class="star-rating">
          <input id="star-5" type="radio" name="rating" value="5">
          <label for="star-5" title="5 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-4" type="radio" name="rating" value="4">
          <label for="star-4" title="4 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-3" type="radio" name="rating" value="3">
          <label for="star-3" title="3 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-2" type="radio" name="rating" value="2">
          <label for="star-2" title="2 stars"><i class="fas fa-star"></i></label>
        
          <input id="star-1" type="radio" name="rating" value="1">
          <label for="star-1" title="1 star"><i class="fas fa-star"></i></label>
        </div>
        
      </div>
      
    </div>
    <div class="card-footer text-right">
      <button class="btn btn-primary mr-1" type="submit">Simpan</button>
    </div>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
  document.querySelectorAll('.star-rating input').forEach(radio => {
  radio.addEventListener('change', function() {
    alert("Selected rating: " + this.value);
  });
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\OneDrive\Pictures\ta-undip-rev2\resources\views/review/create.blade.php ENDPATH**/ ?>