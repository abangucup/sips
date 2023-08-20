<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('layouts.home.partials.style')
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">


</head>

<body>

    <div class="modal fade in" id="modal-flipbook" role="modal" aria-labelledby="modal-label" aria-hidden="true"
        style="display:none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <a href="index.html" class="close" aria-hidden="true">×</a>
                </div>
                <div class="modal-body">
                    <div class="file-container"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="wrapper" class="wrapper">
        {{-- @include('layouts.home.partials.header') --}}

        <section class="fullscreen bg-img-4">
            <div class="container">
                <div class="container-fullscreen">
                    <div class="text-middle text-left text-light">
                        <!-- Captions -->
                        <div class="px-3 px-sm-5">
                            <h1 class="my-5 text-center">Sistem Informasi Pengelolaan Sampah</h1>
                            <h3 class="mb-3 text-success"><span class="fe fe-24 fe-log-in mr-2"></span>Masuk</h3>
                            @if (session('status'))
                            <div class="text-danger mb-2">{{ session('status')}}
                            </div>
                            @endif
                            <form class="mx-auto" action="{{ route('storeLogin') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="inputUsername">Username</label>
                                    <input type="text" id="inputUsername" name="username"
                                        class="form-control form-control-lg" placeholder="Username"
                                        value="{{ old('username') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Password</label>
                                    <div class="input-group">
                                        <input type="password" id="inputPassword" name="password"
                                            class="form-control form-control-lg" placeholder="Password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="togglePassword">
                                                <i class="fe fe-24 fe-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputRole">Role</label>
                                    <select name="role" id="inputRole" class="form-control form-control-lg">
                                        <option value="p3b3k">P3B3K</option>
                                        <option value="desa">Desa</option>
                                        <option value="pelanggan">Pelanggan</option>
                                    </select>
                                </div>
                                <button class="btn btn-outline-success btn-block mb-3" type="submit">Masuk</button>
                                <a class="btn btn-primary btn-block" href="{{ route('home') }}">Home</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- @include('layouts.home.partials.footer') --}}
    </div>

    @include('layouts.home.partials.script')
</body>

</html>