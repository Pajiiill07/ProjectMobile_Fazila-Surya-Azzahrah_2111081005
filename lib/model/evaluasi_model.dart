class Evaluasi {
  final int evaluasiId;
  final int pegawaiId;
  final DateTime tanggalEvaluasi;
  final int penilaianAbsensi;
  final int penilaianLaporan;
  final String catatanKomentar;

  Evaluasi({
    required this.evaluasiId,
    required this.pegawaiId,
    required this.tanggalEvaluasi,
    required this.penilaianAbsensi,
    required this.penilaianLaporan,
    required this.catatanKomentar
  });

  factory Evaluasi.fromJson(Map<String, dynamic> json){
    return Evaluasi(
      evaluasiId: json['evaluasi_id'],
      pegawaiId: json['pegawai_id'],
      tanggalEvaluasi: json['tanggal_evaluasi'],
      penilaianAbsensi: json['penilaian_absensi'],
      penilaianLaporan: json['penilaian_pelaporan'],
      catatanKomentar: json['catatan_dan_komentar'],
    );
  }

  Map<String, dynamic> toJson(){
    return {
      'evaluasi_id' : evaluasiId,
      'pegawai_id' : pegawaiId,
      'tanggal_evaluasi' : tanggalEvaluasi,
      'penilaian_absensi' : penilaianAbsensi,
      'penilaian_pelaporan' : penilaianLaporan,
      'catatan_dan_komentar' : catatanKomentar
    };
  }
}