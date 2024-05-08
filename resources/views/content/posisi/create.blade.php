<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add New Posisi</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form method="POST" action="/posisi-backend" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" novalidate="novalidate">
            @csrf

            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="department">Department</label>
                <select class="form-select text-capitalize @error('department_id') is-invalid @enderror" name="department_id">
                    <option value="">Pilih Department</option>
                        @foreach ($departments as $dpt)
                            <option value="{{ $dpt->department_id }}">{{ $dpt->nama_department }}</option>
                        @endforeach
                </select>
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>

            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="nama_posisi">Nama Posisi</label>
                <input type="text" class="form-control @error('nama_posisi') is-invalid @enderror" name="nama_posisi" value="{{ old('nama_posisi')}}" placeholder="nama posisi">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>

            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi')}}" placeholder="deskripsi posisi">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>

            <div class="mb-3 fv-plugins-icon-container">
                <label class="form-label" for="gaji_pokok">Gaji Pokok</label>
                <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok" value="{{ old('gaji_pokok')}}" placeholder="gaji_pokok posisi">
                <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
            </div>

            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            <input type="hidden">
        </form>
    </div>
</div>