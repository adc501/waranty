@extends('layouts.master')
@section('title')
    Edit Data
@endsection
@section('sub-title')
    Edit Data Barang
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
            <form action="/barang/{{$datas->id}}" method="POST" enctype="multipart/form-data" role="form" class="text-start px-3">
                @csrf
                @method('put')
                <div class="mb-3">
                  <label class="form-label">ID Barang</label>
                  <input type="text" class="form-control" placeholder="ID Barang" name="barang_id" value="{{$datas->barang_id}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Nama Barang</label>
                  <input type="text" class="form-control" placeholder="Nama Barang" name="name" value="{{$datas->name}}">
                </div>
                <div class="mb-3">
                  <label class="form-label">Deskripsi Barang</label>
                  <textarea class="form-control" name="deskripsi" rows="10" placeholder="Deskripsi Barang">{{$datas->deskripsi}}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Mulai Garansi</label>
                    <input type="date" class="form-control" name="tanggal_mulai" value="{{$datas->tanggal_mulai}}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Tanggal Garansi Berakhir</label>
                    <input type="date" class="form-control" name="tanggal_berakhir" value="{{$datas->tanggal_berakhir}}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Gambar Barang</label>
                    <input type="file" class="form-control" name="image" value="{{$datas->image}}">
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