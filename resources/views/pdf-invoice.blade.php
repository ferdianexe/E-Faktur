
<!doctype html>
<html>
    <style type="text/css">
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            text-align : center;
        }
        th{
            background-color :#919191;
            height : 30px;
            font-size: 20px;
        }
        .no{
            width : 40px;
        }
        .kolom{
            width : 115px;
            padding:7px;
        }
        td{
            font-family: Arial, Helvetica, sans-serif;
        }
        .judul{
            margin-top: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }
        .info{
            font-family: Arial, Helvetica, sans-serif;
        }
        .total{
            margin-left: 45%;
        }
        tr:nth-child(even) {background: #CCC}
        tr:nth-child(odd) {background: #FFF}
    </style>
<div class="content">
  <div class="container">
      <div class="row judul">
          <h1 class="col-8 h1">Faktur {{$purchaseInvoices->kode}}</h1>
      </div>
      <div class="form-row container">
          <div class="form-group col-md-9 h5 info">
                <label>Tanggal : {{$purchaseInvoices->created_at}}</label>
                <label class="total">Total Semua : {{$purchaseInvoices->total}}</label>
          </div>
      </div>
      <br>
      <div class="form-group">
          <table class="table" id="invoices_data">
              <thead class="thead-dark">
              <tr>
                  <th class = "no top" scope="col">#</th>
                  <th class = "kolom top" scope="col">Nama Barang</th>
                  <th class = "kolom top" scope="col">Jumlah</th>
                  <th class = "kolom top" scope="col">Harga</th>
                  <th class = "kolom top" scope="col">Diskon</th>
                  <th class = "kolom top" scope="col">Total</th>
              </tr>
              </thead>
              <tbody>
              @foreach($purchaseInvoices->items as $key=>$item)
              <tr>
                  <th class = "no" scope="row">{{$key+1}}</th>
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
