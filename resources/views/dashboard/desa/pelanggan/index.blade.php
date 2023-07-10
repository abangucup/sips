@extends('layouts.dashboard.app')

@section('title', 'Pelanggan')

@section('content')

<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Data Pelanggan</h2>
        <p class="card-text">List data pelanggan yang terdaftar</p>
    </div>
</div>


<div class="card-header">
    <h4 class="card-title">Tambah pelanggan</h4>
</div>
<div class="card-body">
    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="namaPelanggan">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="namaPelanggan" placeholder="Nama Pelanggan"
                        name="nama_pelanggan" required>
                </div>
                <div class="form-group">
                    <label for="nomorHP">Nomor Handphone</label>
                    <input type="number" class="form-control" id="nomorHP" placeholder="Masukan Nomor" name="nomor_hp"
                        required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name="alamat"
                        required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <select name="tarif" id="tarif" class="form-control" required>
                        <option value="">Pilih Tarif Pelanggan</option>
                        @foreach ($tarifs as $tarif)
                        <option value="{{ $tarif->id }}">Sumber Sampah ({{ ucwords(str_replace('_', ' ',
                            $tarif->sumber_sampah))."), Dengan Biaya / Tarif : Rp. ".$tarif->tarif }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username"
                        required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="Password" name="password"
                        required>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table datatables" id="tablepelanggan">
            <thead>
                <tr>
                    <th>ID Pelanggan</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomor Telephone</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>setoran
            </thead>
            <tbody>
                @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->id }}</td>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->nomor_hp }}</td>
                    <td>{{ $pelanggan->user->username }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button" data-toggle="modal"
                                data-target="#editPelanggan-{{ $pelanggan->id }}">
                                <i class="fe fe-edit fe-16"></i>
                                <span>Ubah</span>
                            </button>
                            <button class="dropdown-item" type="button" data-toggle="modal"
                                data-target="#hapusPelanggan-{{ $pelanggan->id }}">
                                <i class="fe fe-trash fe-16"></i>
                                <span>Hapus</span>
                            </button>
                        </div>
                    </td>
                </tr>

                {{-- Modal Ubah --}}
                <div class="modal fade" id="editPelanggan-{{ $pelanggan->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Ubah Data Pelanggan - "{{
                                    $pelanggan->nama_pelanggan }}"</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama Pelanggan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama" name="nama_pelanggan"
                                                value="{{ $pelanggan->nama_pelanggan }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nomor" class="col-sm-3 col-form-label">Nomor Handphone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nomor" name="nomor_hp"
                                                value="{{ $pelanggan->nomor_hp }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="alamat" name="alamat"
                                                value="{{ $pelanggan->alamat }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <select name="tarif" id="tarif" class="form-control" required>
                                                <option value="{{ $pelanggan->tarif_id}}">Sumber Sampah ({{
                                                    ucwords(str_replace('_', ' ',
                                                    $pelanggan->tarif->sumber_sampah))."), Dengan Biaya / Tarif :
                                                    Rp.
                                                    ".$pelanggan->tarif->tarif}}</option>
                                                @foreach ($tarifs as $tarif)
                                                <option value="{{ $tarif->id }}">Sumber Sampah ({{
                                                    ucwords(str_replace('_', ' ',
                                                    $tarif->sumber_sampah))."), Dengan Biaya / Tarif : Rp.
                                                    ".$tarif->tarif }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username"
                                                value="{{ $pelanggan->user->username }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="password" name="password"
                                                placeholder="Ubah Password (jika perlu)">
                                        </div>
                                    </div>
                                    <div class="form-group mt-4 mb-2 float-right">
                                        <button type="button" class="btn mx-2 btn-secondary"
                                            data-dismiss="modal">Tidak</button>
                                        <button type="submit" class="btn btn-warning">Ubah Data Pelanggan</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- End Modal Ubah--}}

                {{-- Modal Hapus --}}
                <div class="modal fade" id="hapusPelanggan-{{ $pelanggan->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Hapus Data Pelanggan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group row">
                                        <span class="h3 form-control text-center mx-2 text-warning">!!! Yakin
                                            ingin hapus
                                            pelanggan - "{{ $pelanggan->nama_pelanggan }}" !!!</span>
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

<div class="card-deck">


    {{-- <div class="col col-md-3 card shadow mb-4">

    </div> --}}
</div> <!-- / .card-desk-->

@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('dashboard/css/dataTables.bootstrap4.css') }}">
@endpush

@push('script')
<script src="{{ asset('dashboard/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('#tablePelanggan').DataTable(
    {
        autoWidth: true,
        "lengthMenu": [
        [10, 16, 32, 64, -1],
        [10, 16, 32, 64, "All"]
        ]
    });
</script>
@endpush