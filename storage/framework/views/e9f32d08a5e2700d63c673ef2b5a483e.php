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
    <div class="card-header">
      <h4>Detail</h4>
        <div class="card-header-action">
            <a href="<?php echo e(route('review')); ?>" class="btn btn-primary">Kembali</a>
            <a href="<?php echo e(route('review.edit', $review->id_review)); ?>" class="btn btn-warning">Edit</a>
            <form action="<?php echo e(route('review.destroy', $review->id_review)); ?>" method="GET" class="d-inline">
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5 class="text-center">Movie</h5>
                
                <div class="dropdown-divider"></div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Title</p>
                        <p>Genre</p>
                        <p>Release Date</p>
                    </div>
                    <div class="col-md-6">
                        <p>: <?php echo e($review->movie_title); ?></p>
                        <p>: <?php echo e($review->genre_name); ?></p>
                        <p>: <?php echo e($review->movie_release_date); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        
        <div class="dropdown-divider"></div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5 class="text-center">Review</h5>
                
                <div class="dropdown-divider"></div>
                <div class="row">
                    <div class="col-md-6">
                        <p>Author</p>
                        <p>Comment</p>
                        <p>Rating</p>
                    </div>
                    <div class="col-md-6">
                        <p>: <?php echo e($review->user_name); ?></p>
                        <p>: <?php echo e($review->comment); ?></p>
                        <p>: <?php echo e($review->rating); ?> 
                <i class="active fa fa-star" aria-hidden="true" style="color: gold;"></i>
                        
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
      
    </div>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ta-undip/resources/views/review/show.blade.php ENDPATH**/ ?>