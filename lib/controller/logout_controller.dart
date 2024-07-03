import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:frontend_projectmobile/page/login-page.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LogoutController {
  bool _isLoading = false;
  Api apiService = Api();

  Future<void> logout(BuildContext context) async {
    _isLoading = true;

    try {
      SharedPreferences pref = await SharedPreferences.getInstance();
      String? token = pref.getString('token');

      final response = await apiService.logout(token!);

      _isLoading = false;

      if (response['success'] == true) {
        await pref.remove('token');
        await pref.remove('data_pegawai');

        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text(response['message'] ?? 'Logout berhasil')),
        );

        Navigator.of(context).pushReplacement(
          MaterialPageRoute(builder: (context) => const LoginPage()),
        );
      } else {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text(response['message'] ?? 'Logout gagal')),
        );
      }
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Terjadi kesalahan selama logout')),
      );
    } finally {
      _isLoading = false;
    }
  }
}
