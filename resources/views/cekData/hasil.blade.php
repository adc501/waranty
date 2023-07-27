@extends('layouts.user')
@section('header')
<div class="container pt-5">
    <div class="row">
      <div class="col-md-8 text-start mb-5 mt-5">
        <h3 class="text-dark z-index-1 position-relative">Detail Garansi</h3>
        <p class="text-dark opacity-8 mb-0">Berikut adalah status masa garansi serta detail barang</p>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card card-profile overflow-hidden">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-12 pe-lg-0">
              <div class="p-3 pe-md-0">
                <img class="w-100 border-radius-md" src="{{asset('/image/'.$datas->image)}}" alt="image">
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 ps-lg-0 my-auto">
              <div class="card-body">
                @php
                    if ($datas->tanggal_berakhir >= date('Y-m-d')) {
                        $status = '<span class="text-success"> AKTIF</span>';
                    }else {
                        $status = '<span class="text-danger">MASA GARANSI SUDAH HABIS</span>';
                    }
                    echo('<h6>Status Garansi: '.$status.'</h6>');
                @endphp
                @php
                    $today = date("Y-m-d");
                    $start = $datas->tanggal_mulai;
                    $end = $datas->tanggal_berakhir;
                    $t = strtotime($end) - strtotime($start);
                    $p = $t/(60*60*24);
                    $a = strtotime($end) - strtotime($today);
                    $sisa = $a/(60*60*24);
                    $t = 100 - (($sisa / $p) * 100);
                @endphp
                <div class="d-flex justify-content-between mb-0">
                    <a href="" class="btn btn-rounded btn-info mb-0 p-2" data-bs-toggle="tooltip" data-bs-placement="right" title="{{$start}}">
                    </a>
                  <div class="w-100 py-2">
                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                      <div class="progress-bar bg-info" style="width: {{$t}}%"></div>
                    </div>
                  </div>
                  <a href="" class="btn btn-info btn-rounded mb-0 p-2 btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="{{$end}}"></a>
                </div>
                <h6 class="mb-5">Sisa Garansi : {{$sisa}} hari</h6>
                <div class="row mb-0">
                    <div class="col">
                        <h6>Kode Barang</h6>
                    </div>
                    <div class="col">
                        <p>: {{$datas->barang_id}}</p>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col">
                        <h6>Nama Barang</h6>
                    </div>
                    <div class="col">
                        <p>: {{$datas->name}}</p>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col">
                        <h6>Tanggal Mulai Garansi</h6>
                    </div>
                    <div class="col">
                        <p>: {{$datas->tanggal_mulai}}</p>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col">
                        <h6>Tanggal Garansi Berakhir</h6>
                    </div>
                    <div class="col">
                        <p>: {{$datas->tanggal_berakhir}}</p>
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col">
                        <h6>Desktipsi Barang</h6>
                    </div>
                    <div class="col">
                        <p>: {{$datas->deskripsi}}</p>
                    </div>
                </div>
                {{-- <h5 class="mb-0">{{$datas->name}}</h5> --}}
                {{-- <p class="mb-0">{{$datas->deskripsi}}</p> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
@endsection