@extends('layouts.dashboard.app')

@section('title', 'Halaman Capaian')

@section('content')
<div class="row align-items-center mb-2">
    <div class="col">
        <h2 class="mb-2 page-title">Data Capaian Setiap Waktu</h2>
        <p class="card-text">List data capaian setiap saat berubah</p>
    </div>
</div>


<div class="card-deck">
    <div class="card shadow mb-4">
        <div class="card-body">
            <table class="table datatables" id="tableCapaian">
                <thead>
                    <tr>
                        <th>Timbulan Sampah</th>
                        <th>Pengurangan Sampah</th>
                        <th>Penanganan Sampah</th>
                        <th>Sampah Terkelola</th>
                        <th>Sampah Tidak Terkelola</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($capaians as $capaian)
                    <tr>
                        <td>{{ $capaian->timbulan_sampah }}</td>
                        <td>{{ $capaian->pengurangan_sampah }}</td>
                        <td>{{ $capaian->penanganan_sampah }}</td>
                        <td>{{ $capaian->sampah_terkelola }}</td>
                        <td>{{ $capaian->sampah_tidak_terkelola }}</td>
                        <td>{{ $capaian->created_at }}</td>
                        <td>
                            <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" type="button" data-toggle="modal"
                                    data-target="#editJadwal-{{ $capaian->id }}">
                                    <i class="fe fe-edit fe-16"></i>
                                    <span>Ubah</span>
                                </button>
                                <button class="dropdown-item" type="button" data-toggle="modal"
                                    data-target="#hapusJadwal-{{ $capaian->id }}">
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

    <div class="col col-md-3 card shadow mb-4">
        <div class="card-header">
            <h4 class="card-title">Tambah Capaian</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('capaian.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="timbulanSampah">Timbulan Sampah</label>
                    <input type="number" class="form-control" id="timbulanSampah" placeholder="Masukan Angka"
                        name="timbulan_sampah" required>
                </div>
                <div class="form-group">
                    <label for="penguranganSampah">Pengurangan Sampah</label>
                    <input type="number" class="form-control" id="penguranganSampah" placeholder="Masukan Angka"
                        name="pengurangan_sampah" required>
                </div>
                <div class="form-group">
                    <label for="penangananSampah">Penanganan Sampah</label>
                    <input type="number" class="form-control" id="penangananSampah" placeholder="Masukan Angka"
                        name="penanganan_sampah" required>
                </div>
                <div class="form-group">
                    <label for="sampahTerkelola">Sampah Terkelola</label>
                    <input type="number" class="form-control" id="sampahTerkelola" placeholder="Masukan Angka"
                        name="sampah_terkelola" required>
                </div>
                <div class="form-group">
                    <label for="sampahTidakTerkelola">Sampah Tidak Terkelola</label>
                    <input type="number" class="form-control" id="sampahTidakTerkelola" placeholder="Masukan Angka"
                        name="sampah_tidak_terkelola" required>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" class="form-control" id="tahun" placeholder="Masukan Angka" name="tahun"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div> <!-- / .card-desk-->
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('dashboard/css/dataTables.bootstrap4.css') }}">
@endpush

@push('script')
<script src="{{ asset('dashboard/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dashboard/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $('#tableCapaian').DataTable(
    {
        autoWidth: true,
        "lengthMenu": [
        [10, 16, 32, 64, -1],
        [10, 16, 32, 64, "All"]
        ]
    });
</script>
@endpush