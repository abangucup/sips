<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

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

                <h2>LAPORAN DAFTAR WAJIB RETRIBUSI SAMPAH</h2>

                <p style="font-size: 1.17em"><b>DINAS LINGKUNGAN HIDUP KABUPATEN POHUWATO<br>
                        KECAMATAN MARISA</b></p>
            </td>
        </tr>
    </table>
    <hr>
    <br>

    <table border="1" cellspacing="0" cellpadding="5" width=100%>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Desa</th>
                <th>Alamat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggans as $pelanggan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pelanggan->nama_pelanggan }}</td>
                <td>{{ $pelanggan->desa->alamat_desa ?? 'belum ada desa'}}</td>
                <td>{{ $pelanggan->alamat }}</td>
                <td>{{ $pelanggan->tarif->sumber_sampah }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data Belum Ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>