<div class="modal fade" id="modalBuat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Data Instansi</h4>
            </div>
            <form class="upload-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nama Instansi</label>
                    <input type="text" name="nama_instansi" class="form-control" placeholder="Instansi">
                </div>
                <div class="mb-3">
                    <label>Nama Lembaga</label>
                    <input type="text" name="nama_lembaga" class="form-control" placeholder="Lembaga">
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat_instansi" class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label>Nama Kepala Instansi</label>
                    <input type="text" name="nama_kepala_instansi" class="form-control" placeholder="Kepala Instansi">
                </div>
                <div class="mb-3">
                    <label>NIP Instansi</label>
                    <input type="text" name="nip_instansi" class="form-control" placeholder="NIP Instansi">
                </div>
                <div class="mb-3">
                    <label>NPWP Instansi</label>
                    <input type="text" name="npwp_instansi"  id="tax-id" class="form-control" placeholder="NPWP Instansi">
                </div>
                <div class="mb-3">
                    <label>Email Instansi</label>
                    <input type="text" name="email_instansi" class="form-control" placeholder="Email Instansi">
                </div>
                <div class="mb-3">
                    <label>Telpon Instansi</label>
                    <input type="text" name="telp_instansi" class="form-control" placeholder="Telpon Instansi">
                </div>
                <div class="mb-3">
                    <label>Logo Instansi</label>
                    <input type="file" name="logo_instansi" class="form-control">
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