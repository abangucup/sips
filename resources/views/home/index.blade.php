@extends('layouts.home.app')

@section('title', 'SIPS')

@section('content')

<section class="fullscreen bg-img-4">
    <div class="container">
        <div class="container-fullscreen">
            <div class="text-middle text-left text-light">
                <!-- Captions -->
                <h3 class="mb-0 text-shadow" data-animation="fadeInDown">Sistem Informasi Pengelolaan Sampah
                </h3>
                <h1 data-animation="fadeInDown" class="display-1 mx-0 text-shadow">SIPS <span
                        style="font-size:4rem;"></span></h1>
            </div>
        </div>
    </div>
</section>
<section class="pt-0" style="top: -80px">
    <div class="container" data-animation="fadeInDown">
        <div class="row">
            <div class="col-lg-4 col-md-4 text-center text-middle">
                <img src="{{ asset('dashboard/asset/sampah.svg') }}" width="300" class="m-5" alt="">
            </div>
            <div class="col-lg-8 col-md-8 text-left text-middle">
                <br>
                <p class="h4">SIPS (Sistem Informasi Pengelolaan Sampah)<span class="text-muted"> adalah
                        aplikasi online resmi dari Balai Lingkungan Hidup (BLH) untuk mengelola sampah yang ada
                        dilingkungan sekitar
                        kita.</span></p>
                <p class="h4">Bank Sampah<span class="text-muted"> adalah fasilitas untuk mengelola sampah
                        dengan prinsip 3R (Reduce, Reuse, dan Recycle), sebagai sarana edukasi, perubahan
                        perilaku dalam pengelolaan sampah, dan pelaksanaan ekonomi sirkular, yang dibentuk dan
                        dikelola oleh masyarakat, badan usaha, dan/atau pemerintah daerah (Peraturan Menteri LH
                        No. 14 Tahun 2021).</span></p>

            </div>
        </div>
    </div>
</section>

<section class="py-5 background-grey border">
    <div class="container">
        <!--Icon box counter-cs -->
        <h2 class="mb-1 text-center"><span class="textc-primary">Statistik</span></h2>
        <br>
        <div class="row mt-3">
            <div class="col-sm-4 border p-3">
                <div class="icon-box effect large light">
                    <div class="icon"> <a href="index.html#"><i class="fa fa-list"></i></a> </div>
                    <h3 class="mb-0 mt-4">{{ $capaian->timbulan_sampah ?? 0 }} Ton / Tahun</h3>
                    <p>Timbulan Sampah</p>
                </div>
            </div>
            <div class="col-sm-4 border p-3">
                <div class="icon-box effect large light">
                    <div class="icon"> <a href="index.html#"><i class="fa fa-database"></i></a> </div>
                    <h3 class="mb-0 mt-4">{{ $capaian->pengurangan_sampah ?? 0}} Ton / Tahun</h3>
                    <p>Pengurangan Sampah</p>
                </div>
            </div>
            <div class="col-sm-4 border p-3">
                <div class="icon-box effect large light">
                    <div class="icon"> <a href="index.html#"><i class="fa fa-recycle"></i></a> </div>
                    <h3 class="mb-0 mt-4">{{ $capaian->penanganan_sampah ?? 0}} Ton / Tahun</h3>
                    <p>Penanganan Sampah</p>
                </div>
            </div>

        </div>
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-lg-4 border p-3">
                <div class="icon-box effect large light">
                    <div class="icon"> <a href="index.html#"><i class="fa fa-expand"></i></a> </div>
                    <h3 class="mb-0 mt-4">{{ $capaian->sampah_terkelola }} Ton / Tahun</h3>
                    <p>Sampah Terkelola</p>
                </div>
            </div>
            <div class="col-lg-4 border p-3">
                <div class="icon-box effect large light">
                    <div class="icon"> <a href="index.html#"><i class="fa fa-compress"></i></a> </div>
                    <h3 class="mb-0 mt-4">{{ $capaian->sampah_tidak_terkelola ?? 0}} Ton / Tahun</h3>
                    <p>Sampah Tidak Terkelola</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection