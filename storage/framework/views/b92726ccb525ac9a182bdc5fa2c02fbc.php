<?php $__env->startSection('title', 'Movies'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                
                <form action="<?php echo e(route('movie.trash')); ?>" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search Movies" value="<?php echo e($search); ?>">
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
                    <th scope="col">Tanggal Rilis</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Waktu Hapus</th>
                    <th scope="col" width='10%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($movie->title); ?></td>
                        <td><?php echo e(date('d-m-Y', strtotime($movie->release_date))); ?></td>
                        <td><?php echo e($movie->genre_name); ?></td>
                        <td><?php echo e($movie->deleted_at); ?></td>
                        <td>
                            
                            <form class="form-inline d-inline" action="<?php echo e(route('movie.restore', $movie->id_movie)); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-icon btn-success"><i class="fas fa-angle-double-up"></i></button>
                            </form>
                            <form class="form-inline d-inline" action="<?php echo e(route('movie.delete', $movie->id_movie)); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div>
            <?php echo e($movies->links('pagination::bootstrap-4')); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function () {
        $('#movie').addClass('active');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ta-undip/resources/views/movie/trash.blade.php ENDPATH**/ ?>