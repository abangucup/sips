@extends('layouts.home.app')

@section('title', 'SIPS')

@section('content')
<section id="page-title" class="p-t-70 pb-3 text-dark">
    <div class="container">
        <div class="page-title">
            <h3 class="text-capitalize">Jadwal Pengangkutan</h3>
        </div>
        <div class="breadcrumb mt-2">
            <ul>
                <li class="textc-primary"><a href="{{ route('home') }}">Beranda</a></li>
                <li>>></li>
                <li class="active text-capitalize">
                    <span class="h5">Jadwal</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="page-content" class="sidebar-right">
    <div class="container">
        <div id="blog" class="post-thumbnails">
            <!-- Post item-->
            <div class="row">
                <div class="col-md-12">
                    <table class="table datatables" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kenderaan</th>
                                <th>Nomor Polisi</th>
                                <th>Nama Sopir</th>
                                <th>Jenis Mobil</th>
                                <th>Hari</th>
                                <th>Jalur</th>
                                <th>Desa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals as $jadwal)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jadwal->kenderaan->nama_kenderaan }}</td>
                                <td>{{ $jadwal->kenderaan->nomor_polisi }}</td>
                                <td>{{ $jadwal->kenderaan->nama_sopir }}</td>
                                <td>{{ $jadwal->jenis }}</td>
                                <td>{{ $jadwal->hari_pelayanan }}</td>
                                <td>{{ $jadwal->jalur }}</td>
                                <td>{{ $jadwal->desa->nama_desa }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('style')

<link rel="stylesheet" href="{{ asset('dashboard/css/dataTables.bootstrap4.css') }}">

@endpush

@push('script')
<script src="{{ asset('dashboard/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('#dataTable').DataTable(
    {
        autoWidth: true,
        "lengthMenu": [
        [10, 16, 32, 64, -1],
        [10, 16, 32, 64, "All"]
        ]
    });
</script>
@endpush