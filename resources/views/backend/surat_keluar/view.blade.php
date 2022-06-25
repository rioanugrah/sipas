@extends('layouts.backend_4.master1')
@section('title')
    {{ $surat_keluar->nomor_surat_keluar }} - {{ $surat_keluar->isi_ringkasan }}
@endsection

@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>@yield('title')</h1>
        </div>
    </div>
</div>
@endsection