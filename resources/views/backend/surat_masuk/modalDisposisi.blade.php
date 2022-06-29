<div class="modal fade" id="modalDisposisi" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="titleDisposisi"></h6>
                {{-- <label class="badge badge-dark" style="font-size: 50%">#Disposisi</label> Disposisi Surat --}}
            </div>
            <form class="disposisi-form" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="disposisi_surat_masuk_id" id="disposisi_surat_masuk_id">
            <div class="modal-body">
                <table style="width: 100%">
                    <tr>
                        <th>Perihal</th>
                        <td id="disposisi_perihal"></td>
                    </tr>
                    <tr>
                        <th>Disposisi Kepada</th>
                        <td><select name="disposisi_kepada" id="disposisi_kepada" class="form-control">
                                <option>-- Disposisi Kepada --</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Isi Disposisi</th>
                        <td><textarea name="disposisi_keterangan" id="" class="form-control" cols="30" rows="5"></textarea></td>
                    </tr>
                </table>
                {{-- <div class="form-group">
                    <label>Perihal</label>
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>