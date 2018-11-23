@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
                @csrf
                <div class="form-group col-md-6">
                <label for="inputKodeInvoice">Kode Invoice</label>
                <input type="text" class="form-control" id="inputKodeInvoice" name="kode" placeholder="Kode Invoice">
                </div>
                <div class="form-group col-md-6">
                <label for="inputTanggal">Tanggal</label>
                <input type="date" class="form-control" id="inputTanggal">
                </div>
                <label>Total Semua</label><br>
                <input type="text" name="harga" readonly class="form-control" value="0">

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
                            <td><input type="text" class="form-control" id="inputBarang1" name="nama1" placeholder="Barang"></td>
                            <td></td>
                            <td><input type="number" class="form-control" id="inputJumlah1" name="jumlah1"></td>
                            <td><input type="number" class="form-control" id="inputHarga1" name="harga1"></td>
                            <td><input type="number" class="form-control" id="inputDiskon1" name="diskon1"></td>
                            <td>0</td>
                            <td class="btn btn-danger">Delete</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><input type="text" class="form-control" id="inputBarang2" name="nama2" placeholder="Barang"></td>
                            <td></td>
                            <td><input type="number" class="form-control" id="inputJumlah2" name="jumlah2"></td>
                            <td><input type="number" class="form-control" id="inputHarga2" name="harga2"></td>
                            <td><input type="number" class="form-control" id="inputDiskon2" name="diskon2"></td>
                            <td>0</td>
                            <td class="btn btn-danger">Delete</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="text" class="form-control" id="inputBarang3" name="nama3" placeholder="Barang"></td>
                            <td></td>
                            <td><input type="number" class="form-control" id="inputJumlah3" name="jumlah3"></td>
                            <td><input type="number" class="form-control" id="inputHarga3" name="harga3"></td>
                            <td><input type="number" class="form-control" id="inputDiskon3" name="diskon3"></td>
                            <td>0</td>
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
                                        '<td><input type="number" class="form-control" name="jumlah"'+i+'  id="inputJumlah"'+i+'></td>'+
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
@endsection
