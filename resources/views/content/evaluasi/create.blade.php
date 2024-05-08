<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
  <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add New Evaluasi</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
      <form method="POST" action="/evaluasi-backend" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" novalidate="novalidate">
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
            <label for="tanggal_evaluasi" class="form-label">Tanggal Evaluasi</label>
            <input type="date" class="form-control flatpickr-input @error('tanggal_evaluasi') is-invalid @enderror" name="tanggal_evaluasi" value="{{ old('tanggal_evaluasi')}}" placeholder="YYYY-MM-DD" id="tanggal_evaluasi">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="penilaian_absensi">Penilaian Absensi</label>
              <input type="text" class="form-control @error('penilaian_absensi') is-invalid @enderror" name="penilaian_absensi" value="{{ old('penilaian_absensi')}}" >
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="penilaian_pelaporan">Penilaian Laporan</label>
            <input type="text" class="form-control @error('penilaian_pelaporan') is-invalid @enderror" name="penilaian_pelaporan" value="{{ old('penilaian_pelaporan')}}" >
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="catatan_dan_komentar">Catatan dan Komentar</label>
            <input type="text" class="form-control @error('catatan_dan_komentar') is-invalid @enderror" name="catatan_dan_komentar" value="{{ old('catatan_dan_komentar')}}" >
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          <input type="hidden">
      </form>
  </div>
</div>