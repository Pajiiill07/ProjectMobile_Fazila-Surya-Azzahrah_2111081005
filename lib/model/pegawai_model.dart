import 'package:frontend_projectmobile/model/absen_model.dart';

import 'posisi_model.dart';
import 'gaji_model.dart';
import 'evaluasi_model.dart';

class Pegawai {
  int pegawai_id;
  int userId;
  int posisiId;
  int menagerId;
  String namaLengkap;
  String noHp;
  String email;
  String alamat;
  String tglLahir;
  String jenisKelamin;
  String tglMulai;
  String pendidikanTerahkir;
  String foto_profile;
  Posisi posisi;

  Pegawai({
    required this.pegawai_id,
    required this.userId,
    required this.posisiId,
    required this.menagerId,
    required this.namaLengkap,
    required this.noHp,
    required this.email,
    required this.alamat,
    required this.tglLahir,
    required this.jenisKelamin,
    required this.pendidikanTerahkir,
    required this.foto_profile,
    required this.tglMulai,
    required this.posisi
  });

  factory Pegawai.fromJson(Map<String, dynamic> json) {
    return Pegawai(
      pegawai_id: json['pegawai_id'],
      userId: json['user_id'],
      posisiId: json['posisi_id'],
      menagerId: json['manager_id'],
      namaLengkap: json['nama_depan'],
      noHp: json['no_hp'],
      email: json['email'],
      alamat: json['alamat'],
      tglLahir: json['tanggal_lahir'],
      jenisKelamin: json['jenis_kelamin'],
      pendidikanTerahkir: json['pendidilkan_terakhir'],
      foto_profile: json['foto_profile'],
      tglMulai: json['tanggal_mulai'],
      posisi: Posisi.fromJson(json['posisi'])
    );
  }
}
