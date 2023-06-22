@extends('layouts.home.app')

@section('title', 'Detail Desa')

@section('content')

<section id="page-title" class="p-t-70 pb-3 text-dark">
    <div class="container">
        <div class="page-title">
            <h3 class="text-capitalize">Desa "{{ $desa->nama_desa }}"</h3>
        </div>
        <div class="breadcrumb mt-2">
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li>>></li>
                <li><a href="{{ route('list_desa') }}">Desa</a></li>
                <li>>></li>
                <li class="active text-capitalize">
                    <span class="h5">{{ $desa->nama_desa }}</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="col-lg-12">
            <div class="post-item p-2 mb-4 shadow">
                <div class="post-item-wrap">
                    <div class="post-item-description">
                        @foreach ($desa->jadwal->unique('jenis') as $jalurKenderaan)
                        <h2 class="text-center">{{ "Jalur Pelayanan Pengangkutan Sampah ".$jalurKenderaan->jenis }}</h2>
                        <ol>
                            @foreach ($desa->kenderaan->where('nama_kenderaan',
                            $jalurKenderaan->kenderaan->nama_kenderaan)->unique('nama_sopir') as $kenderaan)
                            <li>{{ "Jalur ".$kenderaan->nama_kenderaan." ".$kenderaan->nomor_polisi." ( Sopir
                                ".$kenderaan->nama_sopir." )" }} </li>
                            <ul style="list-style: '- ">
                                @foreach ($kenderaan->jadwal as $jadwal)
                                <li>{{ $jadwal->hari_pelayanan." : ".$jadwal->jalur }}</li>
                                @endforeach
                            </ul>
                            @endforeach
                        </ol>
                        @endforeach
                    </div>
                    {{-- <div class="post-item-description">
                        @foreach ($kenderaan as $item)

                        @endforeach --}}
                        {{-- @foreach ($desa->jadwal->groupBy('kenderaan_id') as $groupJadwal)
                        <h2 class="text-center">Jalur Pelayanan Pengangkutan Sampah {{ $groupJadwal[0]->jenis }}</h2>
                        <ol> --}}
                            {{-- <li>{{"Jalur ". $jadwal->jenis . " ".$jadwal->nomor_polisi." (
                                ".$jadwal->nama_sopir." )" }}
                                <ul>
                                    <li>{{ $jadwal->hari_pelayanan. " : ". $jadwal->jalur }}</li>
                                </ul>
                            </li> --}}
                            {{-- @foreach ($groupJadwal as $jadwal)
                            <li>
                                Jalur {{ $jadwal->jenis }} {{ $jadwal->nomor_polisi }} ({{ $jadwal->nama_sopir }})
                                <ul>
                                    <li>{{ $jadwal->hari_pelayanan }}: {{ $jadwal->jalur }}</li>
                                </ul>
                            </li>
                            @endforeach
                        </ol>
                        @endforeach --}}
                        {{-- @foreach ($desa->jadwal as $jadwal)
                        <ol>
                            {{ $jadwal->kenderaan->nomor_polisi." : ".$jadwal->kenderaan->nama_sopir }}
                        </ol>
                        @endforeach --}}
                        {{-- @foreach ($desa->kenderaan->unique('id') as $kenderaan)
                        <h2>JALUR MOBIL DUMPTRUCK {{ $kenderaan->nama_kenderaan }} (sopir {{ $kenderaan->nama_sopir }})
                        </h2>

                        @endforeach --}}


                        {{-- @foreach($desa->kenderaan->unique('id') as $kenderaan)
                        <h2>JALUR MOBIL DUMPTRUCK {{ $kenderaan->nama_kenderaan }} (sopir {{ $kenderaan->nama_sopir
                            }})
                        </h2>
                        <ul>
                            @foreach($kenderaan->jadwal as $jadwal)
                            <li>
                                <strong>{{ $jadwal->hari_pelayanan }}:</strong>
                                {{ $jadwal->jalur }}
                            </li>
                            @endforeach
                        </ul>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection