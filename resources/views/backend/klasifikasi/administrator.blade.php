@extends('layouts.backend_4.master1')
@section('title')
    Klasifikasi
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
    @include('backend.klasifikasi.modalView')
    @include('backend.klasifikasi.modalEdit')
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

        function add() {
            $('#modalBuat').modal();
        }

        function reload() {
            table.ajax.reload();
        }

        function detail(p) {
            // alert(p);
            // $('#modalDetail').modal();
            $.ajax({
                type: 'GET',
                url: "{{ url('b/klasifikasi') }}" + '/' + p,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result) {
                    document.getElementById('detail_title_klasifikasi').innerHTML = 'Detail Klasifikasi';
                    document.getElementById('detail_kode_klasifikasi').innerHTML = result.data.kode_klasifikasi;
                    document.getElementById('detail_judul_klasifikasi').innerHTML = result.data.judul_klasifikasi;
                    document.getElementById('detail_keterangan').innerHTML = result.data.keterangan;
                    document.getElementById('detail_instansi').innerHTML = result.data.instansi;
                    $('#modalDetail').modal();
                }
            })
        }

        function edit(p) {
            // alert(p);
            // $('#modalDetail').modal();
            $.ajax({
                type: 'GET',
                url: "{{ url('b/klasifikasi') }}"+'/'+p+'/edit',
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result) {
                    document.getElementById('edit_title_klasifikasi').innerHTML = 'Edit Klasifikasi';
                    $('#edit_id').val(result.data.id);
                    $('#edit_kode_klasifikasi').val(result.data.kode_klasifikasi);
                    $('#edit_judul_klasifikasi').val(result.data.judul_klasifikasi);
                    $('#edit_keterangan').val(result.data.keterangan);
                    $('#edit_instansi').val(result.data.instansi);
                    // document.getElementById('edit_kode_klasifikasi').innerHTML = result.data.kode_klasifikasi;
                    // document.getElementById('edit_judul_klasifikasi').innerHTML = result.data.judul_klasifikasi;
                    // document.getElementById('edit_keterangan').innerHTML = result.data.keterangan;
                    // document.getElementById('edit_instansi').innerHTML = result.data.instansi;
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
                url: "{{ route('klasifikasi.simpan') }}",
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
                        $('#modalBuat').modal('hide');
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
                url: "{{ route('klasifikasi.update') }}",
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
