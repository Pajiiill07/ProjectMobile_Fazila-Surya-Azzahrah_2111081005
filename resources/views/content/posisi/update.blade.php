<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEditUserLabel" class="offcanvas-title">Update Posisi</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form method="POST" action="/posisi-backend/:id" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="updateForm" novalidate="novalidate">
      @method('PUT')
      @csrf
      <input type="hidden" name="posisi_id" id="posisi_id">
      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="department">Department</label>
        <select class="form-select text-capitalize @error('department_id') is-invalid @enderror" name="department_id">
            <option value="">Pilih Department</option>
                @foreach ($departments as $dpt)
                    <option value="{{ $dpt->department_id}}">{{$dpt->nama_department}}</option>
                @endforeach
        </select>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="nama_posisi">Nama Posisi</label>
        <input type="text" class="form-control @error('nama_posisi') is-invalid @enderror" name="nama_posisi" >
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="gaji_pokok">Gaji Pokok</label>
        <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror" name="gaji_pokok">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
    </form>
  </div>
</div>
