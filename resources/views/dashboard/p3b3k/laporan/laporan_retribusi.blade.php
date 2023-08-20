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
            <a class="btn btn-primary" href="{{ route('cetak.retribusi') }}" target="_blank">
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Desa</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $pelanggan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pelanggan->nama_pelanggan }}</td>
                        <td>{{ $pelanggan->desa->alamat_desa ?? 'belum ada desa'}}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->setoran->tarif->sumber_sampah ?? '-'}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection