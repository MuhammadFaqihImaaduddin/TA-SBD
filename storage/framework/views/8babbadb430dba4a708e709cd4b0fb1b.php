<?php $__env->startSection('title', 'Genres'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                
                <form action="<?php echo e(route('genre')); ?>" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search genres" value="<?php echo e($search); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="<?php echo e(route('genre.trash')); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-angle-double-up"></i> Restore Data</a>
                <a href="<?php echo e(route('genre.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Genre</th>
                    <th scope="col" width='10%'>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($genre->name); ?></td>
                        <td>
                            <a href="<?php echo e(route('genre.edit', $genre->id_genre)); ?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                            <form class="form-inline d-inline" action="<?php echo e(route('genre.destroy', $genre->id_genre)); ?>" method="GET">
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Asus\OneDrive\Pictures\ta-undip-rev2\resources\views/genre/index.blade.php ENDPATH**/ ?>