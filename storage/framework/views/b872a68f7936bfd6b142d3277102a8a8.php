<?php $__env->startSection('title', 'Review'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="mb-3 text-right row">
            <div class="col-md-4">
                
                <form action="<?php echo e(route('review')); ?>" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search review" value="<?php echo e($search); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="<?php echo e(route('review.trash')); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-angle-double-up"></i> Restore Data</a>
                <a href="<?php echo e(route('review.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $rating = $review->rating;
        if($rating < 3){
            $color = 'card-danger';
        }else if($rating < 4){
            $color = 'card-primary';
        }else{
            $color = 'card-success';
        }
    ?>
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card <?php echo e($color); ?>">
            <div class="card-header">
              <h4><?php echo e($review->movie_title); ?></h4>
              <div class="card-header-action">
                <?php echo e($review->rating); ?>

                <i class="active fa fa-star" aria-hidden="true" style="color: gold;"></i>
              </div>
            </div>
            <div class="card-body">
              <p><?php echo e($review->comment); ?></p>
            </div>
            <div class="card-footer">
                <small>by <?php echo e($review->user_name); ?></small>
                <span class="float-right">
                    <a href="<?php echo e(route('review.show', $review->id_review)); ?>" class="card-link">Detail ></a>
                </span>
            </div>
          </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#review').addClass('active');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ta-undip/resources/views/review/index.blade.php ENDPATH**/ ?>