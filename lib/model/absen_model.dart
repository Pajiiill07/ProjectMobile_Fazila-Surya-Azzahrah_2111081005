class Absensi {
  final int absenId;
  final int pegawaiId;
  final DateTime tanggal;
  final String? jamDatang;
  final String? jamPulang;
  final String keterangan;

  Absensi({
    required this.absenId,
    required this.pegawaiId,
    required this.tanggal,
    this.jamDatang,
    this.jamPulang,
    required this.keterangan,
  });

  factory Absensi.fromJson(Map<String, dynamic> json) {
    return Absensi(
      absenId: json['absen_id'],
      pegawaiId: json['pegawai_id'],
      tanggal: DateTime.parse(json['tanggal']),
      jamDatang: json['jam_datang'],
      jamPulang: json['jam_pulang'],
      keterangan: json['keterangan'],
    );
  }
}
