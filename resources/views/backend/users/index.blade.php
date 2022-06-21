@extends('layouts.backend_4.master1')
@section('title')
    Pengguna
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
                <h1>Pengguna</h1>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">

            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Pengguna</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover js-table dataTable table-custom spacing5">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Action</th>
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
   var table = $('.js-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users') }}",
        columns: [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
   });
</script>
@endsection