@extends('layouts.dashboard.app')

@section('title', 'Dashboard')

@section('content')

<div class="row my-4">
    {{-- Setoran --}}
    <div class="col-lg-4">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3 text-center">
                        <span class="circle circle-lg bg-light">
                            <i class="fe fe-32 fe-calendar text-danger mb-0"></i>
                        </span>
                    </div>
                    <div class="col pl-3">
                        <p class="h5 mb-3 text-danger">Data Setoran Sampah</p>
                        <span class="h3 mb-0 text-danger">{{ $countSetoran ?? 0 }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection