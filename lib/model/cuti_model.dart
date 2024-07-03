class Cuti {
  final int cutiId;
  final int pegawaiId;
  final int jatahCuti;
  final DateTime tglMulai;
  final DateTime tglSelesai;
  final String alasan;
  final String statusPengajuan;

  Cuti({
    required this.cutiId,
    required this.pegawaiId,
    required this.jatahCuti,
    required this.tglMulai,
    required this.tglSelesai,
    required this.alasan,
    required this.statusPengajuan,
  });

  factory Cuti.fromJson(Map<String, dynamic> json) {
    return Cuti(
      cutiId: json['cuti_id'],
      pegawaiId: json['pegawai_id'],
      jatahCuti: json['jatah_cuti'],
      tglMulai: DateTime.parse(json['tanggal_mulai']),
      tglSelesai: DateTime.parse(json['tanggal_selesai']),
      alasan: json['alasan'],
      statusPengajuan: json['status_pengajuan'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'cuti_id': cutiId,
      'pegawai_id': pegawaiId,
      'jatah_cuti': jatahCuti,
      'tanggal_mulai': tglMulai.toIso8601String(),
      'tanggal_selesai': tglSelesai.toIso8601String(),
      'alasan': alasan,
      'status_pengajuan': statusPengajuan,
    };
  }
}
