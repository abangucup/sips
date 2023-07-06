<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>500 - ERRORS</title>

    @include('layouts.dashboard.partials.style')
</head>

<body class="dark">
    <div class="wrapper vh-100">
        <div class="align-items-center h-100 d-flex w-50 mx-auto">
            <div class="mx-auto text-center">
                <h1 class="display-1 m-0 font-weight-bolder text-muted" style="font-size:80px;">500</h1>
                <h1 class="mb-1 text-muted font-weight-bold">OOPS!</h1>
                <h6 class="mb-3 text-muted">OH SORRY !! ADA SESUATU AM.</h6>
                <a href="{{ route('home') }}" class="btn btn-lg btn-primary px-5">BALE ULANG JO</a>
            </div>
        </div>
    </div>
    @include('layouts.dashboard.partials.script')
</body>

</html>