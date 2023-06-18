<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>404 - NOT FOUND</title>

    @include('layouts.dashboard.partials.style')
</head>

<body class="dark">
    <div class="wrapper vh-100">
        <div class="align-items-center h-100 d-flex w-50 mx-auto">
            <div class="mx-auto text-center">
                <h1 class="display-1 m-0 font-weight-bolder text-muted" style="font-size:80px;">404</h1>
                <h1 class="mb-1 text-muted font-weight-bold">OOPS!</h1>
                <h6 class="mb-3 text-muted">The page could not be found.</h6>
                <a href="./index.html" class="btn btn-lg btn-primary px-5">Back to Dashboard</a>
            </div>
        </div>
    </div>

    @include('layouts.dashboard.partials.script')
</body>

</html>