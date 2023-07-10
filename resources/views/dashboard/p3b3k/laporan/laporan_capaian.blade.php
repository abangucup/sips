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
            <a class="btn btn-primary" href="{{ route('cetak.capaian') }}">
                <i class="fe fe-plus-circle fe-8"></i>
                <span class="web-only">Cetak Laporan</span>
            </a>
        </div>
    </div>
</div>

<div class="card-deck">
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table datatables" id="tableCapaian">
                <thead>
                    <tr>
                        <th>Timbulan</th>
                        <th>Pengurangan</th>
                        <th>Pembatasan</th>
                        <th>Pemanfaatan</th>
                        <th>Daur Ulang</th>
                        <th>Penanganan</th>
                        <th>Pemilahan</th>
                        <th>Pengangkutan</th>
                        <th>Pengolahan</th>
                        <th>Pemrosesan Akhir</th>
                        <th>Terkelola</th>
                        <th>Tidak Terkelola</th>
                        <th>Tahun</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capaians as $capaian)
                    <tr>
                        <td>{{ $capaian->timbulan_sampah }} Ton</td>
                        <td>{{ $capaian->pengurangan_sampah }} Ton</td>
                        <td>{{ $capaian->pembatasan_timbulan }} Ton</td>
                        <td>{{ $capaian->pemanfaatan_kembali }} Ton</td>
                        <td>{{ $capaian->daur_ulang }} Ton</td>
                        <td>{{ $capaian->penanganan_sampah }} Ton</td>
                        <td>{{ $capaian->pemilahan }} Ton</td>
                        <td>{{ $capaian->pengangkutan }} Ton</td>
                        <td>{{ $capaian->pengolahan }} Ton</td>
                        <td>{{ $capaian->pemrosesan_akhir }} Ton</td>
                        <td>{{ $capaian->sampah_terkelola }} Ton</td>
                        <td>{{ $capaian->sampah_tidak_terkelola }} Ton</td>
                        <td>Tahun {{ $capaian->tahun }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection