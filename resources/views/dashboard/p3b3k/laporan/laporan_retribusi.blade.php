@extends('layouts.dashboard.app')

@section('title', 'Laporan')

@section('content')

<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Laporan Pengangkutan</h2>
        <p class="card-text">Data Laporan Pengangkutan</p>
    </div>
    <div class="col-auto">
        <div class="form-group">
            <a class="btn btn-primary" href="{{ route('laporan.cetak') }}">
                <i class="fe fe-plus-circle fe-8"></i>
                <span class="web-only">Cetak Laporan</span>
            </a>
        </div>
    </div>
</div>

@endsection