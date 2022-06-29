@extends('layouts.backend_4.master1')
@section('title')
    {{ $surat_masuk->nomor_surat_masuk }} - {{ $surat_masuk->isi_ringkasan }}
@endsection

@section('content')
<div class="block-header">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>No. Surat : @yield('title')</h1>
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
                            {{-- <div class="col-md-2">
                                <a href="#" class="btn btn-lg btn-white" style="align-items: center; align-content: center"><i class="fa fa-file fa-4x pull-center text-success"></i></a>
                            </div> --}}
                            <div class="col-md-12">
                                <h5 class="mt-4 mb-4 ml-4 mr-4"><i class="fa fa-envelope-o"></i> No. Surat: {{ $surat_masuk->nomor_surat_masuk }}</h5>
                                <table class="table">
                                    <tr>
                                        <td>Tanggal Surat</td>
                                        <td>:</td>
                                        <td>{{ $surat_masuk->tanggal_surat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pengirim</td>
                                        <td>:</td>
                                        <td>{{ $surat_masuk->unit_kerja->unit_kerja }}</td>
                                    </tr>
                                    <tr>
                                        <td>Sifat Surat</td>
                                        <td>:</td>
                                        @if ($surat_masuk->status_surat == 1)
                                        <td>Segera</td>
                                        @elseif($surat_masuk->status_surat == 2)
                                        <td>Penting</td>
                                        @elseif($surat_masuk->status_surat == 3)
                                        <td>Rahasia</td>
                                        @elseif($surat_masuk->status_surat == 4)
                                        <td>Biasa</td>
                                        @endif
                                        {{-- <td>{{ $surat_masuk->status_surat }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td>Isi Ringkasan</td>
                                        <td>:</td>
                                        <td>{{ $surat_masuk->isi_ringkasan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>{{ $surat_masuk->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Berkas</td>
                                        <td>:</td>
                                        <td><a href="{{ route('surat_masuk.berkas',['id' => $surat_masuk->id]) }}" class="btn btn-white" target="_blank"><i class="fa fa-file text-success"></i> <b>Download / Open File</b></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="disposisi">
                        <h5 class="mt-4 mb-4 ml-4 mr-4"><i class="fa fa-envelope-o"></i> No. Surat: {{ $surat_masuk->nomor_surat_masuk }}</h5>
                        <table class="table">
                            <tr>
                                <td>
                                    <div>Tgl. Surat</div>
                                    <div style="font-weight: bold">{{ $surat_masuk->tanggal_surat }}</div>
                                    <div class="mt-4">Sifat Surat</div>
                                    <div style="font-weight: bold">
                                        @if ($surat_masuk->status_surat == 1)
                                        Segera
                                        @elseif ($surat_masuk->status_surat == 2)
                                        Penting
                                        @elseif ($surat_masuk->status_surat == 3)
                                        Rahasia
                                        @elseif ($surat_masuk->status_surat == 4)
                                        Biasa
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div>Asal Surat</div>
                                    <div style="font-weight: bold">{{ $surat_masuk->unit_kerja->unit_kerja }}</div>
                                    <div class="mt-4">Perihal</div>
                                    <div style="font-weight: bold">{{ $surat_masuk->isi_ringkasan }}</div>
                                </td>
                                <td>
                                    <div>Disposisi</div>
                                    <div style="font-weight: bold">-</div>
                                    <div class="mt-4">Keterangan</div>
                                    <div style="font-weight: bold">{{ $surat_masuk->keterangan }}</div>
                                </td>
                            </tr>
                        </table>
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Dari</th>
                                <th>Keterangan</th>
                                <th>Diteruskan</th>
                            </tr>
                            @foreach ($disposisis as $key => $disposisi)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $disposisi->created_at }}</td>
                                <td>{{ $disposisi->user->unit_kerja->unit_kerja }}</td>
                                <td>{{ $disposisi->keterangan }}</td>
                                <td>{{ $disposisi->unit_kerja->unit_kerja }}</td>
                            </tr>
                            @endforeach
                        </table>
                        {{-- <p>pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify
                            squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel </p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection