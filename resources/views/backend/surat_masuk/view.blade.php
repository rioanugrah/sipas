@extends('layouts.backend_4.master1')
@section('title')
    {{ $surat_masuk->nomor_surat_masuk }} - {{ $surat_masuk->isi_ringkasan }}
@endsection

@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>@yield('title')</h1>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="body">
                <ul class="nav nav-tabs3 white">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#surat_masuk"><i class="fa fa-mail-reply"></i> Surat Masuk</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#disposisi"><i class="fa fa-exchange"></i> Disposisi</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="surat_masuk">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="#" class="btn btn-lg btn-white" style="align-items: center; align-content: center"><i class="fa fa-file fa-4x pull-center text-success"></i></a>
                            </div>
                            <div class="col-md-8">
                                <h6>No: {{ $surat_masuk->nomor_surat_masuk }}</h6>
                                <p>master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat
                                    salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate qui.</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="disposisi">
                        <h6>Disposisi</h6>
                        <p>pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                            squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection