
<!doctype html>
<html>
  <style type="text/css">
   table {
    border-collapse: collapse;
    }
   table, th, td {
    border: 1px solid black;
    }
  </style>
<div class="content">
  <div class="container">
      <div class="row">
          <p class="col-8 h2">Faktur {{$purchaseInvoices->kode}}</p>
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
              <label>Tanggal {{$purchaseInvoices->created_at}}</label>
          </div>
          <label>Total Semua {{$purchaseInvoices->total}}</label>
      </div>
      <br>
      <div class="form-group">
          <table class="table" id="invoices_data">
              <thead class="thead-dark">
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Diskon</th>
                  <th scope="col">Total</th>
              </tr>
              </thead>
              <tbody>
              @foreach($purchaseInvoices->items as $key=>$item)
              <tr>
                  <th scope="row">{{$key+1}}</th>
                  <td>{{$item->nama}}</td>
                  <td>{{$item->jumlah}}</td>
                  <td>{{$item->harga}}</td>
                  <td>{{$item->diskon}}</td>
                  <td>{{$item->total}}</td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>
</html>
