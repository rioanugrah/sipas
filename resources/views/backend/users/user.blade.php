@extends('layouts.backend_4.master1')
@section('title'){{ $user->name }} - {{ $user->roles->nama_role }} @endsection
<?php $link = asset('backend_4/'); ?>
@section('css')
<link rel="stylesheet" href="{{ $link }}/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ $link }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="{{ $link }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="{{ $link }}/assets/vendor/sweetalert/sweetalert.css"/>
@endsection
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>@yield('title')</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <div class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="mb-3 mb-xl-0">
                    <button onclick="refresh()" class="btn btn-default"><i class="fa fa-refresh"></i> Reload</button>
                    <button onclick="add()" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection