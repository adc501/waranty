@extends('layouts.user')
@section('header')
<header>
    <div class="page-header min-vh-85">
      <div>
        <img class="position-absolute fixed-top ms-auto w-50 h-100 z-index-0 d-none d-sm-none d-md-block border-radius-section border-top-end-radius-0 border-top-start-radius-0 border-bottom-end-radius-0" src="{{asset('/template_2/assets/img/bg-rg.png')}}" alt="image">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-7 d-flex justify-content-center flex-column">
            <div class="card d-flex blur justify-content-center p-4 shadow-lg my-sm-0 my-sm-6 mt-8 mb-5">
              <div class="text-center">
                <h3 class="text-gradient text-info">Cek Garansi</h3>
                <p class="mb-0">
                  Masukan kode barang sesuai yang tertera pada label barang yang ingin anda cari
                </p>
              </div>
              <form id="contact-form" action="show" method="get">
                @csrf
                <div class="card-body pb-2">
                  <div class="row">
                    <div class="col-12">
                      <label>Kode Barang</label>
                      <div class="input-group mb-4">
                        <input class="form-control" name="src" placeholder="Kode Barang" aria-label="Full Name" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn bg-gradient-info mt-3 mb-0 w-100">Cari</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>

  @if (session('succsess'))
    <script>
      Swal.fire(
      'Good job!',
      '{{session('succsess')}}',
      'success'
    )
    </script>
  @endif

  @if (session('error'))
      <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{session('error')}}',
        })
      </script>
  @endif
@endsection