import 'dart:convert';
import 'package:frontend_projectmobile/main.dart';
import 'package:frontend_projectmobile/model/absen_model.dart';
import 'package:frontend_projectmobile/model/cuti_model.dart';
import 'package:frontend_projectmobile/model/evaluasi_model.dart';
import 'package:frontend_projectmobile/model/gaji_model.dart';
import 'package:frontend_projectmobile/model/laporan_model.dart';
import 'package:frontend_projectmobile/model/user_model.dart';
import 'package:http/http.dart' as http;
import 'package:flutter/material.dart';
import 'package:shared_preferences/shared_preferences.dart';

class Api{
  final urlApi='http://10.126.14.234:8000/api';

  //login
  Future<Map<String, dynamic>> login(String email, String password) async {
    final url = Uri.parse('$urlApi/login');
    try {
      final response = await http.post(
        url,
        headers: <String, String>{
          'Content-Type': 'application/json',
        },
        body: jsonEncode(<String, String>{
          'email': email,
          'password': password,
        }),
      );

      if (response.statusCode == 200) {
        return jsonDecode(response.body);
      } else {
        throw Exception('Failed to login: ${response.statusCode}');
      }
    } catch (e) {
      print('Network error: $e');
      throw Exception('Network error');
    }
  }

  //logout
  Future<Map<String, dynamic>> logout(String token) async {
    try {
      final response = await http.post(
        Uri.parse('$urlApi/logout'),
        headers: <String, String>{
          'Content-Type': 'application/json',
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final responseData = jsonDecode(response.body);
        return responseData;
      } else {
        throw Exception('Gagal melakukan logout');
      }
    } catch (e) {
      throw Exception('Error jaringan');
    }
  }

  //editUser
  Future<Map<String, dynamic>> updateUser(String username, String email, String? password) async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    String? token = prefs.getString('token');

    if (token == null) {
      throw Exception('User is not logged in');
    }

    final response = await http.put(
      Uri.parse('$urlApi/user/me'),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token',
      },
      body: jsonEncode({
        'username': username,
        'email': email,
        'password': password,
      }),
    );

