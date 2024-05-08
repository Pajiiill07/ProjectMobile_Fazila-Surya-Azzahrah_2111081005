<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasEditUserLabel" class="offcanvas-title">Update Gaji</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form method="POST" action="/gaji-backend/:id" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="EditGajiForm" novalidate="novalidate">
        @method('PUT')
        @csrf 
        <input type="hidden" name="gaji_id" id="gaji_id">
        <div class="mb-3 fv-plugins-icon-container">
          <label class="form-label" for="posisi">posisi</label>
          <select class="form-select text-capitalize @error('posisi_id') is-invalid @enderror" name="posisi_id">
              <option value="">Pilih posisi</option>
                  @foreach ($posisis as $pss)
                      <option value="{{ $pss->posisi_id }}">{{ $pss->nama_posisi }}</option>
                  @endforeach
          </select>
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

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
            <label class="form-label" for="periode_penggajian">Periode Penggajian</label>
            <input type="text" class="form-control @error('periode_penggajian') is-invalid @enderror" name="periode_penggajian" value="{{ old('periode_penggajian')}}" placeholder="periode penggajian perbulan">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      <input type="hidden"></form>
    </div>
  </div>