<!DOCTYPE html>
<html lang="en">
    <?php $link = asset('backend_4/'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge, chrome=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ $link }}/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $link }}/assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ $link }}/assets/vendor/animate-css/vivify.min.css">
    <link rel="stylesheet" href="{{ $link }}/assets/css/mooli.min.css">
    @yield('css')
</head>
<body>
    <div id="body" class="theme-orange">
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ $link }}/assets/images/icon.svg" width="40" height="40" alt="Mooli"></div>
                <p>Please wait...</p>
            </div>
        </div>
        <div class="overlay"></div>
        <div id="wrapper">
            @include('layouts.backend_4.header')
            @include('layouts.backend_4.sidebar')
            @yield('sticky')
            <div id="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $link }}/assets/bundles/libscripts.bundle.js"></script>    
    <script src="{{ $link }}/assets/bundles/vendorscripts.bundle.js"></script>
    <script src="{{ $link }}/assets/bundles/mainscripts.bundle.js"></script>
    @yield('js')
</body>
</html>