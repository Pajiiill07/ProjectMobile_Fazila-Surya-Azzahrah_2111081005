<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
  <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add New Posisi</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
      <form method="POST" action="/laporan-backend" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" novalidate="novalidate">
          @csrf

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="department">Pegawai</label>
              <select class="form-select text-capitalize @error('pegawai_id') is-invalid @enderror" name="pegawai_id">
                  <option value="">Pilih Pegawai</option>
                      @foreach ($pegawais as $pgw)
                          <option value="{{ $pgw->pegawai_id }}">{{ $pgw->nama_lengkap }}</option>
                      @endforeach
              </select>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="tanggal_laporan" class="form-label">Tanggal Laporan</label>
            <input type="date" class="form-control flatpickr-input @error('tanggal_laporan') is-invalid @enderror" name="tanggal_laporan" value="{{ old('tanggal_laporan')}}" placeholder="YYYY-MM-DD" id="tanggal_laporan">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="tanggal_submit" class="form-label">Tanggal Submit</label>
            <input type="date" class="form-control flatpickr-input @error('tanggal_submit') is-invalid @enderror" name="tanggal_submit" value="{{ old('tanggal_submit')}}" placeholder="YYYY-MM-DD" id="tanggal_submit">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="judul_laporan">Judul Laporan</label>
              <input type="text" class="form-control @error('judul_laporan') is-invalid @enderror" name="judul_laporan" value="{{ old('judul_laporan')}}" placeholder="nama posisi">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="isi_laporan" class="form-label">Isi Laporan</label>
            <textarea class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan" value="{{ old('isi_laporan')}}" id="isi_laporan" rows="4" placeholder="isi_laporan"></textarea>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          <input type="hidden">
      </form>
  </div>
</div>