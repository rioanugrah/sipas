<div class="modal fade" id="modalBuat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Data Klasifikasi</h4>
            </div>
            <form class="upload-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label>Instansi</label>
                    <input type="text" class="form-control" placeholder="Instansi" value="{{ $instansi->nama_instansi }}" readonly>
                </div>
                <div class="mb-3">
                    <label>Kode Klasifikasi</label>
                    <input type="text" name="kode_klasifikasi" class="form-control" placeholder="Kode Klasifikasi">
                </div>
                <div class="mb-3">
                    <label>Judul Klasifikasi</label>
                    <input type="text" name="judul_klasifikasi" class="form-control" placeholder="Judul Klasifikasi">
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Kirim</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>