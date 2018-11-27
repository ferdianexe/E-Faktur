<?php $__env->startSection('content'); ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Invoice</p>
            <a href="<?php echo e(url('invoices/create')); ?>" type="button" class="btn btn-primary col-4">Buat Data Baru</a>
        </div>
      </div>
      <br>
      <div class="container">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Invoices</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Total</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              <?php $__currentLoopData = $purchaseInvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchaseInvoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                  <th scope="row"><?php echo e($purchaseInvoice->id); ?></th>
                  <td><?php echo e($purchaseInvoice->kode); ?></td>
                  <td><?php echo e($purchaseInvoice->created_at); ?></td>
                  <td><?php echo e($purchaseInvoice->harga); ?></td>
                  <td class="btn btn-danger">Delete</td>
                  <td><a href="<?php echo e(route('invoices.edit',$purchaseInvoice->id)); ?>" class="btn btn-primary">Edit</a></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
  </div>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>