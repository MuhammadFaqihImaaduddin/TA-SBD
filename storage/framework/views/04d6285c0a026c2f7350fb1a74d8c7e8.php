<?php $__env->startSection('title', 'Reviews'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                
                <form action="<?php echo e(route('review.trash')); ?>" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search Reviews" value="<?php echo e($search); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-2">
            </div>
        </div>

        
        <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Judul</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Rating</th>
                    <th scope="col">User</th>
                    <th scope="col">Waktu Hapus</th>
                    <th scope="col" width='10%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($review->movie_title); ?></td>
                        <td><?php echo e($review->comment); ?></td>
                        <td><?php echo e($review->rating); ?></td>
                        <td><?php echo e($review->user_name); ?></td>
                        <td><?php echo e($review->deleted_at); ?></td>
                        <td>
                            
                            <form class="form-inline d-inline" action="<?php echo e(route('review.restore', $review->id_review)); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-icon btn-success"><i class="fas fa-angle-double-up"></i></button>
                            </form>
                            <form class="form-inline d-inline" action="<?php echo e(route('review.delete', $review->id_review)); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div>
            <?php echo e($reviews->links('pagination::bootstrap-4')); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function () {
        $('#review').addClass('active');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ta-undip/resources/views/review/trash.blade.php ENDPATH**/ ?>