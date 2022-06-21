<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <?php $link = asset('backend_3/'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="description" content="Sistem Informasi Pengarsipan Surat Instansi">
    <meta name="keywords"
        content="Sipas, Sistem Informasi Pengarsipan Surat, Sistem Informasi Pengarsipan Surat Instansi, Sistem Informasi Surat Keluar Masuk">
    <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
    <meta property="og:type" content="agency">
    <meta property="og:title" content="SIPAS">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="SIPAS">
    <link rel="canonical" href="{{ url('/') }}">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="{{ $link }}/assets/css/preloader.min.css" type="text/css" />
    <link href="{{ $link }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    {{-- <link href="https://themesdesign.in/dason-laravel/layouts/default/assets/css/icons.min.css" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ $link }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ $link }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    {{-- <link href="https://themesdesign.in/dason-laravel/layouts/default/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" /> --}}
    @yield('css')
</head>

<body data-topbar="dark">
    <div id="layout-wrapper">
        @include('layouts.backend_3.topbar')
        @include('layouts.backend_3.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.backend_3.footer')
        </div>
    </div>
</body>
<script src="{{ URL::asset('backend_3/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('backend_3/assets/libs/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('backend_3/assets/libs/metismenu/metismenu.min.js') }}"></script>
<script src="{{ URL::asset('backend_3/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('backend_3/assets/libs/node-waves/node-waves.min.js') }}"></script>
<script src="{{ URL::asset('backend_3/assets/libs/feather-icons/feather-icons.min.js') }}"></script>
<script src="{{ URL::asset('backend_3/assets/libs/pace-js/pace-js.min.js') }}"></script>
@yield('js')

</html>
