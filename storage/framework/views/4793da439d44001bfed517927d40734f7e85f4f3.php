<?php $__env->startSection('content'); ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Membuat Data</p>
        </div>
      </div>
      <br>
      <div class="container">
        <br>
        <form method="post" action="/data/create">
            <div class="form-row">
                <?php echo csrf_field(); ?>
                <div class="form-group col-md-6">
                <label for="inputBarang">Nama Barang</label>
                <input type="text" class="form-control" id="inputBarang" name="name" placeholder="Nama Barang">
                </div>
                <div class="form-group col-md-6">
                <label for="inputSatuan">Satuan</label>
                <input type="text" class="form-control" id="inputSatuan" name="satuan" placeholder="Jenis Satuan">
                </div>
            </div>
            <div class="form-group">
                <label for="inputJumlah">Harga</label>
                <input type="number" class="form-control" id="inputJumlah" name="harga" placeholder="Dalam Angka">
            </div>
            <div class="form-group">
                <label for="inputStock">Stock</label>
                <input type="number" class="form-control" id="inputStock" name="stock" placeholder="Dalam Angka">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Barang </button>
        </form>
      </div>
  </div>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>