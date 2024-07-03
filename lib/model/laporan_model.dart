class Laporan {
  final int laporanId;
  final int pegawaiId;
  final DateTime tanggalLaporan;
  final DateTime tanggalSubmit;
  final String judulLaporan;
  final String isiLaporan;

  Laporan({
    required this.laporanId,
    required this.pegawaiId,
    required this.tanggalLaporan,
    required this.tanggalSubmit,
    required this.judulLaporan,
    required this.isiLaporan
  });

  factory Laporan.fromJson(Map<String, dynamic> json) {
    return Laporan(
      laporanId: json['laporan_id'],
      pegawaiId: json['pegawai_id'],
      tanggalLaporan: DateTime.parse(json['tanggal_laporan']),
      tanggalSubmit: DateTime.parse(json['tanggal_submit']),
      judulLaporan: json['judul_laporan'],
      isiLaporan: json['isi_laporan'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'laporan_id': laporanId,
      'pegawai_id': pegawaiId,
      'tanggal_laporan': tanggalLaporan.toIso8601String(),
      'tanggal_submit': tanggalSubmit.toIso8601String(),
      'judul_laporan': judulLaporan,
      'isi_laporan': isiLaporan
    };
  }
}
