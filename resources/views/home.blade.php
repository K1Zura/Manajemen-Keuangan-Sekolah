@extends('template.app')
@section('content')
@section('title', 'Home')
@section('awal', 'Home')
@section('icon', 'mdi mdi-home')

<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Belum Validasi <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{ $belumValidasiCount }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Sudah Validasi <i class="mdi mdi-bookmark-check mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{ $sudahValidasiCount }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Jumlah Pembayaran <i class="mdi mdi-animation mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">{{ $jumlah }}</h2>
          </div>
        </div>
    </div>
</div>
@endsection
