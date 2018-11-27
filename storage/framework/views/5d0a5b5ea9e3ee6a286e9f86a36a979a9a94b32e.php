<?php $__env->startSection('content'); ?>
<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <br>
  <div class="content">
      <div class="container">
        <form id="form" onsubmit="return false">
            <div class="row">
                <p class="col-8 h2">Buat Faktur</p>
                <button onclick="submits()" class="btn btn-primary col-4">Save Faktur</button>
            </div>
            <br>
            <div class="form-row">
                <?php echo csrf_field(); ?>
                <div class="form-group col-md-6">
                <label for="inputKodeInvoice">Kode Invoice</label>
                <input type="text" class="form-control" id="inputKodeInvoice" name="kode" placeholder="Kode Invoice">
                </div>
                <div class="form-group col-md-6">
                <label for="inputTanggal">Tanggal</label>
                <input type="date" class="form-control" id="inputTanggal">
                </div>
                <label>Total Semua</label><br>
                <input type="text" name="harga" readonly class="form-control grandTotal" value="0">

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
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <select class="form-control dataSection" nomor="1" id="inputBarang1" name="nama1" placeholder="Barang">
                                <option value=""></option>
                                <?php $__currentLoopData = $dataMasters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataMaster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value ='<?php echo e($dataMaster->id); ?>'> <?php echo e($dataMaster->name); ?> </option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                            <td id="satuanBarang1"></td>
                            <td><input type="number" class="form-control jumlah" nomor="1" id="inputJumlah1" name="jumlah1"></td>
                            <td><input type="number" class="form-control" readonly id="inputHarga1" name="harga1"></td>
                            <td><input type="number" class="form-control" id="inputDiskon1" name="diskon1"></td>
                            <td id="hargaTotal1">0</td>
                            <td class="btn btn-danger">Delete</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>
                                <select class="form-control dataSection" id="inputBarang2" nomor="2" name="nama1" placeholder="Barang">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $dataMasters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataMaster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value ='<?php echo e($dataMaster->id); ?>'> <?php echo e($dataMaster->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                            <td id="satuanBarang2"></td>
                            <td><input type="number" class="form-control jumlah" nomor="2" id="inputJumlah2" name="jumlah2"></td>
                            <td><input type="number" class="form-control" readonly id="inputHarga2" name="harga2"></td>
                            <td><input type="number" class="form-control" id="inputDiskon2" name="diskon2"></td>
                            <td id="hargaTotal2">0</td>
                            <td class="btn btn-danger">Delete</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>
                                <select class="form-control dataSection" nomor="3" id="inputBarang3" name="nama1" placeholder="Barang">
                                    <option value=""></option>
                                    <?php $__currentLoopData = $dataMasters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataMaster): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value ='<?php echo e($dataMaster->id); ?>'> <?php echo e($dataMaster->name); ?> </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </td>
                            <td id="satuanBarang3"></td>
                            <td><input type="number" class="form-control jumlah" nomor="3" id="inputJumlah3" name="jumlah3"></td>
                            <td><input type="number" class="form-control" readonly id="inputHarga3" name="harga3"></td>
                            <td><input type="number" class="form-control" id="inputDiskon3" name="diskon3"></td>
                            <td id="hargaTotal3">0</td>
                            <td class="btn btn-danger">Delete</td>
                        </tr>
                    </tbody>
                </table>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
            </div>
        </form>
      </div>
  </div>
  <script type="text/javascript">     
      var i=3;
      var form = document.getElementById("form");
      function submits(){
          form.action = '/invoices/create/'+i;
          form.submit();
      }
    let dataMasters = <?php echo json_encode($dataMasters, 15, 512) ?>;
    $(document).ready(function(){
        let choices ="";
        for(let i = 0 ; i<dataMasters.length;i++){
            let value = dataMasters[i].name;
            choices += '<option value='+dataMasters[i].id+'>'+value+'</option>';
        }
        form = document.getElementById("form");
        form.method = 'POST';
        $('#add').click(function(){
           i++;
           $('#invoices_data').append('<tr id=row'+i+'><th scope="row">'+i+'</th>'+
                                        '<td><select placeholder="Barang" name="nama'+i+'" class="form-control dataSection" nomor="'+i+'">'+
                                            '<option value=""></option>'+
                                             choices+
                                            '</select>'+
                                        '<td id="satuanBarang'+i+'">'+
                                        '</td>'+
                                        '<td><input type="number" class="form-control jumlah" nomor="'+i+'" name="jumlah'+i+'"  id="inputJumlah'+i+'"></td>'+
                                        '<td><input type="number" class="form-control" readonly name="harga'+i+'" id="inputHarga'+i+'"></td>'+
                                        '<td><input type="number" class="form-control" name="diskon'+i+'" id="inputDiskon'+i+'"></td>'+
                                        '<td id="hargaTotal'+i+'"> 0 </td>'+
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
    $( ".form-group" ).on( "change", ".dataSection", function() {
       let dataTarget ="";
       let target = $( this ).attr('nomor');
       let choices = $( this ).val();
       for(let i = 0 ; i<dataMasters.length;i++){
            let value = dataMasters[i].id;
            if(value==choices){
                dataTarget = dataMasters[i];
            }
            
        }
        let harga = dataTarget.harga;
        let satuan = dataTarget.satuan;
        if(dataTarget==""){
            harga="";
            satuan="";
        }
        $("#satuanBarang"+target).text(satuan);
        $("#inputHarga"+target).val(harga);
       
    });

    $( ".form-group" ).on( "change", ".jumlah", function() {
       let target = $( this ).attr('nomor');
       let choices = $( this ).val();
       let harga = parseInt($("#inputHarga"+target).val());
       let total = harga*choices
        $("#hargaTotal"+target).text(total); 
    });
</script>
</html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>