@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Invoice</p>
            <a href="{{ url('invoices/create') }}" type="button" class="btn btn-primary col-4">Buat Data Baru</a>
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
              @foreach($purchaseInvoices as $purchaseInvoice)
              <tr>
                  <th scope="row">{{$purchaseInvoice->id}}</th>
                  <td>{{$purchaseInvoice->kode}}</td>
                  <td>{{$purchaseInvoice->created_at}}</td>
                  <td>{{$purchaseInvoice->harga}}</td>
                  <td class="btn btn-danger">Delete</td>
                  <td><a href="{{ route('invoices.edit',$purchaseInvoice->id)}}" class="btn btn-primary">Edit</a></td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
  </div>
</html>
@endsection
