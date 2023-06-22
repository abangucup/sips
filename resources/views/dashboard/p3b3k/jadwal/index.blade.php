@extends('layouts.dashboard.app')

@section('title', 'Data Jadwal')

@section('content')
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Data Jadwal Pengangkutan</h2>
        <p class="card-text">List data jadwal pengangkutan yang ada di sistem SIPS</p>
    </div>
    <div class="col-auto">
        <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahJadwal">
                <i class="fe fe-plus-circle fe-8"></i>
                <span class="web-only">Tambah Jadwal</span>
            </button>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahJadwal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Tambah Data Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="namasopir" class="col-sm-3 col-form-label">Nama Sopir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namasopir" name="nama_sopir" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jenis" name="jenis" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomorpolisi" class="col-sm-3 col-form-label">Nomor Polisi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nomorpolisi" name="nomor_polisi" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hari" class="col-sm-3 col-form-label">Hari Pelayanan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="hari" name="hari_pelayanan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jalur" class="col-sm-3 col-form-label">Jalur</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="jalur" name="jalur" required>
                        </div>
                    </div>
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
                    {{-- <div class="form-group row">
                        <label for="kenderaan" class="col-sm-3 col-form-label">Kenderaan</label>
                        <div class="col-sm-9">
                            <select name="kenderaan" class="form-control" id="kenderaan" required>
                                @foreach ($kenderaans as $kenderaan)
                                <option value="{{ $kenderaan->id }}">{{ $kenderaan->nama_kenderaan. ' '.
                                    $kenderaan->nomor_polisi.' (Sopir '.$kenderaan->nama_sopir.' )' }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hari" class="col-sm-3 col-form-label">Hari</label>
                        <div class="col-sm-9">
                            <select name="hari[]" class="form-control select2-multi" id="hari" required>
                                @foreach ($haris as $hari)
                                <option value="{{ $hari->id }}">{{ $hari->nama_hari }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group row">
                        <label for="lokasi" class="col-sm-3 col-form-label">Lokasi / Tempat Pengangkutan</label>
                        <div class="col-sm-9">
                            <select name="lokasi[]" class="form-control select2-multi" id="lokasi" required>
                                @foreach ($lokasis as $lokasi)
                                <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
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
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <table class="table datatables" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sopir</th>
                            <th>Jenis Mobil</th>
                            <th>Nomor Polisi</th>
                            <th>Hari</th>
                            <th>Jalur</th>
                            <th>Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jadwal->nama_sopir }}</td>
                            <td>{{ $jadwal->jenis }}</td>
                            <td>{{ $jadwal->nomor_polisi }}</td>
                            <td>{{ $jadwal->hari_pelayanan }}</td>
                            <td>{{ $jadwal->jalur }}</td>
                            <td>{{ $jadwal->desa->nama_desa }}</td>
                            <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#editJadwal-{{ $jadwal->id }}">
                                        <i class="fe fe-edit fe-16"></i>
                                        <span>Ubah</span>
                                    </button>
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#hapusJadwal-{{ $jadwal->id }}">
                                        <i class="fe fe-trash fe-16"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Ubah --}}
                        <div class="modal fade" id="editJadwal-{{ $jadwal->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Ubah Data Jadwal - "{{
                                            $jadwal->nomor_polisi }}"</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="namasopir" class="col-sm-3 col-form-label">Nama
                                                    Sopir</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="namasopir"
                                                        value="{{ $jadwal->nama_sopir }}" name="nama_sopir" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="jenis" name="jenis"
                                                        value="{{ $jadwal->jenis }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nomorpolisi" class="col-sm-3 col-form-label">Nomor
                                                    Polisi</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="nomorpolisi"
                                                        name="nomor_polisi" value="{{ $jadwal->nomor_polisi }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hari" class="col-sm-3 col-form-label">Hari Pelayanan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="hari"
                                                        name="hari_pelayanan" value="{{ $jadwal->hari_pelayanan }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jalur" class="col-sm-3 col-form-label">Jalur</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="jalur" name="jalur"
                                                        value="{{ $jadwal->jalur }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="desa" class="col-sm-3 col-form-label">Desa</label>
                                                <div class="col-sm-9">
                                                    <select name="desa" class="form-control" id="desa" required>
                                                        <option value="{{ $jadwal->desa_id }}">{{
                                                            $jadwal->desa->nama_desa }}</option>
                                                        @foreach ($desas as $desa)
                                                        <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-2 float-right">
                                                <button type="button" class="btn mx-2 btn-secondary"
                                                    data-dismiss="modal">Tidak</button>
                                                <button type="submit" class="btn btn-warning">Ubah Data Jadwal</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- End Modal Ubah--}}

                        {{-- Modal Hapus --}}
                        <div class="modal fade" id="hapusJadwal-{{ $jadwal->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Hapus Data Jadwal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group row">
                                                <span class="h3 form-control text-center mx-2 text-warning">!!! Yakin
                                                    ingin hapus
                                                    desa - "{{ $jadwal->nomor_polisi }}" !!!</span>
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