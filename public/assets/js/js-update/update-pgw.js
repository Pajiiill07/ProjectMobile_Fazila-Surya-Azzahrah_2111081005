document.addEventListener('DOMContentLoaded', function () {
    const updateButtons = document.querySelectorAll('.edit-record');
    updateButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const pegawaiId = this.getAttribute('data-id');
            const form = document.getElementById(`updateFormPegawai`);
            const actionUrl = form.getAttribute('action').replace(':id', pegawaiId);
            form.setAttribute('action', actionUrl);

            form.reset();

            fetch(`/pegawai-backend/${pegawaiId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    form.querySelector('input[name="pegawai_id"]').value = data.pegawai_id;
                    form.querySelector('select[name="user_id"]').value = data.user_id;
                    form.querySelector('select[name="posisi_id"]').value = data.posisi_id;
                    form.querySelector('select[name="manager_id"]').value = data.manager_id;
                    form.querySelector('input[name="nama_lengkap"]').value = data.nama_lengkap;
                    form.querySelector('input[name="no_hp"]').value = data.no_hp;
                    form.querySelector('input[name="email"]').value = data.email;
                    form.querySelector('textarea[name="alamat"]').value = data.alamat;
                    form.querySelector('input[name="tanggal_lahir"]').value = data.tanggal_lahir;
                    
                    // Handling Radio Buttons
                    const jenisKelaminRadios = form.querySelectorAll('input[type="radio"][name="jenis_kelamin"]');
                    jenisKelaminRadios.forEach(radio => {
                        radio.checked = radio.value === data.jenis_kelamin;
                    });

                    form.querySelector('select[name="pendidikan_terakhir"]').value = data.pendidikan_terakhir;
                    form.querySelector('input[name="foto_profile"]').value = data.foto_profile;
                    form.querySelector('input[name="tanggal_mulai"]').value = data.tanggal_mulai;
                })
                .catch(error => console.error('Error fetching pegawai:', error));
        });
    });
});
