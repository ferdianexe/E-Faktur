@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div><br />
        @endif
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
              <th scope="col">Harga</th>
              <th scope="col">Stock</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataMasters as $dataMaster)
            <tr>
              <th scope="row">{{$dataMaster->id}}</th>
              <td>{{$dataMaster->name}}</td>
              <td>{{$dataMaster->satuan}}</td>
              <td>{{$dataMaster->harga}}</td>
              <td>{{$dataMaster->stock}}</td>
              <td> <form action="{{ route('data.delete', $dataMaster->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form></td>
              <td><a href="{{ route('data.edit',$dataMaster->id)}}" class="btn btn-primary">Edit</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</html>
@endsection
