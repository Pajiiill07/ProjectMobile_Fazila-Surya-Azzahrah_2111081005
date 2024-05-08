<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasEditUserLabel" class="offcanvas-title">Update Laporan</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
    <form method="POST" action="/laporan-backend/:id" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="updateForm" novalidate="novalidate">
      @method('PUT')
      @csrf
      <input type="hidden" name="laporan_id" id="laporan_id">
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
        <label class="form-label" for="tanggal_laporan">Tanggal Laporan</label>
        <input type="date" class="form-control @error('tanggal_laporan') is-invalid @enderror" name="tanggal_laporan" >
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="tanggal_submit">Tanggal Laporan</label>
        <input type="date" class="form-control @error('tanggal_submit') is-invalid @enderror" name="tanggal_submit" >
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="judul_laporan">Judul Laporan</label>
        <input type="text" class="form-control @error('judul_laporan') is-invalid @enderror" name="judul_laporan">
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <div class="mb-3 fv-plugins-icon-container">
        <label class="form-label" for="isi_laporan">Isi Laporan</label>
        <textarea class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan" rows="3"></textarea>
        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
      </div>

      <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
      <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
    </form>
  </div>
</div>
