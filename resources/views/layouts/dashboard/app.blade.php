<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    {{-- Styles css --}}
    @include('layouts.dashboard.partials.style')
    @stack('style')
</head>

<body class="vertical dark">

    @include('sweetalert::alert')

    <div class="wrapper">
        @include('layouts.dashboard.partials.navbar')
        @include('layouts.dashboard.partials.sidebar')


        <main role="main" class="main-content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        @if (Request::is('*/dashboard'))
                        <div class="row align-items-center mb-2">
                            <div class="col">
                                <h2 class="h4 page-title">Welcome {{ $user->username }}</h2>
                            </div>

                        </div>
                        @endif

                        @yield('content')

                    </div>
                    <!-- / .card-body -->
                </div>
                <!-- / .card -->
            </div>

            @include('layouts.dashboard.partials.notif')
            @include('layouts.dashboard.partials.shortcut')
        </main>
        <!-- main -->
    </div>
    <!-- .wrapper -->

    @include('layouts.dashboard.partials.script')
    @stack('script')
</body>

</html>