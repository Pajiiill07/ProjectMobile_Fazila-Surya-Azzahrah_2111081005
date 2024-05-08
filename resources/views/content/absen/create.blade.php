<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
  <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add New Posisi</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
      <form method="POST" action="/absen-backend" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" novalidate="novalidate">
          @csrf

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="pegawai">Pegawai</label>
              <select class="form-select text-capitalize @error('pegawai_id') is-invalid @enderror" name="pegawai_id">
                  <option value="">Pilih Pegawai</option>
                      @foreach ($pegawais as $pgw)
                          <option value="{{ $pgw->pegawai_id }}">{{ $pgw->nama_lengkap }}</option>
                      @endforeach
              </select>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control flatpickr-input @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir')}}" placeholder="YYYY-MM-DD" id="tanggal_lahir">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="jam_datang" class="form-label">Jam Datang</label>
            <input type="time" class="form-control flatpickr-input @error('jam_datang') is-invalid @enderror" name="jam_datang" value="{{ old('jam_datang')}}" placeholder="YYYY-MM-DD" id="jam_datang">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="jam_pulang" class="form-label">Jam Pulang</label>
            <input type="time" class="form-control flatpickr-input @error('jam_pulang') is-invalid @enderror" name="jam_pulang" value="{{ old('jam_pulang')}}" placeholder="YYYY-MM-DD" id="jam_pulang">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <small class="text-light fw-medium">Keterangan</small>
            <div class="form-check mt-3">
                <input class="form-check-input @error('keterangan') is-invalid @enderror" name="keterangan" value="Hadir" type="radio" id="keterangan_hadir">
                <label class="form-check-label" for="keterangan_hadir">
                    Hadir
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('keterangan') is-invalid @enderror" name="keterangan" value="Izin" type="radio" id="keterangan_izin">
                <label class="form-check-label" for="keterangan_izin">
                    Izin
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('keterangan') is-invalid @enderror" name="keterangan" value="Alfa" type="radio" id="keterangan_alfa">
                <label class="form-check-label" for="keterangan_alfa">
                    Alfa
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('keterangan') is-invalid @enderror" name="keterangan" value="Sakit" type="radio" id="keterangan_sakit">
                <label class="form-check-label" for="keterangan_sakit">
                    Sakit
                </label>
            </div>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>  

          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          <input type="hidden">
      </form>
  </div>
</div>