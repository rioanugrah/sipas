<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Unit Kerja</h4>
            </div>
            <form class="edit-upload-form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="edit_id" id="edit_id">
            <div class="modal-body">
                <div class="form-group">
                    <label>Unit Kerja</label>
                    <input type="text" name="edit_unit_kerja" class="form-control" id="edit_unit_kerja" placeholder="Unit Kerja">
                </div>
                <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" class="form-control" placeholder="Instansi" id="edit_instansi" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>