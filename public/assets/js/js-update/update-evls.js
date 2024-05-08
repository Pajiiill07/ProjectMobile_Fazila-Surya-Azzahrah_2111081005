document.addEventListener('DOMContentLoaded', function () {
    const updateButtons = document.querySelectorAll('.edit-record');
    updateButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        const evaluasiId = this.getAttribute('data-id');
        const form = document.getElementById('updateForm');
        const actionUrl = form.getAttribute('action').replace(':id', evaluasiId);
        form.setAttribute('action', actionUrl);
  
        form.reset(); // Reset form sebelum mengambil data baru
  
        fetch(`/evaluasi-backend/${evaluasiId}/edit`)
          .then(response => {
            if (!response.ok) {
              throw new Error('Respon jaringan tidak baik');
            }
            return response.json();
          })
          .then(data => {
            form.querySelector('input[name="evaluasi_id"]').value = data.evaluasi_id;
            form.querySelector('select[name="pegawai_id"]').value = data.pegawai_id;
            form.querySelector('input[name="tanggal_evaluasi"]').value = data.tanggal_evaluasi;
            form.querySelector('input[name="penilaian_absensi"]').value = data.penilaian_absensi;
            form.querySelector('input[name="penilaian_pelaporan"]').value = data.penilaian_pelaporan;
            form.querySelector('input[name="catatan_dan_komentar"]').value = data.catatan_dan_komentar;
          })
          .catch(error => console.error('Kesalahan saat mengambil evaluasi:', error));
      });
    });
  });
  