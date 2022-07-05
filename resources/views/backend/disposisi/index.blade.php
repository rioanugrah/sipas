@extends('layouts.backend_4.master1')
@section('title')
    Disposisi Surat
@endsection
<?php $link = asset('backend_4/'); ?>
@section('css')
    <link rel="stylesheet" href="{{ $link }}/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ $link }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ $link }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ $link }}/assets/vendor/sweetalert/sweetalert.css" />
@endsection
@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>@yield('title')</h1>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
            <div
                class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                <div class="mb-3 mb-xl-0">
                    <button onclick="reload()" class="btn btn-default"><i class="fa fa-refresh"></i> Reload</button>
                    {{-- <button onclick="add()" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button> --}}
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
                    <table class="table table-hover disposisi dataTable table-custom spacing5">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nomor Surat</th>
                                <th>Dari</th>
                                {{-- <th>Action</th> --}}
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
    var table = $('.disposisi').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('disposisi') }}",
        columns: [{
                data: 'tanggal_surat',
                name: 'tanggal_surat'
            },
            {
                data: 'nomor_surat_masuk',
                name: 'nomor_surat_masuk'
            },
            {
                data: 'dari',
                name: 'dari'
            },
            // {
            //     data: 'action',
            //     name: 'action',
            //     orderable: false,
            //     searchable: false
            // },
        ]
    });

    function reload() {
        table.ajax.reload();
    }
</script>
@endsection