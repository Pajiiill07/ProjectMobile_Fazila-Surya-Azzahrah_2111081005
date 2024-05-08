<?php
// Fungsi untuk mengembalikan kelas label berdasarkan hak akses pengguna
function getLabelClass($hak_akses) {
    switch($hak_akses) {
        case "Admin":
            return "badge bg-label-primary";
        case "Keuangan":
            return "badge bg-label-success";
        case "Manager":
            return "badge bg-label-info";
        default:
            return "badge bg-label-secondary"; // Atau beri label default jika hak akses tidak dikenali
    }
}
?>

<?php
function getLabelClass1($penilaian_absensi) {
    if ($penilaian_absensi >= 90) {
        return "badge bg-label-primary";
    } elseif ($penilaian_absensi >= 80) {
        return "badge bg-label-success";
    } elseif ($penilaian_absensi >= 70) {
        return "badge bg-label-info";
    } elseif ($penilaian_absensi >= 60) {
        return "badge bg-label-warning";
    } else {
        return "badge bg-label-secondary";
    }
}

function getLabelClass2($penilaian_pelaporan) {
    if ($penilaian_pelaporan >= 9) {
        return "badge bg-label-primary";
    } elseif ($penilaian_pelaporan >= 8) {
        return "badge bg-label-success";
    } elseif ($penilaian_pelaporan >= 7) {
        return "badge bg-label-info";
    } elseif ($penilaian_pelaporan >= 6) {
        return "badge bg-label-warning";
    } else {
        return "badge bg-label-secondary";
    }
}
?>

<?php
function getLabelClass3($status_pengajuan) {
    switch($status_pengajuan) {
        case "pending approval":
            return "badge bg-label-warning";
        case "approved":
            return "badge bg-label-success";
        case "rejected":
            return "badge bg-label-danger";
        default:
            return "badge bg-label-secondary"; // Atau beri label default jika status_pengajuan tidak dikenali
    }
}
?>


<?php
// Fungsi untuk mengembalikan kelas label berdasarkan keterangan
function getLabelClass4($keterangan) {
    switch($keterangan) {
        case "izin":
            return "badge bg-label-primary";
        case "hadir":
            return "badge bg-label-success";
        case "sakit":
            return "badge bg-label-info";
        case "alfa":
            return "badge bg-label-warning";
        default:
            return "badge bg-label-secondary"; // Atau beri label default jika hak akses tidak dikenali
    }
}
?>