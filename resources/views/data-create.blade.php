@extends('menu')
@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <br>
  <div class="content">
      <div class="container">
        <div class="row">
            <p class="col-8 h2">Membuat Data</p>
            <button type="button" class="btn btn-primary col-4">Buat Data</button>
        </div>
      </div>
      <br>
      <div class="container">
        <br>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputBarang">Nama Barang</label>
                <input type="text" class="form-control" id="inputBarang" placeholder="Nama Barang">
                </div>
                <div class="form-group col-md-6">
                <label for="inputSatuan">Satuan</label>
                <input type="text" class="form-control" id="inputSatuan" placeholder="Jenis Satuan">
                </div>
            </div>
            <div class="form-group">
                <label for="inputJumlah">Jumlah</label>
                <input type="number" class="form-control" id="inputJumlah" placeholder="Dalam Angka">
            </div>
        </form>
      </div>
  </div>
</html>
@endsection
