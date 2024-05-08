<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
  <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add New Posisi</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body mx-0 flex-grow-0">
      <form method="POST" action="/pegawai-backend" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" id="addNewUserForm" novalidate="novalidate">
          @csrf

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="user">User</label>
              <select class="form-select text-capitalize @error('user_id') is-invalid @enderror" name="user_id">
                  <option value="">Pilih User</option>
                      @foreach ($users as $item)
                          <option value="{{ $item->user_id }}">{{ $item->username }}</option>
                      @endforeach
              </select>
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="posisi">Posisi</label>
            <select class="form-select text-capitalize @error('posisi_id') is-invalid @enderror" name="posisi_id">
                <option value="">Pilih Posisi</option>
                    @foreach ($posisis as $pss)
                        <option value="{{ $pss->posisi_id }}">{{ $pss->nama_posisi }}</option>
                    @endforeach
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="manager">Manager</label>
            <select class="form-select text-capitalize @error('manager_id') is-invalid @enderror" name="manager_id">
                <option value="">Pilih Manager</option>
                @foreach ($pegawais as $item)
                    @php
                        $selected = ($item->pegawai_id == $item->manager_id) ? 'selected' : '';
                    @endphp
                    <option value="{{ $item->pegawai_id }}" {{ $selected }}>{{ $item->nama_lengkap }}</option>
                @endforeach
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>        

          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" value="{{ old('nama_lengkap')}}" placeholder="nama lengkap">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="no_hp">Nomor Hp</label>
            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp')}}" placeholder="nomor handphone">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label class="form-label" for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="email">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat')}}" id="alamat" rows="3" placeholder="alamat"></textarea>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control flatpickr-input @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{ old('tanggal_lahir')}}" placeholder="YYYY-MM-DD" id="tanggal_lahir">
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <div class="mb-3 fv-plugins-icon-container">
            <small class="text-light fw-medium">Jenis Kelamin</small>
            <div class="form-check mt-3">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="P" type="radio" id="jenis_kelamin_perempuan">
                <label class="form-check-label" for="jenis_kelamin_perempuan">
                    Perempuan
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" value="L" type="radio" id="jenis_kelamin_laki">
                <label class="form-check-label" for="jenis_kelamin_laki">
                    Laki-laki
                </label>
            </div>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>        

        <div class="mb-3 fv-plugins-icon-container">
            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
            <select class="form-select @error('pendidikan_terakhir') is-invalid @enderror" name="pendidikan_terakhir" id="pendidikan_terakhir" aria-label="Default select example">
                <option value="" selected>Pilih pendidikan terakhir</option>
                <option value="SLTA" {{ old('pendidikan_terakhir') == 'SLTA' ? 'selected' : '' }}>SLTA</option>
                <option value="D3" {{ old('pendidikan_terakhir') == 'D3' ? 'selected' : '' }}>D3</option>
                <option value="D4/S1" {{ old('pendidikan_terakhir') == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                <option value="S2" {{ old('pendidikan_terakhir') == 'S2' ? 'selected' : '' }}>S2</option>
                <option value="S3" {{ old('pendidikan_terakhir') == 'S3' ? 'selected' : '' }}>S3</option>
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

        <div class="mb-3 fv-plugins-icon-container">
          <label for="formFile" class="form-label">Foto Profile</label>
          <input class="form-control @error('foto_profile') is-invalid @enderror" type="text" name="foto_profile" id="foto_profile">
          <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>

          <div class="mb-3 fv-plugins-icon-container">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control flatpickr-input @error('tanggal_mulai') is-invalid @enderror" name="tanggal_mulai" value="{{ old('tanggal_mulai')}}" placeholder="YYYY-MM-DD" id="tanggal_mulai" >
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>

          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          <input type="hidden">
      </form>
    

  </div>
</div>