<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ asset('dashboard/css/app-light.css') }}" id="lightTheme" disabled>
    <style>
        .form-table {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .form-table-row {
            display: table-row;
        }

        .form-table-cell {
            display: table-cell;
            padding: 5px;
        }

        .form-table-label {
            font-weight: bold;
        }
    </style>
</head>

<body style="font-size: 12px">

    <table width="100%">
        <tr>
            <td style="text-align: center">

                <h5>DINAS LINGKUNGAN HIDUP KABUPATEN POHUWATO<br>
                    KECAMATAN MARISA</h5>

                <p style="font-size: 1.17em"><b>LAPORAN DATA CAPAIAN PERTAHUN</b></p>
            </td>
        </tr>
    </table>
    <hr>
    <br>

    <div class="wrapper">
        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">

                    @foreach ($capaians as $capaian)
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <h6 class="card-title">Data Capaian Pada Tahun {{ $capaian->tahun }}</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-table">
                                <div class="form-table-row">
                                    <div class="form-table-cell form-table-label">I. JUMLAH TIMBULAN SAMPAH</div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->timbulan_sampah ?? 0}} Ton" readonly>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell form-table-label">II. JUMLAH PENGURANGAN SAMPAH</div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->pengurangan_sampah ?? 0}} Ton" disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell">Jumlah Pembatasan Timbulan Sampah
                                    </div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->pembatasan_timbulan ?? 0}} Ton" disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell">Jumlah Pemanfaatan Kembali Sampah
                                    </div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->pemanfaatan_kembali ?? 0}} Ton" disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell">Jumlah Pendauran Ulang Sampah
                                    </div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded" value="{{ $capaian->daur_ulang ?? 0}} Ton"
                                            disabled>
                                    </div>
                                </div>

                                <div class="form-table-row">
                                    <div class="form-table-cell form-table-label">III. JUMLAH PENANGANAN SAMPAH</div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->penanganan_sampah ?? 0}} Ton" disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell">Pemilahan
                                    </div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded" value="{{ $capaian->pemilahan ?? 0}} Ton"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell">Pengangkutan
                                    </div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded" value="{{ $capaian->pengangkutan ?? 0}} Ton"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell">Pengolahan
                                    </div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded" value="{{ $capaian->pengolahan ?? 0}} Ton"
                                            disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell">Pemrosesan Akhir
                                    </div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->pemrosesan_akhir ?? 0}} Ton" disabled>
                                    </div>
                                </div>

                                <div class="form-table-row">
                                    <div class="form-table-cell form-table-label">IV. SAMPAH YANG DIKELOLA</div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->sampah_terkelola ?? 0 }} Ton" disabled>
                                    </div>
                                </div>
                                <div class="form-table-row">
                                    <div class="form-table-cell form-table-label">V. SAMPAH YANG TIDAK DIKELOLA</div>
                                    <div class="form-table-cell">
                                        <input type="text" class="rounded"
                                            value="{{ $capaian->sampah_tidak_terkelola ?? 0 }} Ton" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </main>
        <!-- main -->
    </div>
</body>

</html>