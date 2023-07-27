@extends('layouts.master')
@section('title')
    Table
@endsection
@section('sub-title')
    Tabel User
@endsection
@section('content')

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
              <h6 class="text-white text-capitalize ps-3">Data User</h6>
              <a href="/users/create" class="btn btn-icon-only btn-rounded btn-outline-light mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                <i class="fa fa-plus text-white"></i>
              </a>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Opsi</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $no =  1;
                    @endphp
                    @foreach ($datas as $data)
                    <tr>
                        <th scope="row" class="px-4">{{$no++}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>    
                        <td>
                            <form action="/users/{{$data->id}}" method="post">
                            @csrf
                            <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalBarang{{$data->id}}">
                                <i class="fa fa-search text-white"></i>
                            </a>
                            <a href="/users/{{$data->id}}/edit" class="btn btn-warning btn-sm">
                                <i class="fa fa-pencil-square-o text-white"></i>
                            </a>
                            @method('delete')
                            <a href="" class="btn btn-danger btn-sm show_confirm">
                                <i class="fa fa-trash text-white"></i>
                            </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
      
                <div class="pagination">{{$datas->links()}}</div>
      
                @foreach ($datas as $data)
                <div class="modal fade" id="modalBarang{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body justify-content-center align-items-center">
                        <div class="card">
                          <div class="card-body">
                            @php
                              if ($data->pro_img == null) {
                                $img = asset('/template/assets/img/theme/tim.png');
                              }else {
                                $img = asset('/pro_img/'.$data->pro_img);
                              }
                            @endphp
                            <img src="{{$img}}" alt="profile" class="card-img-top">
                            <table>
                              <tbody>
                                <tr class="border-bottom ">
                                  <th scope="row">Username</th>
                                  <td class="px-2">{{$data->name}}</td>
                                </tr>
                                <tr class="border-bottom ">
                                  <th scope="row">Email</th>
                                  <td class="px-2">{{$data->email}}</td>
                                </tr>
                                <tr class="border-bottom ">
                                  <th scope="row">Role</th>
                                  <td class="px-2">
                                    @if ($data->role == 1)
                                        Admin
                                    @else
                                        User
                                    @endif
                                    </td>
                                </tr>
                                <tr class="border-bottom ">
                                  <th scope="row">Gender</th>
                                  <td class="px-2">{{$data->gender}}</td>
                                </tr>
                                <tr class="border-bottom ">
                                  <th scope="row">Tanggal Lahir</th>
                                  <td class="px-2">{{$data->tanggal_lahir}}</td>
                                </tr>
                                <tr class="border-bottom ">
                                  <th scope="row">Alamat</th>
                                  <td class="px-2">{{$data->alamat}}</td>
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
</div>

@if (session('succsess'))
    <script>
      Swal.fire(
      'Good job!',
      '{{session('succsess')}}',
      'success'
    )
    </script>
@endif

{{-- <script>
    function myFunction() {
        //alert("Hello! I am an alert box!");
        Swal.fire('Any fool can use a computer')
    }
</script> --}}

@endsection

@push('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          event.preventDefault();
          swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          })
          .then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
      });
  
</script>    
@endpush