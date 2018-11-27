<?php $__env->startSection('content'); ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<br>
<div class="content">
    <div class="container">
        <form id="form" method="post" onsubmit="return false" action="<?php echo e(route('invoices.update', $purchaseInvoices->id)); ?>">
            <div class="row">
                <p class="col-8 h2">Buat Faktur</p>
                <button onclick="submits()" class="btn btn-primary col-4">Save Faktur</button>
            </div>
            <br>
            <div class="form-row">
                <?php echo csrf_field(); ?>
                <div class="form-group col-md-6">
                    <label for="inputKodeInvoice">Kode Invoice</label>
                    <input type="text" class="form-control" id="inputKodeInvoice" name="kode" placeholder="Kode Invoice" value="<?php echo e($purchaseInvoices->kode); ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTanggal">Tanggal</label>
                    <input type="date" class="form-control" id="inputTanggal" value="<?php echo e($purchaseInvoices->created_at); ?>">
                </div>
                <label>Total Semua</label><br>
                <input type="text" name="harga" readonly class="form-control" value="<?php echo e($purchaseInvoices->total); ?>">
                <!--                <button type="submit" class="btn btn-primary">Save Faktur</button>-->
            </div>
            <br>
            <div class="form-group">
                <table class="table" id="invoices_data">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Diskon</th>
                        <th scope="col">Total</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $purchaseInvoices->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row"><?php echo e($key+1); ?></th>
                        <td><?php echo e($item->nama); ?></td>
                        <td>0</td>
                        <td><?php echo e($item->jumlah); ?></td>
                        <td><?php echo e($item->harga); ?></td>
                        <td><?php echo e($item->diskon); ?></td>
                        <td><?php echo e($item->total); ?></td>
                        <td class="btn btn-danger">Delete</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    var i= "<?php echo sizeof($purchaseInvoices->items) ?>";
    $.ajax({
        type:'get',
        url:'/invoices/',
        data:'_token = <?php echo csrf_token() ?>',
        success:function(data){
            $("#msg").html(data.msg);
        }
    });
    console.log(i);
    var form = document.getElementById("form");
    function submits(){
        form.action = '/invoices/create/'+i;
        console.log(form);
        form.submit();
    }
    $(document).ready(function(){
        form = document.getElementById("form");
        form.method = 'POST';
        $('#add').click(function(){
            i++;
            $('#invoices_data').append('<tr id=row'+i+'><th scope="row">'+i+'</th>'+
                '<td><input type="text" placeholder="Barang" name="nama"'+i+' class="form-control" /></td>'+
                '<td/>'+
                '<td><input type="number" class="form-control" name="jumlah"'+i+' id="inputJumlah"'+i+'></td>'+
                '<td><input type="number" class="form-control" name="harga"'+i+' id="inputHarga"'+i+'></td>'+
                '<td><input type="number" class="form-control" name="diskon"'+i+' id="inputDiskon"'+i+'></td>'+
                '<td> 0 </td>'+
                '<td class="btn btn-danger btn_remove" nomor='+i+'>Delete</td>'+
                '</tr>');
        });

        $(document).on('click', '.btn_remove', function(){
            var button_id = $(this).attr("nomor");
            $('#row'+button_id+'').remove();
        });
        /// copas blom kepake
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $(".print-success-msg").css('display','none');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });
    //// blom kepake
</script>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>