<?php $__env->startSection('title', 'Movie'); ?>

<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-body">
        <div class="my-3 text-right row">
            <div class="col-md-4">
                
                <form action="<?php echo e(route('movie')); ?>" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control info" placeholder="Search movie" value="<?php echo e($search); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-info" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <a href="<?php echo e(route('movie.trash')); ?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-angle-double-up"></i> Restore Data</a>
                <a href="<?php echo e(route('movie.create')); ?>" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Data</a>
            </div>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
                <th scope="col">Judul</th>
                <th scope="col">Tanggal Rilis</th>
                <th scope="col">Genre</th>
                <th scope="col">Diupdate terakhir Oleh</th>
                <th scope="col" width='10%'>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $movies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($movie->title); ?></td>
                <td><?php echo e(date('d-m-Y', strtotime($movie->release_date))); ?></td>
                <td><?php echo e($movie->genre_name); ?></td>
                <td><?php echo e($movie->user_name); ?></td>
                <td>
                    <a href="<?php echo e(route('movie.edit', $movie->id_movie)); ?>" class="btn btn-icon btn-warning"><i class="far fa-edit"></i></a>
                    <form action="<?php echo e(route('movie.destroy', $movie->id_movie)); ?>" method="GET" class="d-inline">
                        <?php echo csrf_field(); ?>
                        <button class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
        <?php echo e($movies->links('pagination::bootstrap-4')); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $(document).ready(function() {
        $('#movie').addClass('active');
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/ta-undip/resources/views/movie/index.blade.php ENDPATH**/ ?>