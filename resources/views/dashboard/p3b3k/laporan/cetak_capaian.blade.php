<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="{{ asset('dashboard/css/app-light.css') }}" id="lightTheme" disabled>
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
                            <div class="form-group">
                                <label class="font-weight-bold">I. Jumlah Timbulan Sampah:</label>
                                <input type="text" class="rounded" value="{{ $capaian->timbulan_sampah }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">II. Nomor Telepon:</label>
                                <input type="text" value="{{ $capaian->timbulan_sampah }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">III. Nomor Telepon:</label>
                                <input type="text" value="{{ $capaian->timbulan_sampah }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">IV. Nomor Telepon:</label>
                                <input type="text" value="{{ $capaian->timbulan_sampah }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">V. Nomor Telepon:</label>
                                <input type="text" value="{{ $capaian->timbulan_sampah }}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">VI. Nomor Telepon:</label>
                                <input type="text" value="{{ $capaian->timbulan_sampah }}" disabled>
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