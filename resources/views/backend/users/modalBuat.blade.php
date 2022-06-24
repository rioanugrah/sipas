<div class="modal fade" id="modalBuat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Data Unit Kerja</h4>
            </div>
            <form class="upload-form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Instansi</label>
                    <input type="text" class="form-control" placeholder="Instansi" value="{{ $instansi }}" readonly>
                </div>
                <div class="form-group">
                    <label>Unit Kerja</label>
                    <select name="unit_kerja_id" class="form-control" id="">
                        <option value="">-- Pilih Unit Kerja --</option>
                        @foreach ($unit_kerja as $uk)
                        <option value="{{ $uk->id }}">{{ $uk->unit_kerja }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" name="email" class="form-control" placeholder="Email"> --}}
                </div>
                <div class="form-group">
                    <label>User Akses</label>
                    <select name="is_role" class="form-control" id="">
                        <option value="">-- Pilih Akses User --</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->nama_role }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" placeholder="Instansi" value="{{ auth()->user()->instansi->nama_instansi }}" readonly> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>