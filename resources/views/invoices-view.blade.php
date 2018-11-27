@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<br>
<div class="content">
  <div class="container">
      <div class="row">
          <p class="col-8 h2">Faktur {{$purchaseInvoices->kode}}</p>
          <a href="{{ route('invoices.export', $purchaseInvoices->id) }}">Export PDF</a>
      </div>
      <br>
      <div class="form-row">
          @csrf
          <div class="form-group col-md-6">
              <label for="inputKodeInvoice">Kode Invoice</label>
              <input type="text" class="form-control" id="inputKodeInvoice" name="kode" placeholder="Kode Invoice" value="{{$purchaseInvoices->kode}}">
          </div>
          <div class="form-group col-md-6">
              <label for="inputTanggal">Tanggal</label>
              <input type="date" class="form-control" id="inputTanggal" value="{{$purchaseInvoices->created_at}}">
          </div>
          <label>Total Semua</label><br>
          <input type="text" name="harga" readonly class="form-control" value="{{$purchaseInvoices->total}}">
          <!--                <button type="submit" class="btn btn-primary">Save Faktur</button>-->
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
@endsection
