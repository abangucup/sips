<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style type="text/css">
        p {
            margin: 5px 0 0 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
            display: block;
        }

        .bold {
            font-weight: bold;
        }

        .paragraph {
            text-align: justify;
            text-indent: 1.5em;
            line-height: 1.5;
            font-size: 12px;
            font-family: "Times New Roman", Times, serif;
        }

        #footer {
            clear: both;
            position: relative;
            height: 40px;
            margin-top: -40px;
        }
    </style>
</head>

<body style="font-size: 12px">

    <table width="100%">
        <tr>
            <td style="text-align: center">
                <p style="font-size: 1.17em"><b>
                        KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI<br>
                        UNIVERSITAS NEGERI GORONTALO <br>
                        FAKULTAS TEKNIK <br>
                </p>
                Jl. B.J. Habibie, Desa Moutong, Kec. Tilongkabila, Kab. Bonebolango <br>
                Telepon (0435) 821152 Faksimilie (0435) 821752
                Laman <u> https://ung.ac.id</u>
            </td>
        </tr>
    </table>

    <hr>
    <br>

    @foreach ($jalurs as $jalur)

    <h2 style="text-align: center">{{ $jalur->nama_jalur }}</h2> <br>

    <ol>
        @foreach ($jalur->kenderaan as $kenderaan)
        <li style="font-weight: bold">{{ $kenderaan->nama_kenderaan.' '.$kenderaan->nomor_polisi.' ( Sopir
            '.$kenderaan->nama_sopir.' )' }}</li>

        @foreach($jadwals as $jadwal)
        <h3>JALUR MOBIL DUMPTRUCK {{ $jadwal->kenderaan->nama }} (sopir {{ $jadwal->kenderaan->sopir }})</h3>
        <ul>
            {{-- @foreach($jadwal->hari as $hari) --}}
            <li>
                {{ $jadwal->hari->nama_hari }}:
                @foreach($jadwal->lokasi as $lokasi)
                @if($lokasi->hari_id == $hari->id)
                {{ $lokasi->nama_lokasi }},
                @endif
                @endforeach
            </li>
            {{-- @endforeach --}}
        </ul>
        @endforeach
        @endforeach
    </ol>

    @endforeach
</body>

</html>