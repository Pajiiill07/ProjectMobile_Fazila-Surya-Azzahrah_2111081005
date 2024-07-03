class Posisi{
  final int posisiId;
  final int departmentId;
  final String namaPosisi;
  final String deskripsi;
  final int gajiPokok;

  Posisi({
    required this.posisiId,
    required this.departmentId,
    required this.namaPosisi,
    required this.deskripsi,
    required this.gajiPokok
  });

  factory Posisi.fromJson(Map<String, dynamic> json){
    return Posisi(
      posisiId: json['posisi_id'],
      departmentId: json['department_id'],
      namaPosisi: json['nama_posisi'],
      deskripsi: json['deskripsi'],
      gajiPokok: json['gaji_pokok'],
    );
  }
  Map<String, dynamic> toJson(){
    return {
      'posisi_id' : posisiId,
      'department_id' : departmentId,
      'nama_posisi' : namaPosisi,
      'deskripsi' : deskripsi,
      'gaji_pokok' : gajiPokok
    };
  }
}