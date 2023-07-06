@extends('layouts.dashboard.app')

@section('title', 'Data Sampah')

@section('content')
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Data Sampah</h2>
        <p class="card-text">List data sampah yang ada di sistem SIPS</p>
    </div>
    <div class="col-auto">
        <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahSampah">
                <i class="fe fe-plus-circle fe-8"></i>
                <span class="web-only">Tambah Sampah</span>
            </button>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div class="modal fade" id="tambahSampah" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Tambah Data Sampah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('sampah.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="namaSampah" class="col-sm-3 col-form-label">Nama Sampah</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="namaSampah" placeholder="Nama Sampah"
                                name="nama_sampah" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kategori" class="col-sm-3 col-form-label">Kategori Sampah</label>
                        <div class="col-sm-9">
                            <select name="kategori" class="form-control">
                                <option value="sampah_organik">Sampah Organik</option>
                                <option value="sampah_non_organik">Sampah Non Organik</option>
                                <option value="b3">Sampah Bahan Berbahaya dan Beracun (B3)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="tahun" placeholder="Tahun" name="tahun"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="jumlah" placeholder="Jumlah" name="jumlah"
                                required>
                        </div>
                    </div>

                    <div class="form-group mt-4 mb-2 float-right">
                        <button type="submit" class="btn btn-primary">Tambah sampah</button>
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
                            <th>Nama Sampah</th>
                            <th>Kategori</th>
                            <th>Tahun</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sampahs as $sampah)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $sampah->nama_sampah }}</td>
                            <td>{{ $sampah->kategori }}</td>
                            <td>{{ $sampah->tahun }}</td>
                            <td>{{ $sampah->jumlah }} Ton</td>
                            <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#editsampah-{{ $sampah->id }}">
                                        <i class="fe fe-edit fe-16"></i>
                                        <span>Ubah</span>
                                    </button>
                                    <button class="dropdown-item" type="button" data-toggle="modal"
                                        data-target="#hapussampah-{{ $sampah->id }}">
                                        <i class="fe fe-trash fe-16"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Ubah --}}
                        <div class="modal fade" id="editsampah-{{ $sampah->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Ubah Data Sampah - "{{
                                            $sampah->nama_sampah }}"</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('sampah.update', $sampah->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="namaSampah" class="col-sm-3 col-form-label">Nama
                                                    Sampah</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="namaSampah"
                                                        placeholder="Nama Sampah" name="nama_sampah"
                                                        value="{{ $sampah->nama_sampah }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kategori" class="col-sm-3 col-form-label">Kategori
                                                    Sampah</label>
                                                <div class="col-sm-9">
                                                    <select name="kategori" class="form-control">
                                                        <option value="{{ $sampah->kategori }}">{{ $sampah->kategori }}
                                                        </option>
                                                        <option value="sampah_organik">Sampah Organik</option>
                                                        <option value="sampah_non_organik">Sampah Non Organik</option>
                                                        <option value="b3">Sampah Bahan Berbahaya dan Beracun (B3)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="tahun"
                                                        placeholder="Tahun" name="tahun" value="{{ $sampah->tahun }}"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="jumlah"
                                                        placeholder="Jumlah" name="jumlah" value="{{ $sampah->jumlah }}"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="form-group mt-4 mb-2 float-right">
                                                <button type="submit" class="btn btn-primary">Ubah Data Sampah</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        {{-- End Modal Ubah--}}

                        {{-- Modal Hapus --}}
                        <div class="modal fade" id="hapussampah-{{ $sampah->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="defaultModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="defaultModalLabel">Hapus Data sampah</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('sampah.destroy', $sampah->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group row">
                                                <span class="h3 form-control text-center mx-2 text-warning">!!! Yakin
                                                    ingin hapus
                                                    sampah - "{{ $sampah->nama_sampah }}" !!!</span>
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