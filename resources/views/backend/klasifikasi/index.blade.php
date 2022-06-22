@extends('layouts.backend_4.master1')
@section('title')
    Klasifikasi
@endsection
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
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2>@yield('title')</h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover klasifikasi dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th class="text-center">Kode Klasifikasi</th>
                                <th class="text-center">Judul Klasifikasi</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ $link }}/assets/bundles/datatablescripts.bundle.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{ $link }}/assets/vendor/sweetalert/sweetalert.min.js"></script>
<script src="{{ $link }}/js/pages/tables/jquery-datatable.js"></script>

<script>
    var table = $('.klasifikasi').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('klasifikasi') }}",
    columns: [
        // {
        //     data: 'id',
        //     name: 'id'
        // },
        {
            data: 'kode_klasifikasi',
            name: 'kode_klasifikasi'
        },
        {
            data: 'judul_klasifikasi',
            name: 'judul_klasifikasi'
        },
        {
            data: 'keterangan',
            name: 'keterangan'
        },
        {
            data: 'instansi',
            name: 'instansi'
        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },
    ]
});
</script>
@endsection