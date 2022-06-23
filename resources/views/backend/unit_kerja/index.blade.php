@extends('layouts.backend_4.master1')
@section('title')
    Unit Kerja
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
                        <table class="table table-hover unit_kerja dataTable table-custom spacing5">
                            <thead>
                                <tr>
                                    <th class="text-center">Unit Kerja</th>
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
    @include('backend.unit_kerja.modalBuat')
    @include('backend.unit_kerja.modalEdit')
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
        var table = $('.unit_kerja').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('unit_kerja') }}",
            columns: [{
                    data: 'unit_kerja',
                    name: 'unit_kerja'
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

        function add() {
            $('#modalBuat').modal();
        }
        function reload() {
            table.ajax.reload();
        }

        function edit(p) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/unit_kerja') }}"+'/'+p+'/edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result) {
                    $('#edit_id').val(result.data.id);
                    $('#edit_unit_kerja').val(result.data.unit_kerja);
                    $('#edit_instansi').val(result.data.instansi);
                    $('#modalEdit').modal();
                }
            })
        }

        $('.upload-form').submit(function(e) {
            e.preventDefault();
            // var form = $(this);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('unit_kerja.simpan') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.success == true) {
                        // swal({
                        //     title: result.message_title,
                        //     text: result.message_content,
                        //     icon: result.message_type,
                        //     padding: '2em'
                        // })
                        alert(result.message_title);
                        // toastr.success(result.message_title,'',{
                        //     positionClass: 'toast-bottom-full-width'
                        // });
                        table.ajax.reload();
                        this.reset();
                        // $('#modalBuat').modal('hide');
                    } else {
                        // swal({
                        //     title: 'Gagal',
                        //     text: 'Data Gagal Disimpan',
                        //     icon: 'error',
                        //     padding: '2em'
                        // })
                        alert(result.error);
                        // toastr.error(result.error,'',{
                        //     positionClass: 'toast-top-full-width'
                        // });
                    }
                },
                error: function(request, status, error) {
                    // swal({
                    //     title: error,
                    //     type: 'error',
                    //     padding: '2em'
                    // })
                    alert(error);
                    // toastr.error(error,'',{
                    //     positionClass: 'toast-top-full-width'
                    // });
                }
            })
        });

        $('.edit-upload-form').submit(function(e) {
            e.preventDefault();
            // var form = $(this);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('unit_kerja.update') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: (result) => {
                    if (result.success == true) {
                        // swal({
                        //     title: result.message_title,
                        //     text: result.message_content,
                        //     icon: result.message_type,
                        //     padding: '2em'
                        // })
                        alert(result.message_title);
                        // toastr.success(result.message_title,'',{
                        //     positionClass: 'toast-bottom-full-width'
                        // });
                        table.ajax.reload();
                        this.reset();
                        $('#modalEdit').modal('hide');
                    } else {
                        // swal({
                        //     title: 'Gagal',
                        //     text: 'Data Gagal Disimpan',
                        //     icon: 'error',
                        //     padding: '2em'
                        // })
                        alert(result.error);
                        // toastr.error(result.error,'',{
                        //     positionClass: 'toast-top-full-width'
                        // });
                    }
                },
                error: function(request, status, error) {
                    // swal({
                    //     title: error,
                    //     type: 'error',
                    //     padding: '2em'
                    // })
                    alert(error);
                    // toastr.error(error,'',{
                    //     positionClass: 'toast-top-full-width'
                    // });
                }
            })
        });
    </script>
@endsection
