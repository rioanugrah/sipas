@extends('layouts.backend_2.app')
@section('title')Instansi @endsection
<?php $link = asset('backend_2/'); ?>
@section('css')
<link rel="stylesheet" href="{{ $link }}/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ $link }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="{{ $link }}/assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="{{ $link }}/assets/vendor/toastr/toastr.min.css">
@endsection
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h2>@yield('title')</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i></a></li>                            
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="d-flex flex-row-reverse">
                <div class="page_action">
                    <button type="button" onclick="add()" class="btn btn-primary"><i class="fa fa-gear"></i> Setup</button>
                </div>
                <div class="p-2 d-flex">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.instansi.modalBuat')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover instansi table-custom">
                        <thead>
                            <tr>
                                {{-- <th class="text-center">#</th> --}}
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Lembaga</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">NIP</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- <script src="https://wrraptheme.com/templates/iconic/dist/assets/bundles/vendorscripts.bundle.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/assets/bundles/datatablescripts.bundle.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/assets/vendor/sweetalert/sweetalert.min.js"></script> 

<script src="https://wrraptheme.com/templates/iconic/dist/assets/bundles/mainscripts.bundle.js"></script>
<script src="https://wrraptheme.com/templates/iconic/dist/../js/pages/tables/jquery-datatable.js"></script> --}}
<script src="{{ $link }}/assets/bundles/datatablescripts.bundle.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{ $link }}/assets/js/pages/tables/jquery-datatable.js"></script>

<script src="{{ $link }}/assets/vendor/toastr/toastr.js"></script>
<script>
    var table = $('.instansi').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('instansi') }}",
        columns: [
            // {
            //     data: 'id',
            //     name: 'id'
            // },
            {
                data: 'nama_instansi',
                name: 'nama_instansi'
            },
            {
                data: 'nama_lembaga',
                name: 'nama_lembaga'
            },
            {
                data: 'alamat_instansi',
                name: 'alamat_instansi'
            },
            {
                data: 'nip_instansi',
                name: 'nip_instansi'
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

    function edit(p) {
        alert(p);
    }

    $('.upload-form').submit(function(e) {
        e.preventDefault();
        // var form = $(this);
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ route('instansi.simpan') }}",
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
                    // alert(result.message_title);
                    toastr.success(result.message_title,'',{
                        positionClass: 'toast-bottom-full-width'
                    });
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
                    // alert(result.message_title);
                    toastr.error(result.error,'',{
                        positionClass: 'toast-top-full-width'
                    });
                }
            },
            error: function(request, status, error) {
                // swal({
                //     title: error,
                //     type: 'error',
                //     padding: '2em'
                // })
                // alert(error);
                toastr.error(error,'',{
                    positionClass: 'toast-top-full-width'
                });
            }
        })
    });

    //Exportable table
    // $('.js-exportable').DataTable({
    //     dom: 'Bfrtip',
    //     buttons: [
    //         'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // });
</script>
@endsection