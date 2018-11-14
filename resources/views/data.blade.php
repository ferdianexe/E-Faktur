@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Data utama</p>
            <a href="{{ url('data/create') }}" type="button" class="btn btn-primary col-4">Buat Data Baru</a>
        </div>
      </div>
      <br>
      <div class="container">
        <p class="h3">Data Utama anda sekarang</p>
        <br>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nama Barang</th>
              <th scope="col">Satuan</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Barang Aing</td>
              <td>Liter</td>
              <td class="btn btn-danger">Delete</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Micin Segudang</td>
              <td>Kg</td>
              <td class="btn btn-danger">Delete</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Roycok</td>
              <td>Ml</td>
              <td class="btn btn-danger">Delete</td>
            </tr>
          </tbody>
        </table>
      </div>
  </div>
</html>
@endsection
