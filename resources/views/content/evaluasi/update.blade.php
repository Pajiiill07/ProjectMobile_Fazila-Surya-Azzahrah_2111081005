<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditEvaluasi" aria-labelledby="offcanvasEditUserLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEditUserLabel" class="offcanvas-title">Update Evaluasi</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form method="POST" action="/evaluasi-backend/:id" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="updateForm" novalidate="novalidate">
      @method('PUT')
      @csrf
      <input type="hidden" name="evaluasi_id" id="evaluasi_id">
      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="pegawai">Pegawai</label>
        <select class="form-select text-capitalize @error('pegawai_id') is-invalid @enderror" name="pegawai_id">
            <option value="">Pilih pegawai</option>
                @foreach ($pegawais as $dpt)
                    <option value="{{ $dpt->pegawai_id}}">{{$dpt->nama_lengkap}}</option>
                @endforeach
        </select>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="tanggal_evaluasi">Tanggal evaluasi</label>
        <input type="date" class="form-control @error('tanggal_evaluasi') is-invalid @enderror" name="tanggal_evaluasi" >
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="penilaian_absensi">penilaian_absensi</label>
        <input type="text" class="form-control @error('penilaian_absensi') is-invalid @enderror" name="penilaian_absensi">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="penilaian_pelaporan">penilaian_pelaporan</label>
        <input type="text" class="form-control @error('penilaian_pelaporan') is-invalid @enderror" name="penilaian_pelaporan">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="catatan_dan_komentar">catatan_dan_komentar</label>
        <input type="text" class="form-control @error('catatan_dan_komentar') is-invalid @enderror" name="catatan_dan_komentar">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
    </form>
  </div>
</div>
