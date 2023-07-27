@extends('layouts.master')
@section('title')
    Input Data
@endsection
@section('sub-title')
    Input Data Barang
@endsection
@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Input Data Barang</h6>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <form action="/barang" method="POST" enctype="multipart/form-data" role="form" class="text-start px-3">
                @csrf
                <div class="mb-3">
                  <label class="form-label">ID Barang</label>
                  <input type="text" class="form-control" placeholder="ID Barang" name="barang_id">
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" placeholder="Nama Barang" name="name">
                </div>
                <div class="mb-3">
                  <label class="form-label">Deskripsi Barang</label>
                  <textarea class="form-control" name="deskripsi" rows="10" placeholder="Deskripsi Barang"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai Garansi</label>
                    <input type="date" class="form-control" name="tanggal_mulai">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Tanggal Garansi Berakhir</label>
                    <input type="date" class="form-control" name="tanggal_berakhir">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Gambar Barang</label>
                    <input type="file" class="form-control" name="image">
                  </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Simpan</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection