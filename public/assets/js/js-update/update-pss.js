document.addEventListener('DOMContentLoaded', function () {
    const updateButtons = document.querySelectorAll('.edit-record');
    updateButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const posisiId = this.getAttribute('data-id');
            const form = document.getElementById('updateForm');
            const actionUrl = form.getAttribute('action').replace(':id', posisiId);
            form.setAttribute('action', actionUrl);

            form.reset();

            fetch(`/posisi-backend/${posisiId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    form.querySelector('input[name="posisi_id"]').value = data.posisi_id;
                    form.querySelector('select[name="department_id"]').value = data.department_id;
                    form.querySelector('input[name="nama_posisi"]').value = data.nama_posisi;
                    form.querySelector('input[name="deskripsi"]').value = data.deskripsi;
                    form.querySelector('input[name="gaji_pokok"]').value = data.gaji_pokok;
                })
                .catch(error => console.error('Error fetching posisi:', error));
        });
    });
});
