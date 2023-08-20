<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('layouts.home.partials.style')
    @stack('style')
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

    <div id="wrapper">
        @include('layouts.home.partials.header')

        @yield('content')

        @include('layouts.home.partials.footer')
    </div>

    @include('layouts.home.partials.script')

    @stack('script')
</body>

</html>