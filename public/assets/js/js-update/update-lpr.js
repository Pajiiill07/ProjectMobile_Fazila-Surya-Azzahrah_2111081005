document.addEventListener('DOMContentLoaded', function () {
    const updateButtons = document.querySelectorAll('.edit-record');
    updateButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const laporanId = this.getAttribute('data-id');
            const form = document.getElementById('updateForm');
            const actionUrl = form.getAttribute('action').replace(':id', laporanId);
            form.setAttribute('action', actionUrl);

            form.reset();

            fetch(`/laporan-backend/${laporanId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    form.querySelector('input[name="laporan_id"]').value = data.laporan_id;
                    form.querySelector('select[name="pegawai_id"]').value = data.pegawai_id;
                    form.querySelector('input[name="tanggal_laporan"]').value = data.tanggal_laporan;
                    form.querySelector('input[name="tanggal_submit"]').value = data.tanggal_submit;
                    form.querySelector('input[name="judul_laporan"]').value = data.judul_laporan;
                    form.querySelector('textarea[name="isi_laporan"]').value = data.isi_laporan;
                })
                .catch(error => console.error('Error fetching laporan:', error));
        });
    });
});
