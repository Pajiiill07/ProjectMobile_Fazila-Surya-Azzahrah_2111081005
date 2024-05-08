  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
      <div class="offcanvas-header">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add New User</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body mx-0 flex-grow-0">
        <form method="POST" action="/user-backend" class="add-new-user pt-0 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
          @csrf
          <input type="hidden" name="user_id" id="user_id">
          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="username">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username')}}" placeholder="Username">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>
          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="email">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" placeholder="Email">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>
          <div class="mb-3 fv-plugins-icon-container">
              <label class="form-label" for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}" placeholder="Password">
              <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
          </div>
          <div class="mb-3 fv-plugins-icon-container">
            <label for="hak_akses" class="form-label">Hak Akses</label>
            <select class="form-select @error('hak_akses') is-invalid @enderror" name="hak_akses" id="hak_akses" aria-label="Default select example">
                <option value="" selected>Pilih hak akses</option>
                <option value="Admin" {{ old('hak_akses') == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="Keuangan" {{ old('hak_akses') == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                <option value="Manager" {{ old('hak_akses') == 'Manager' ? 'selected' : '' }}>Manager</option>
                <option value="Karyawan" {{ old('hak_akses') == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
            </select>
            <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
        </div>
          <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
          <input type="hidden">
      </form>      
      </div>
    </div>