@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Invoice</p>
            <button type="button" class="btn btn-primary col-4">Buat Invoices</button>
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
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>INV01</td>
              <td>13/11/2018</td>
              <td>100000</td>
              <td class="btn btn-danger">Delete</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>INV02</td>
              <td>13/11/2018</td>
              <td>200000</td>
              <td class="btn btn-danger">Delete</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>INV03</td>
              <td>13/11/2018</td>
              <td>300000</td>
              <td class="btn btn-danger">Delete</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</html>
@endsection
