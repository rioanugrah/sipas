@extends('layouts.backend_2.app')
@section('title')Unit Kerja @endsection
<?php $link = asset('backend_2/'); ?>
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
                    <button type="button" onclick="add()" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                </div>
                <div class="p-2 d-flex">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('backend.unit_kerja.modalBuat')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover unit_kerja table-custom">
                        <thead>
                            <tr>
                                {{-- <th class="text-center">#</th> --}}
                                <th class="text-center">Unit Kerja</th>
                                <th class="text-center">Instansi</th>
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
<script src="{{ $link }}/assets/bundles/datatablescripts.bundle.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="{{ $link }}/assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="{{ $link }}/assets/js/pages/tables/jquery-datatable.js"></script>

<script src="{{ $link }}/assets/vendor/toastr/toastr.js"></script>

<script>
    var table = $('.unit_kerja').DataTable();

    function add() {
        $('#modalBuat').modal();
    }
</script>
@endsection