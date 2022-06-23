<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="edit_title_klasifikasi"></h4>
            </div>
            <form class="edit-upload-form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="modal-body">
                <div class="mb-3">
                    <label>Instansi</label>
                    <input type="text" class="form-control" placeholder="Instansi" id="edit_instansi" readonly>
                </div>
                <div class="mb-3">
                    <label>Kode Klasifikasi</label>
                    <input type="text" name="edit_kode_klasifikasi" class="form-control" id="edit_kode_klasifikasi" placeholder="Kode Klasifikasi">
                </div>
                <div class="mb-3">
                    <label>Judul Klasifikasi</label>
                    <input type="text" name="edit_judul_klasifikasi" class="form-control" id="edit_judul_klasifikasi" placeholder="Judul Klasifikasi">
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <input type="text" name="edit_keterangan" class="form-control" id="edit_keterangan" placeholder="Keterangan">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>