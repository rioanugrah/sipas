@extends('layouts.backend_4.master1')
@section('title')
    Surat Masuk
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
                <h1>Surat Masuk</h1>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">

            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Surat Masuk</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover surat_masuk dataTable table-custom spacing5">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nomor Surat</th>
                                    <th>Nomor Agenda</th>
                                    <th>Sifat Surat</th>
                                    <th>Pengirim</th>
                                    <th>Disposisi Saat Ini</th>
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
        var table = $('.surat_masuk').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('surat_masuk') }}",
            columns: [{
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'nomor_surat_masuk',
                    name: 'nomor_surat_masuk'
                },
                {
                    data: 'nomor_agenda_surat_masuk',
                    name: 'nomor_agenda_surat_masuk'
                },
                {
                    data: 'sifat_surat',
                    name: 'sifat_surat'
                },
                {
                    data: 'pengirim',
                    name: 'pengirim'
                },
                {
                    data: 'disposisi',
                    name: 'disposisi'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        function add() {
            $('#modalBuat').modal();
        }
        
    </script>
@endsection
