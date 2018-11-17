@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Mengubah Data</p>
        </div>
      </div>
      <br>
      <div class="container">
        <br>
        <form method="POST" action="{{ route('data.update', $dataMaster->id) }}">
            <div class="form-row">
                @csrf
                <div class="form-group col-md-6">
                <label for="inputBarang">Nama Barang</label>
                <input type="text" class="form-control" id="inputBarang" name="name" value='{{$dataMaster->name}}' >
                </div>
                <div class="form-group col-md-6">
                <label for="inputSatuan">Satuan</label>
                <input type="text" class="form-control" id="inputSatuan" name="satuan" value='{{$dataMaster->satuan}}'>
                </div>
            </div>
            <div class="form-group">
                <label for="inputJumlah">Harga</label>
                <input type="number" class="form-control" id="inputJumlah" name="harga" value='{{$dataMaster->harga}}'>
            </div>
            <div class="form-group">
                <label for="inputStock">Stock</label>
                <input type="number" class="form-control" id="inputStock" name="stock" value='{{$dataMaster->stock}}'>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Barang </button>
        </form>
      </div>
  </div>
</html>
@endsection
