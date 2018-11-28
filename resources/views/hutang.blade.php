@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Debt</p>
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
            </tr>
          </thead>
          <tbody>
              @foreach($purchaseInvoices as $purchaseInvoice)
              <tr>
                  <th scope="row">{{$purchaseInvoice->id}}</th>
                  <td><a href="{{ route('invoices.show',$purchaseInvoice->id)}}">{{$purchaseInvoice->kode}}</a></td>
                  <td>{{$purchaseInvoice->created_at}}</td>
                  <td>{{$purchaseInvoice->harga}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
  </div>
</html>
@endsection
