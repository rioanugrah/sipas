@extends('layouts.backend_4.master1')
@section('title')
    Instansi
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
    @include('backend.instansi.modalView')
    @include('backend.instansi.modalEdit')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>@yield('title')</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover instansi dataTable table-custom spacing5">
                            <thead>
                                <tr>
                                    <th class="text-center">Instansi</th>
                                    <th class="text-center">Lembaga</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">NIP</th>
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

function detail(p) {
    // alert(p);
    // $('#modalDetail').modal();
    $.ajax({
        type: 'GET',
        url: "{{ url('b/instansi') }}"+'/'+p,
        contentType: "application/json;  charset=utf-8",
        cache: false,
        success: function(result){
            document.getElementById('detail_title_instansi').innerHTML = 'Detail Instansi';
            document.getElementById('detail_instansi').innerHTML = result.data.nama_instansi;
            document.getElementById('detail_lembaga_instansi').innerHTML = result.data.nama_lembaga;
            document.getElementById('detail_alamat_instansi').innerHTML = result.data.alamat_instansi;
            document.getElementById('detail_kepala_instansi').innerHTML = result.data.nama_kepala_instansi;
            document.getElementById('detail_nip_instansi').innerHTML = result.data.nip_instansi;
            document.getElementById('detail_npwp_instansi').innerHTML = result.data.npwp_instansi;
            document.getElementById('detail_email_instansi').innerHTML = result.data.email_instansi;
            document.getElementById('detail_telp_instansi').innerHTML = result.data.telp_instansi;
            document.getElementById('detail_logo_instansi').innerHTML = result.data.logo_instansi;
            if(result.data.status_instansi == 'Active'){
                document.getElementById('detail_status_instansi').innerHTML = '<div class="text-success">'+result.data.status_instansi+'</div>';
            }else{
                document.getElementById('detail_status_instansi').innerHTML = '<div class="text-danger">'+result.data.status_instansi+'</div>';
            }
            $('#modalDetail').modal();
        }
    })
}

function edit(p) {
    $.ajax({
        type: 'GET',
        url: "{{ url('b/instansi') }}"+'/'+p+'/edit',
        contentType: "application/json;  charset=utf-8",
        cache: false,
        success: function(result){
            document.getElementById('edit_title_instansi').innerHTML = 'Edit Data Instansi';
            $('#edit_id').val(result.data.id);
            $('#edit_nama_instansi').val(result.data.nama_instansi);
            $('#edit_nama_lembaga').val(result.data.nama_lembaga);
            $('#edit_alamat_instansi').val(result.data.alamat_instansi);
            $('#edit_nama_kepala_instansi').val(result.data.nama_kepala_instansi);
            $('#edit_nip_instansi').val(result.data.nip_instansi);
            $('#edit_npwp_instansi').val(result.data.npwp_instansi);
            $('#edit_email_instansi').val(result.data.email_instansi);
            $('#edit_telp_instansi').val(result.data.telp_instansi);
            $('#modalEdit').modal();
        }
    })
}

$('.edit-upload-form').submit(function(e) {
    e.preventDefault();
    // var form = $(this);
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: "{{ route('instansi.update') }}",
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