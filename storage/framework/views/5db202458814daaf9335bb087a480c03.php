<?php $__env->startSection('title', 'Genres'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                
                <form action="<?php echo e(route('genre.trash')); ?>" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search genres" value="<?php echo e($search); ?>">
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
                    <th scope="col">Genre</th>
                    <th scope="col">Waktu Hapus</th>
                    <th scope="col" width='10%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($genre->name); ?></td>
                        <td><?php echo e($genre->deleted_at); ?></td>
                        <td>
                            
                            <form class="form-inline d-inline" action="<?php echo e(route('genre.restore', $genre->id_genre)); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-icon btn-success"><i class="fas fa-angle-double-up"></i></button>
                            </form>
                            <form class="form-inline d-inline" action="<?php echo e(route('genre.delete', $genre->id_genre)); ?>" method="GET">
                                <?php echo csrf_field(); ?>
                                <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div>
            <?php echo e($genres->links('pagination::bootstrap-4')); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function () {
        $('#genre').addClass('active');
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\OneDrive\Pictures\ta-undip-rev2\resources\views/genre/trash.blade.php ENDPATH**/ ?>