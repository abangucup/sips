@extends('layouts.home.app')

@section('title', 'SIPS')

@section('content')
<section id="page-title" class="p-t-70 pb-3 text-dark">
    <div class="container">
        <div class="page-title">
            <h3 class="text-capitalize">Desa</h3>
        </div>
        <div class="breadcrumb mt-2">
            <ul>
                <li class="textc-primary"><a href="{{ route('home') }}">Beranda</a></li>
                <li>>></li>
                <li class="active text-capitalize">
                    <span class="h5">Desa</span>
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="page-content" class="sidebar-right">
    <div class="container">
        <div id="blog" class="post-thumbnails">
            <!-- Post item-->
            <div class="row">

                @foreach ($desas as $desa)
                <div class="col-md-4">
                    <div class="post-item p-2 mb-4 shadow">
                        <div class="post-item-wrap">
                            <div class="post">
                                <a href="detail/doc-21-peraturan">
                                    <img alt="" src="{{ asset('dashboard/asset/desa.svg') }}" />
                                </a>
                            </div>
                            <div class="post-item-description">
                                <h2>
                                    <a href="detail/doc-21-peraturan">{{ $desa->nama_desa }}</a>
                                </h2>
                                <p>{{ $desa->alamat_desa }}
                                    <br>
                                    <span class="text-primary">Jadwal: {{ $desa->jadwal_count != 0 ?
                                        $desa->jadwal_count : 'Belum
                                        Ada'}}</span>
                                    <br>
                                    <span class="text-primary">Pelanggan: {{ $desa->pelanggans_count != 0 ?
                                        $desa->pelanggans_count : 'Belum Ada'
                                        }}</span>
                                </p>
                                <span class="post-meta-comments text-success">
                                    <a href="{{ route('detail_desa', $desa->id) }}"
                                        class="text-warning item-link">Selengkapnya
                                        <i class="fa fa-arrow-right"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection

@push('style')
<style>
    @media only screen and (min-width: 768px) {
        .post {
            float: left;
            justify-content: center;
            margin-top: 20px;
            width: 30%;
        }
    }
</style>
@endpush