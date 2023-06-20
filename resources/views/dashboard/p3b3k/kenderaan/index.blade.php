@extends('layouts.dashboard.app')

@section('title', 'Data Kenderaan')

@section('content')
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Data Kenderaan</h2>
        <p class="card-text">List data kenderaan yang ada di sistem SIPS</p>
    </div>
    <div class="col-auto">
        <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahKenderaan">
                <i class="fe fe-plus-circle fe-8"></i>
                <span class="web-only">Tambah Kenderaan</span>
            </button>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahKenderaan" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Tambah Data Kenderaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kenderaan.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="jalur" class="col-sm-3 col-form-label">Jalur</label>
                        <div class="col-sm-9">
                            <select name="jalur" class="form-control" id="jalur" required>
                                @foreach ($jalurs as $jalur)
                                <option value="{{ $jalur->id }}">{{ $jalur->nama_jalur }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaKenderaan" class="col-sm-3 col-form-label">Nama Kenderaan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaKenderaan" placeholder="Nama Kenderaan"
                                name="nama_kenderaan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomorPolisi" class="col-sm-3 col-form-label">Nomor Polisi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nomorPolisi" placeholder="Nomor Polisi"
                                name="nomor_polisi" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaSopir" class="col-sm-3 col-form-label">Nama Sopir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaSopir" placeholder="Nama Sopir"
                                name="nama_sopir" required>
                        </div>
                    </div>
                    <div class="form-group mt-4 mb-2 float-right">
                        <button type="submit" class="btn btn-primary">Tambah kenderaan</button>
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
                            <th>Jalur</th>
                            <th>Kode Kenderaan</th>
                            <th>Nama kenderaan</th>
                            <th>Nomor Polisi</th>
                            <th>Nama Sopir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kenderaans as $kenderaan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kenderaan->jalur->nama_jalur }}</td>
                            <td>{{ $kenderaan->kode_kenderaan }}</td>
                            <td>{{ $kenderaan->nama_kenderaan }}</td>
                            <td>{{ $kenderaan->nomor_polisi }}</td>
                            <td>{{ $kenderaan->nama_sopir }}</td>
                            <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#editkenderaan-{{ $kenderaan->id }}">
                                        <i class="fe fe-edit fe-16"></i>
                                        <span>Ubah</span>
                                    </button>
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#hapuskenderaan-{{ $kenderaan->id }}">
                                        <i class="fe fe-trash fe-16"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Ubah --}}
                        <div class="modal fade" id="editkenderaan-{{ $kenderaan->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Ubah Data Kenderaan - "{{
                                            $kenderaan->nama_kenderaan }}"</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('kenderaan.update', $kenderaan->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="jalur" class="col-sm-3 col-form-label">Jalur</label>
                                                <div class="col-sm-9">
                                                    <select name="jalur" class="form-control" id="jalur" required>
                                                        <option value="{{ $kenderaan->jalur_id }}">{{
                                                            $kenderaan->jalur->nama_jalur }}</option>
                                                        @foreach ($jalurs as $jalur)
                                                        <option value="{{ $jalur->id }}">{{ $jalur->nama_jalur }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="namaKenderaan" class="col-sm-3 col-form-label">Nama
                                                    Kenderaan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="namaKenderaan"
                                                        placeholder="Nama Kenderaan" name="nama_kenderaan"
                                                        value="{{ $kenderaan->nama_kenderaan }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nomorPolisi" class="col-sm-3 col-form-label">Nomor
                                                    Polisi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomorPolisi"
                                                        placeholder="Nomor Polisi" name="nomor_polisi"
                                                        value="{{ $kenderaan->nomor_polisi }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="namaSopir" class="col-sm-3 col-form-label">Nama
                                                    Sopir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="namaSopir"
                                                        placeholder="Nama Sopir" name="nama_sopir"
                                                        value="{{ $kenderaan->nama_sopir }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-2 float-right">
                                                <button type="button" class="btn mx-2 btn-secondary"
                                                    data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-warning">Ubah Data
                                                    Kenderaan</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- End Modal Ubah--}}

                        {{-- Modal Hapus --}}
                        <div class="modal fade" id="hapuskenderaan-{{ $kenderaan->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Hapus Data Kenderaan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('kenderaan.destroy', $kenderaan->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group row">
                                                <span class="h3 form-control text-center mx-2 text-warning">!!! Yakin
                                                    ingin hapus
                                                    kenderaan - "{{ $kenderaan->nama_kenderaan }}" !!!</span>
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