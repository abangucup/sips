@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')

<div class="row my-4">
    <div class="col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-lg bg-light">
                            <i class="fe fe-32 fe-shopping-bag text-warning mb-0"></i>
                        </span>
                    </div>
                    <div class="col pl-3">
                        <p class="h5 mb-3 text-warning">Data Desa</p>
                        <span class="h3 mb-0 text-warning">{{ $desaCount ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-lg bg-light">
                            <i class="fe fe-32 fe-trash-2 text-primary mb-0"></i>
                        </span>
                    </div>
                    <div class="col pl-3">
                        <p class="h5 mb-3 text-primary">Data Jenis Sampah</p>
                        <span class="h3 mb-0 text-primary">{{ $jenisCount ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-lg bg-light">
                            <i class="fe fe-32 fe-trash text-success mb-0"></i>
                        </span>
                    </div>
                    <div class="col pl-3">
                        <p class="h5 mb-3 text-success">Data Sampah</p>
                        <span class="h3 mb-0 text-success">{{ $sampahCount ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-lg bg-light">
                            <i class="fe fe-32 fe-calendar text-danger mb-0"></i>
                        </span>
                    </div>
                    <div class="col pl-3">
                        <p class="h5 mb-3 text-danger">Data Jadwal</p>
                        <span class="h3 mb-0 text-danger">{{ $jadwalCount ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection