<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login SIPS</title>

    {{-- Styles css --}}
    <link rel="stylesheet" href="{{ asset('dashboard/css/simplebar.css') }}">
    <!-- Fonts CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/feather.css') }}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('dashboard/css/app-dark.css') }}" id="darkTheme">
    <link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">

</head>

<body class="vertical dark">

    @include('sweetalert::alert')

    <div class="wrapper vh-100 overflow-hidden">
        <div class="row align-items-center h-100">
            <div class="col-lg-6 d-none d-lg-flex">
                <div class="w-50 mx-auto text-center">
                    <img src="{{ asset('dashboard/asset/welcome.svg') }}" width="700" alt="Login">
                </div>
            </div>
            <div class="col-lg-6">
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
                            <input type="text" id="inputUsername" name="username" class="form-control form-control-lg"
                                placeholder="Username" value="{{ old('username') }}" required>
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
                        <button class="btn btn-lg btn-outline-success btn-block mb-3" type="submit">Masuk</button>
                        <a class="btn btn-lg btn-primary btn-block" href="{{ route('home') }}">Home</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/js/config.js') }}"></script>
    <script src="{{ asset('dashboard/js/apps.js') }}"></script>

    <script src="{{ asset('dashboard/js/jquery/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                const passwordInput = $('#inputPassword');
                const passwordFieldType = passwordInput.attr('type');

                if (passwordFieldType === 'password') {
                    passwordInput.attr('type', 'text');
                    $('#togglePassword i').removeClass('fe-eye').addClass('fe-eye-off');
                } else {
                    passwordInput.attr('type', 'password');
                    $('#togglePassword i').removeClass('fe-eye-off').addClass('fe-eye');
                }
            });
        });
    </script>
</body>

</html>