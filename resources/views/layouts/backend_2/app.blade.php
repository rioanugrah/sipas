<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <?php $link = asset('backend_2/assets/'); ?>
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
    <link rel="stylesheet" href="{{ $link }}/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ $link }}/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ $link }}/css/main.css">
    @yield('css')
</head>

<body data-theme="light" class="font-nunito">
    <div id="wrapper" class="theme-cyan">
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="m-t-30"><img src="{{ $link }}/images/logo-icon.svg" width="48" height="48"
                        alt="Iconic"></div>
                <p>Please wait...</p>
            </div>
        </div>
        @include('layouts.backend_2.navbar')
        @include('layouts.backend_2.sidebar')
        {{-- <div class="right_icon_bar">
            <ul>
                <li><a href="app-inbox.html"><i class="fa fa-envelope"></i></a></li>
                <li><a href="app-chat.html"><i class="fa fa-comments"></i></a></li>
                <li><a href="app-calendar.html"><i class="fa fa-calendar"></i></a></li>
                <li><a href="file-dashboard.html"><i class="fa fa-folder"></i></a></li>
                <li><a href="app-contact.html"><i class="fa fa-id-card"></i></a></li>
                <li><a href="blog-list.html"><i class="fa fa-globe"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fa fa-plus"></i></a></li>
                <li><a href="javascript:void(0);" class="right_icon_btn"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div> --}}
        <div id="main-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
</body>
<script src="{{ $link }}/bundles/libscripts.bundle.js"></script>
<script src="{{ $link }}/bundles/vendorscripts.bundle.js"></script>
<script src="{{ $link }}/bundles/mainscripts.bundle.js"></script>
@yield('js')

</html>
