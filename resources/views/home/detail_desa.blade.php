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
                <li class="textc-primary"><a href="{{ route('home') }}">Beranda</a></li>
                <li>>></li>
                <li class="textc-primary"><a href="{{ route('list_desa') }}">Desa</a></li>
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
                        @forelse ($desa->jadwal->unique('jenis') as $jalurKenderaan)
                        <h2 class="text-center">{{ "Jalur Pelayanan Pengangkutan Sampah ".$jalurKenderaan->jenis }}</h2>
                        <ol>
                            @foreach ($desa->kenderaan->where('jenis',
                            $jalurKenderaan->kenderaan->jenis)->unique('nama_sopir') as $kenderaan)
                            <li>{{ "Jalur ".$kenderaan->nama_kenderaan." ".$kenderaan->nomor_polisi." ( Sopir
                                ".$kenderaan->nama_sopir." )" }} </li>
                            <ul style="list-style: '- ">
                                @foreach ($kenderaan->jadwal as $jadwal)
                                <li>{{ $jadwal->hari_pelayanan." : ".$jadwal->jalur }}</li>
                                @endforeach
                            </ul>
                            @endforeach
                        </ol>
                        @empty
                        <h2 class="text-center">Belum Terdapat Jadwal</h2>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection