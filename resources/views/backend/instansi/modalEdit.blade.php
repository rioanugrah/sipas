<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="edit_title_instansi"></h4>
            </div>
            <form class="edit-upload-form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Instansi</label>
                    <input type="text" name="edit_nama_instansi" class="form-control" placeholder="Instansi" id="edit_nama_instansi">
                </div>
                <div class="mb-3">
                    <label>Nama Lembaga</label>
                    <input type="text" name="edit_nama_lembaga" class="form-control" placeholder="Lembaga" id="edit_nama_lembaga">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="edit_alamat_instansi" class="form-control" cols="30" rows="5" id="edit_alamat_instansi"></textarea>
                </div>
                <div class="mb-3">
                    <label>Nama Kepala Instansi</label>
                    <input type="text" name="edit_nama_kepala_instansi" class="form-control" placeholder="Kepala Instansi" id="edit_nama_kepala_instansi">
                </div>
                <div class="mb-3">
                    <label>NIP Instansi</label>
                    <input type="text" name="edit_nip_instansi" class="form-control" placeholder="NIP Instansi" id="edit_nip_instansi">
                </div>
                <div class="mb-3">
                    <label>NPWP Instansi</label>
                    <input type="text" name="edit_npwp_instansi" class="form-control" placeholder="NPWP Instansi" id="edit_npwp_instansi">
                </div>
                <div class="mb-3">
                    <label>Email Instansi</label>
                    <input type="text" name="edit_email_instansi" class="form-control" placeholder="Email Instansi" id="edit_email_instansi">
                </div>
                <div class="mb-3">
                    <label>Telpon Instansi</label>
                    <input type="text" name="edit_telp_instansi" class="form-control" placeholder="Telpon Instansi" id="edit_telp_instansi">
                </div>
                <div class="mb-3">
                    <label>Logo Instansi</label>
                    <input type="file" name="edit_logo_instansi" class="form-control">
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