@extends('layouts.dashboard.app')

@section('title', 'Data Lokasi')

@section('content')
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Data Lokasi</h2>
        <p class="card-text">List data lokasi yang ada di sistem SIPS</p>
    </div>
    <div class="col-auto">
        <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahlokasi">
                <i class="fe fe-plus-circle fe-8"></i>
                <span class="web-only">Tambah Lokasi</span>
            </button>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahlokasi" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Tambah Data Lokasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('lokasi.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                        <div class="col-sm-9">
                            <select name="desa" class="form-control" id="desa" required>
                                @foreach ($desas as $desa)
                                <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lokasi" placeholder="Lokasi" name="nama_lokasi"
                                required>
                        </div>
                    </div>
                    <div class="form-group mt-4 mb-2 float-right">
                        <button type="submit" class="btn btn-primary">Tambah Lokasi</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- End Modal --}}

<div class="row my-4">
    <!-- Small table -->
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <table class="table datatables" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Desa</th>
                            <th>Lokasi / Tempat Pengangkutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lokasis as $lokasi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lokasi->desa->nama_desa }}</td>
                            <td>{{ $lokasi->nama_lokasi }}</td>
                            <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#editlokasi-{{ $lokasi->id }}">
                                        <i class="fe fe-edit fe-16"></i>
                                        <span>Ubah</span>
                                    </button>
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#hapuslokasi-{{ $lokasi->id }}">
                                        <i class="fe fe-trash fe-16"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Ubah --}}
                        <div class="modal fade" id="editlokasi-{{ $lokasi->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Ubah Data Lokasi - "{{
                                            $lokasi->nama_lokasi }}"</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                                <div class="col-sm-9">
                                                    <select name="desa" class="form-control" id="desa" required>
                                                        <option value="{{ $lokasi->desa->nama_desa }}">{{
                                                            $lokasi->desa->nama_desa }}</option>
                                                        @foreach ($desas as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lokasi" class="col-sm-3 col-form-label">Lokasi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="lokasi"
                                                        placeholder="Lokasi" name="nama_lokasi"
                                                        value="{{ $lokasi->nama_lokasi }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-2 float-right">
                                                <button type="button" class="btn mx-2 btn-secondary"
                                                    data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-warning">Ubah Data
                                                    lokasi</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- End Modal Ubah--}}

                        {{-- Modal Hapus --}}
                        <div class="modal fade" id="hapuslokasi-{{ $lokasi->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Hapus Data Lokasi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('lokasi.destroy', $lokasi->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group row">
                                                <span class="h3 form-control text-center mx-2 text-warning">!!! Yakin
                                                    ingin hapus
                                                    lokasi - "{{ $lokasi->nama_lokasi }}" !!!</span>
                                            </div>
                                            <div class="form-group mt-4 mb-2 float-right">
                                                <button type="button" class="btn mx-2 btn-secondary"
                                                    data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-danger">Ya Hapus</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- End Modal Hapus--}}

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('dashboard/css/dataTables.bootstrap4.css') }}">
<style>
    @media only screen and (max-width: 767px) {
        .web-only {
            display: none;
        }

        .fe-plus-circle {
            font-size: 24px;
        }
    }

    @media only screen and (min-width: 768px) {
        .web-only {
            display: inline-block;
        }

        .fe-plus-circle {
            margin-right: 5px;
        }
    }
</style>
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