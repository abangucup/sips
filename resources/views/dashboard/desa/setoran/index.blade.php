@extends('layouts.dashboard.app')

@section('title', 'Setoran')

@section('content')

<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Data Setoran Setiap Waktu</h2>
        <p class="card-text">List data setoran</p>
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
                    <select name="pelanggan_id" class="form-control">
                        @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_pelanggan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal_setoran"
                        required>
                </div>
                <div class="form-group">
                    <label for="nomorHP">Jalur</label>
                    <select name="jadwal_id" class="form-control">
                        @foreach ($jadwals as $jadwal)
                        <option value="{{ $jadwal->id }}">{{ $jadwal->jalur }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nomorHP">Nama Sampah</label>
                    <select name="sampah_id" class="form-control">
                        @foreach ($sampahs as $sampah)
                        <option value="{{ $sampah->id }}">{{ $sampah->nama_sampah }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomorHP">Jenis Sampah</label>
                    <select name="tarif_id" class="form-control">
                        @foreach ($tarifs as $tarif)
                        <option value="{{ $tarif->id}}">{{ $tarif->kategori." ( Rp. ".$tarif->tarif." )" }}</option>
                        @endforeach
                    </select>
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
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Jalur</th>
                    <th>Kategori Sampah</th>
                    <th>Sumber Sampah</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($setorans as $setoran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $setoran->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $setoran->tanggal_setoran }}</td>
                    <td>{{ $setoran->jadwal->jalur }}</td>
                    <td>{{ $setoran->tarif->kategori }}</td>
                    <td>{{ $setoran->tarif->sumber_sampah }}</td>
                    <th>{{ $setoran->tarif->tarif }}</th>
                    <td>
                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button" data-toggle="modal"
                                data-target="#editJadwal-{{ $setoran->id }}">
                                <i class="fe fe-edit fe-16"></i>
                                <span>Ubah</span>
                            </button>
                            <button class="dropdown-item" type="button" data-toggle="modal"
                                data-target="#hapusJadwal-{{ $setoran->id }}">
                                <i class="fe fe-trash fe-16"></i>
                                <span>Hapus</span>
                            </button>
                        </div>
                    </td>
                </tr>

                {{-- Modal Ubah --}}
                {{-- <div class="modal fade" id="editJadwal-{{ $jadwal->id }}" tabindex="-1" role="dialog"
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
                                        <label for="jenis" class="col-sm-3 col-form-label">Jenis</label>
                                        <div class="col-sm-9">
                                            <select name="jenis" id="jenis" class="form-control" required>
                                                <option value="{{ $jadwal->jenis }}">{{$jadwal->jenis}}</option>
                                                @foreach ($kenderaans->unique('jenis') as $kenderaan)
                                                <option value="{{ $kenderaan->jenis }}">{{$kenderaan->jenis}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kenderaan" class="col-sm-3 col-form-label">Kenderaan</label>
                                        <div class="col-sm-9">
                                            <select name="kenderaan" id="kenderaan" class="form-control" required>
                                                <option value="{{ $jadwal->kenderaan_id }}">{{
                                                    $jadwal->kenderaan->nama_kenderaan."
                                                    ".$jadwal->kenderaan->nomor_polisi." (
                                                    ".$jadwal->kenderaan->nama_sopir." )"
                                                    }}</option>
                                                @foreach ($kenderaans as $kenderaan)
                                                <option value="{{ $kenderaan->id }}">{{
                                                    $kenderaan->nama_kenderaan." ".$kenderaan->nomor_polisi." (
                                                    ".$kenderaan->nama_sopir." )"
                                                    }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hari" class="col-sm-3 col-form-label">Hari Pelayanan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="hari" name="hari_pelayanan"
                                                value="{{ $jadwal->hari_pelayanan }}" required>
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
                </div> --}}
                {{-- End Modal Ubah--}}

                {{-- Modal Hapus --}}
                {{-- <div class="modal fade" id="hapusJadwal-{{ $jadwal->id }}" tabindex="-1" role="dialog"
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
                </div> --}}
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