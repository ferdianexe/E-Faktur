@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Hutang</p>
        </div>
      </div>
      <br>
      <div class="container">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kode Invoices</th>
              <th scope="col">Nama</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Total</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
        </table>
      </div>
  </div>
</html>
@endsection
