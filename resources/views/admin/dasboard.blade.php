@extends('layouts.master')
@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Data Barang</p>
                <h5 class="font-weight-bolder">
                  {{$barang->count()}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                {{-- <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i> --}}
                <i class="fa fa-warehouse text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Data User</p>
                <h5 class="font-weight-bolder">
                  {{$users->count()}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                {{-- <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i> --}}
                <i class="fa fa-users text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Garansi Aktif</p>
                <h5 class="font-weight-bolder">
                  {{$aktif->count()}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                {{-- <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i> --}}
                <i class="fa fa-calendar-check-o text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Garansi Berakhir</p>
                <h5 class="font-weight-bolder">
                  {{$non->count()}}
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                {{-- <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i> --}}
                <i class="fa fa-calendar-times-o text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-12">
      <div class="card ">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h6 class="mb-2">Data Terbaru</h6>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center ">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Barang</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Barang</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Detail</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach ($new as $data)
              <tr>
                  <th scope="row" class="px-4">{{$no++}}</th>
                  <td>{{$data->barang_id}}</td>
                  <td>{{$data->name}}</td>
                  <td class="align-items-center justify-content-center">
                    <div id="status">
                      @php
                          $today = date("Y-m-d");
                          $tgl_end = $data->tanggal_berakhir;
                          $tgl = $today <= $tgl_end;
                      @endphp
                      @if ($today <= $tgl_end)
                          <div class="btn btn-icon-only btn-rounded btn-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"></div>
                      @else
                          <div class="btn btn-icon-only btn-rounded btn-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"></div>
                      @endif
                    </div>
                  </td>             
                  <td>
                    <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalBarang{{$data->id}}">
                      <i class="fa fa-search text-white"></i>
                    </a>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          @foreach ($new as $data)
          <div class="modal fade" id="modalBarang{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Barang</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body justify-content-center align-items-center">
                  <div class="card">
                    <div class="card-body">
                      <img src="{{asset('/image/'.$data->image)}}" alt="..." class="card-img-top">
                      <table>
                        <tbody>
                          <tr class="border-bottom ">
                            <th scope="row">ID Barang</th>
                            <td class="px-2">{{$data->barang_id}}</td>
                          </tr>
                          <tr class="border-bottom ">
                            <th scope="row">Nama Barang</th>
                            <td class="px-2">{{$data->name}}</td>
                          </tr>
                          <tr class="border-bottom ">
                            <th scope="row">Tanggal Mulai Garansi Barang</th>
                            <td class="px-2">{{$data->tanggal_mulai}}</td>
                          </tr>
                          <tr class="border-bottom ">
                            <th scope="row">Tanggal Berakhir Garansi Barang</th>
                            <td class="px-2">{{$data->tanggal_berakhir}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Deskripsi Barang</th>
                          </tr>
                          <tr>
                            <td>{{$data->deskripsi}}</td>
                          </tr>
                        </tbody>
                      </table>                      
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection