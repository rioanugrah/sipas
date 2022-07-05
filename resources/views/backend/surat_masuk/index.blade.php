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
                                    <th>Penerima</th>
                                    <th>Disposisi Saat Ini</th>
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
    @include('backend.surat_masuk.modalBuat')
    @include('backend.surat_masuk.modalDisposisi')
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
                    data: 'tanggal_surat',
                    name: 'tanggal_surat'
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
                // {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false,
                //     searchable: false
                // },
            ]
        });

        function add() {
            $('#modalBuat').modal();
        }

        function unit_kerja() {
            $.ajax({
                type: 'GET',
                url: "{{ route('surat_masuk.unit_kerja') }}",
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result) {
                    const hasilData = result.data;
                    var text = "";
                    hasilData.forEach(checkData);
                    function checkData(value,index) {
                        text = text+'<option value="'+value.id+'">'+value.unit_kerja+'</option>';
                    }
                    document.getElementById("disposisi_kepada").innerHTML = text;
                }
            })
        }

        function modalDisposisi(p) {
            $.ajax({
                type: 'GET',
                url: "{{ url('b/surat_masuk/disposisi') }}"+'/'+p,
                contentType: "application/json;  charset=utf-8",
                cache: false,
                success: function(result) {
                    document.getElementById('disposisi_perihal').innerHTML = result.data.isi_ringkasan;
                    document.getElementById('titleDisposisi').innerHTML = '<label class="badge badge-dark" style="font-size: 80%">#Disposisi</label> Disposisi Surat Masuk No: '+result.data.nomor_surat_masuk;
                    $('#disposisi_surat_masuk_id').val(result.data.id);
                    $('#modalDisposisi').modal();
                }
            })
        }

        $('.disposisi-form').submit(function(e) {
            e.preventDefault();
            // var form = $(this);
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ route('surat_masuk.disposisi.simpan') }}",
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
        
        unit_kerja();
    </script>
@endsection
