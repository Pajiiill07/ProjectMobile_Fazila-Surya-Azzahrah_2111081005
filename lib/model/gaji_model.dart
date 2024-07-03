class Gaji {
  final String periodePenggajian;
  final int gajiPokok;
  final int bonus;
  final int tunjangan;
  final int potongan;
  final int pph;

  Gaji({
    required this.periodePenggajian,
    required this.gajiPokok,
    required this.bonus,
    required this.tunjangan,
    required this.potongan,
    required this.pph,
  });

  factory Gaji.fromJson(Map<String, dynamic> json) {
    return Gaji(
      periodePenggajian: json['periode_penggajian'],
      gajiPokok: json['gaji_pokok'],
      bonus: json['bonus'],
      tunjangan: json['tunjangan'],
      potongan: json['potongan'],
      pph: json['pph'],
    );
  }
}
