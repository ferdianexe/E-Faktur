@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Buat Faktur</p>
            <button type="button" class="btn btn-primary col-4">Save Faktur</button>
        </div>
      </div>
      <br>
      <div class="container">
        <br>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputKodeInvoice">Kode Invoice</label>
                <input type="text" class="form-control" id="inputKodeInvoice" placeholder="Kode Invoice">
                </div>
                <div class="form-group col-md-6">
                <label for="inputTanggal">Tanggal</label>
                <input type="date" class="form-control" id="inputTanggal">
                </div>
                <label>Total Semua</label><br>
                <input type="text" readonly class="form-control" value="0">
                
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
                            <td><input type="text" class="form-control" id="inputBarang" placeholder="Barang"></td>
                            <td></td>
                            <td><input type="number" class="form-control" id="inputJumlah1"></td>
                            <td><input type="number" class="form-control" id="inputHarga1"></td>
                            <td><input type="number" class="form-control" id="inputDiskon1"></td>
                            <td>0</td>
                            <td class="btn btn-danger">Delete</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                            <td><input type="text" class="form-control" id="inputBarang" placeholder="Barang"></td>
                            <td></td>
                            <td><input type="number" class="form-control" id="inputJumlah2"></td>
                            <td><input type="number" class="form-control" id="inputHarga2"></td>
                            <td><input type="number" class="form-control" id="inputDiskon2"></td>
                            <td>0</td>
                            <td class="btn btn-danger">Delete</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><input type="text" class="form-control" id="inputBarang" placeholder="Barang"></td>
                            <td></td>
                            <td><input type="number" class="form-control" id="inputJumlah3"></td>
                            <td><input type="number" class="form-control" id="inputHarga3"></td>
                            <td><input type="number" class="form-control" id="inputDiskon3"></td>
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
    $(document).ready(function(){      
      var i=3;  
      $('#add').click(function(){  
           i++;  
           $('#invoices_data').append('<tr id=row'+i+'><th scope="row">'+i+'</th>'+
                                        '<td><input type="text" placeholder="Barang" class="form-control" /></td>'+
                                        '<td/>'+
                                        '<td><input type="number" class="form-control" id="inputJumlah"'+i+'></td>'+
                                        '<td><input type="number" class="form-control" id="inputHarga"'+i+'></td>'+
                                        '<td><input type="number" class="form-control" id="inputDiskon"'+i+'></td>'+
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
