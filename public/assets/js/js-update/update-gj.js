document.addEventListener('DOMContentLoaded', function () {
    const updateButtons = document.querySelectorAll('.edit-record');
    updateButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        const gajiId = this.getAttribute('data-id');
        const form = document.getElementById('EditGajiForm');
        const actionUrl = form.getAttribute('action').replace(':id', gajiId);
        form.setAttribute('action', actionUrl);
  
        form.reset(); // Reset form sebelum mengambil data baru
  
        fetch(`/gaji-backend/${gajiId}/edit`)
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.json();
          })
          .then(data => {
            form.querySelector('input[name="gaji_id"]').value = data.gaji_id;
            form.querySelector('select[name="posisi_id"]').value = data.posisi_id;
            form.querySelector('select[name="pegawai_id"]').value = data.pegawai_id;
            form.querySelector('input[name="periode_penggajian"]').value = data.periode_penggajian;
          })
          .catch(error => console.error('Error fetching gaji:', error));
      });
    });
  });
