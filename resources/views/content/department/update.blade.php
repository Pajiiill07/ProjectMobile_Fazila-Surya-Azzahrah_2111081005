<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEditUserLabel" class="offcanvas-title">Update Department</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form method="POST" action="/department-backend/{{$item->department_id}}" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="updateForm" novalidate="novalidate">
      @method('PUT')
      @csrf
      <input type="hidden" name="department_id" id="department_id">
      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="nama_department">Nama Department</label>
        <input type="text" class="form-control @error('nama_department') is-invalid @enderror" name="nama_department" value="{{ trim($item->nama_department) }}" placeholder="nama department">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="deskripsi">Deskripsi</label>
        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ trim($item->deskripsi) }}" placeholder="deskripsi">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
    </form>
  </div>
</div>
