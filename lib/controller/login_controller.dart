import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LoginController {
  final TextEditingController emailController = TextEditingController();
  final TextEditingController passwordController = TextEditingController();
  bool _isLoading = false;

  bool get isLoading => _isLoading;

  Future<void> loginUser(BuildContext context) async {
    _isLoading = true;

    try {
      final response = await Api().login(
        emailController.text.trim(),
        passwordController.text.trim(),
      );

      if (response['success']) {
        SharedPreferences pref = await SharedPreferences.getInstance();
        pref.setString('token', response['token']);

        await Api().getDataPegawai(response['token'], context);
      } else {
        _isLoading = false;

        showDialog(
          context: context,
          builder: (context) => AlertDialog(
            title: const Text('Login Gagal'),
            content: Text(response['message']),
            actions: <Widget>[
              TextButton(
                onPressed: () => Navigator.pop(context),
                child: const Text('OK'),
              ),
            ],
          ),
        );
      }
    } catch (e) {
      _isLoading = false;

      showDialog(
        context: context,
        builder: (context) => AlertDialog(
          title: const Text('Error'),
          content: const Text('Terjadi kesalahan jaringan. Silakan coba lagi.'),
          actions: <Widget>[
            TextButton(
              onPressed: () => Navigator.pop(context),
              child: const Text('OK'),
            ),
          ],
        ),
      );
    }
  }
}
