    function approveCuti(cutiId) {
        fetch(`/approve-cuti/${cutiId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Tampilkan data balasan dari server jika diperlukan
            alert('Pengajuan cuti berhasil disetujui');
            // Lakukan hal lain setelah pengajuan cuti disetujui, seperti menampilkan pesan sukses atau memuat ulang halaman
        })
        .catch(error => {
            console.error('Error approving cuti:', error);
            alert('Terjadi kesalahan saat menyetujui pengajuan cuti');
            // Lakukan hal lain jika terjadi kesalahan, seperti menampilkan pesan kesalahan
        });
    }

    function rejectCuti(cutiId) {
        fetch(`/reject-cuti/${cutiId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Tampilkan data balasan dari server jika diperlukan
            alert('Pengajuan cuti berhasil ditolak');
            // Lakukan hal lain setelah pengajuan cuti ditolak, seperti menampilkan pesan sukses atau memuat ulang halaman
        })
        .catch(error => {
            console.error('Error rejecting cuti:', error);
            alert('Terjadi kesalahan saat menolak pengajuan cuti');
            // Lakukan hal lain jika terjadi kesalahan, seperti menampilkan pesan kesalahan
        });
    }