    if (response.statusCode == 200) {
      return jsonDecode(response.body);
    } else {
      throw Exception('Failed to update user: ${response.body}');
    }
  }

  Future<User> getUserData() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    String? token = prefs.getString('token');

    if (token == null) {
      throw Exception('User is not logged in');
    }

    final response = await http.get(
      Uri.parse('$urlApi/user/me'),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token',
      },
    );

    if (response.statusCode == 200) {
      final jsonData = jsonDecode(response.body);
      return User.fromJson(jsonData);
    } else {
      throw Exception('Failed to fetch user data: ${response.body}');
    }
  }

  //getDataPegawai
  Future<void> getDataPegawai(String token, BuildContext context) async {
    try {
      final response = await http.get(
        Uri.parse('$urlApi/pegawai/me'),
        headers: {
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final Map<String, dynamic> data = json.decode(response.body);

        if (data['status']) {
          Navigator.of(context).pushReplacement(
            MaterialPageRoute(
              builder: (context) => Sipeg(dataPegawai: data['data']),
            ),
          );
        } else {
          ScaffoldMessenger.of(context).showSnackBar(
            const SnackBar(content: Text('Failed to fetch pegawai data')),
          );
        }
      } else {
        print('Failed to fetch pegawai data: ${response.statusCode}');
        ScaffoldMessenger.of(context).showSnackBar(
          const SnackBar(content: Text('Failed to fetch pegawai data')),
        );
      }
    } catch (e) {
      print('Network error: $e');
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Network error')),
      );
    }
  }

  //updatePegawai
  Future<void> updatePegawai({
    required String token,
    required String namaLengkap,
    required String noHp,
    required String email,
    required String alamat,
    required String tanggalLahir,
    required String jenisKelamin,
    required String pendidikanTerakhir,
    required String fotoProfile,
    required String tanggalMulai,
  }) async {
    final updatedData = {
      'nama_lengkap': namaLengkap,
      'no_hp': noHp,
      'email': email,
      'alamat': alamat,
      'tanggal_lahir': tanggalLahir,
      'jenis_kelamin': jenisKelamin,
      'pendidikan_terakhir': pendidikanTerakhir,
      'foto_profile': fotoProfile,
      'tanggal_mulai': tanggalMulai,
    };

    try {
      final response = await http.put(
        Uri.parse('$urlApi/pegawai/me'),
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer $token',
        },
        body: jsonEncode(updatedData),
      );

      if (response.statusCode != 200) {
        throw Exception('Failed to update profile: ${response.reasonPhrase}');
      }
    } catch (e) {
      print('Error updating profile: $e');
      throw Exception('Failed to update profile');
    }
  }

  //checkin absen
  Future<Map<String, dynamic>> checkIn(String token) async {
    final DateTime now = DateTime.now();
    final String currentTime = '${now.hour}:${now.minute}:${now.second}';

    final response = await http.post(
      Uri.parse('$urlApi/absen/checkin'),
      headers: <String, String>{
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token',
      },
      body: jsonEncode(<String, String>{
        'jam_datang': currentTime,
        'keterangan': 'hadir',
      }),
    );

    if (response.statusCode == 201) {
      return jsonDecode(response.body); // Return the latest check-in data
    } else {
      throw Exception('Failed to check in: ${response.reasonPhrase}');
    }
  }

  Future<void> checkOut(String token, int absenId) async {
    final DateTime now = DateTime.now();
    final String currentTime = '${now.hour}:${now.minute}:${now.second}';

    final response = await http.put(
      Uri.parse('$urlApi/absen/checkout/$absenId'),
      headers: <String, String>{
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token',
      },
      body: jsonEncode(<String, String>{
        'jam_pulang': currentTime,
        'keterangan': 'hadir',
      }),
    );

    if (response.statusCode != 200) {
      throw Exception('Failed to check out: ${response.reasonPhrase}');
    }
  }

  //currentAbsen
  Future<Map<String, dynamic>> getCurrentAbsenStatus(String token) async {
    final url = Uri.parse('$urlApi/current-absen');
    final response = await http.get(
      url,
      headers: {
        'Authorization': 'Bearer $token',
        'Content-Type': 'application/json',
      },
    );

    if (response.statusCode == 200) {
      final Map<String, dynamic> responseData = json.decode(response.body);
      return {
        'isCheckedIn': responseData['isCheckedIn'] ?? false,
        'absenId': responseData['absenId'],
        'checkInTime': responseData['checkInTime'],
        'checkOutTime': responseData['checkOutTime'],
      };
    } else {
      throw Exception('Failed to load absen status');
    }
  }

  //getAbsen
  Future<List<Absensi>> getAbsenHistory(String token) async {
    try {
      final response = await http.get(
        Uri.parse('$urlApi/absen/me'),
        headers: {
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final data = jsonDecode(response.body);
        List<Absensi> absensiList = (data['data'] as List)
            .map((item) => Absensi.fromJson(item))
            .toList();
        return absensiList;
      } else {
        throw Exception('Failed to load attendance history: ${response.reasonPhrase}');
      }
    } catch (e) {
      print('Error fetching attendance history: $e');
      throw Exception('Network error: $e');
    }
  }

  //getGaji
  Future<List<Gaji>> getGajiHistory(String token) async {
    try {
      final response = await http.get(
        Uri.parse('$urlApi/gaji/me'),
        headers: {
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final data = jsonDecode(response.body);
        List<Gaji> gajiList = (data['data'] as List)
            .map((item) => Gaji.fromJson(item))
            .toList();
        return gajiList;
      } else {
        throw Exception('Failed to load salary history: ${response.reasonPhrase}');
      }
    } catch (e) {
      print('Error fetching salary history: $e');
      throw Exception('Network error: $e');
    }
  }

  //createLaporan
  Future<Laporan?> createLaporan(Laporan laporan) async {
    SharedPreferences pref = await SharedPreferences.getInstance();
    final token = pref.getString('token');

    final response = await http.post(
      Uri.parse('$urlApi/laporan'),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token',
      },
      body: jsonEncode(laporan.toJson()),
    );

    if (response.statusCode == 201) {
      return Laporan.fromJson(jsonDecode(response.body)['data']);
    } else {
      throw Exception('Failed to create laporan: ${response.reasonPhrase}');
    }
  }

  //getLaporan
  Future<List<Laporan>> getLaporanHistory(String token) async {
    try {
      final response = await http.get(
        Uri.parse('$urlApi/laporan/me'),
        headers: {
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final data = jsonDecode(response.body);
        List<Laporan> laporanList = (data['data'] as List)
            .map((item) => Laporan.fromJson(item))
            .toList();
        return laporanList;
      } else {
        throw Exception('Failed to load report history: ${response.reasonPhrase}');
      }
    } catch (e) {
      print('Error fetching report history: $e');
      throw Exception('Network error: $e');
    }
  }

  //createCuti
  Future<Cuti?> createCuti(Cuti cuti) async {
    SharedPreferences pref = await SharedPreferences.getInstance();
    final token = pref.getString('token');

    final response = await http.post(
      Uri.parse('$urlApi/cuti'),
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer $token',
      },
      body: jsonEncode(cuti.toJson()),
    );

    if (response.statusCode == 201) {
      return Cuti.fromJson(jsonDecode(response.body)['data']);
    } else {
      throw Exception('Failed to submit cuti request: ${response.reasonPhrase}');
    }
  }

  //getCuti
  Future<List<Cuti>> getCutiHistory(String token) async {
    try {
      final response = await http.get(
        Uri.parse('$urlApi/cuti/me'),
        headers: {
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final data = jsonDecode(response.body);
        List<Cuti> cutiList = (data['data'] as List)
            .map((item) => Cuti.fromJson(item))
            .toList();
        return cutiList;
      } else {
        throw Exception('Failed to load leave history: ${response.reasonPhrase}');
      }
    } catch (e) {
      print('Error fetching leave history: $e');
      throw Exception('Network error: $e');
    }
  }

  //getEvaluasi
  Future<List<Evaluasi>> getEvaluasiHistory(String token) async {
    try {
      final response = await http.get(
        Uri.parse('$urlApi/evaluasi/me'),
        headers: {
          'Authorization': 'Bearer $token',
        },
      );

      if (response.statusCode == 200) {
        final data = jsonDecode(response.body);
        List<Evaluasi> evaluasiList = (data['data'] as List)
            .map((item) => Evaluasi.fromJson(item))
            .toList();
        return evaluasiList;
      } else {
        throw Exception('Failed to load evaluation history: ${response.reasonPhrase}');
      }
    } catch (e) {
      print('Error fetching evaluation history: $e');
      throw Exception('Network error: $e');
    }
  }

}