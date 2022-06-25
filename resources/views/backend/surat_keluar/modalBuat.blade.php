<div class="modal fade" id="modalBuat" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Buat Surat</h4>
            </div>
            <form class="upload-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>No. Surat</label>
                            <input type="text" name="nomor_surat_keluar" class="form-control" placeholder="Nomor Surat">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>No. Agenda</label>
                            <input type="text" name="nomor_agenda_surat_keluar" class="form-control" placeholder="Nomor Agenda Surat" style="width: 55%">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Tanggal Surat</label>
                            <input type="date" name="tanggal_surat" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Asal Surat</label>
                            <input type="text" class="form-control" placeholder="Asal Surat" value="{{ $instansi }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tujuan Surat</label>
                    <select name="tujuan_surat" class="form-control" id="">
                        <option>-- Tujuan Surat --</option>
                        @forelse ($unit_kerjas as $uk)
                        <option value="{{ $uk->id }}">{{ $uk->unit_kerja }}</option>
                        @empty
                        <option>Data Tidak Tersedia</option>
                        @endforelse
                    </select>
                </div>
                <div class="form-group">
                    <label>Sifat Surat</label>
                    <select name="status_surat" class="form-control" id="">
                        <option>-- Sifat Surat --</option>
                        <option value="1">Segera</option>
                        <option value="2">Penting</option>
                        <option value="3">Rahasia</option>
                        <option value="4">Biasa</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Isi Ringkasan</label>
                    <input type="text" name="isi_ringkasan" class="form-control" placeholder="Isi Ringkasan">
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                </div>
                <div class="form-group">
                    <label>Jenis Klasifikasi</label>
                    <select name="klasifikasi_id" class="form-control" id="">
                        <option>-- Pilih Klasifikasi --</option>
                        @foreach ($klasifikasis as $kf)
                        <option value="{{ $kf->id }}">{{ $kf->kode_klasifikasi }} - {{ $kf->judul_klasifikasi }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Upload Berkas</label>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>