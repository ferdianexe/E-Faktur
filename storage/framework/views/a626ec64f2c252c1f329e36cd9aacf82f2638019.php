<?php $__env->startSection('content'); ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <br>
  <div class="content">
      <div class="container">
        <?php if(session()->get('success')): ?>
          <div class="alert alert-success">
            <?php echo e(session()->get('success')); ?>  
          </div><br />
        <?php endif; ?>
        <div class="row">
            <p class="col-8 h2">Data utama</p>
            <a href="<?php echo e(url('data/create')); ?>" type="button" class="btn btn-primary col-4">Buat Data Baru</a>
        </div>
      </div>
      <br>
      <div class="container">
        <p class="h3">Data Utama anda sekarang</p>
        <br>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Satuan</th>
              <th scope="col">Harga</th>
              <th scope="col">Stock</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $dataMasters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataMaster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row"><?php echo e($dataMaster->id); ?></th>
              <td><?php echo e($dataMaster->name); ?></td>
              <td><?php echo e($dataMaster->satuan); ?></td>
              <td><?php echo e($dataMaster->harga); ?></td>
              <td><?php echo e($dataMaster->stock); ?></td>
              <td> <form action="<?php echo e(route('data.delete', $dataMaster->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form></td>
              <td><a href="<?php echo e(route('data.edit',$dataMaster->id)); ?>" class="btn btn-primary">Edit</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
  </div>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>