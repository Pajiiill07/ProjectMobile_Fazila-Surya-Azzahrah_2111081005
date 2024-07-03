import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:frontend_projectmobile/widget/menusetting.dart';
import 'package:frontend_projectmobile/controller/logout_controller.dart';
import 'package:http/http.dart' as http;

class SettingPage extends StatefulWidget {
  final Map<String, dynamic> dataPegawai;
  const SettingPage({super.key, required this.dataPegawai});

  @override
  State<SettingPage> createState() => _SettingPageState();
}

class _SettingPageState extends State<SettingPage> {
  final LogoutController _logoutController = LogoutController();
  late Map<String, dynamic> _dataPegawai;

  @override
  void initState() {
    super.initState();
    _dataPegawai = widget.dataPegawai;
  }

  Future<void> _refreshDataPegawai() async {
    try {
      final response = await http.get(
        Uri.parse('${Api().urlApi}/pegawai/${_dataPegawai['id']}'),
        headers: {'Authorization': 'Bearer ${_dataPegawai['token']}'},
      );

      if (response.statusCode == 200) {
        final Map<String, dynamic> updatedPegawai = json.decode(response.body);
        setState(() {
          _dataPegawai = updatedPegawai;
        });
      } else {
        throw Exception('Failed to refresh data pegawai');
      }
    } catch (e) {
      // Handle the error
      print('Error refreshing data pegawai: $e');
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: PreferredSize(
        preferredSize: Size.fromHeight(56.0),
        child: ClipRRect(
          borderRadius: BorderRadius.only(
            bottomLeft: Radius.circular(20.0),
            bottomRight: Radius.circular(20.0),
          ),
          child: AppBar(
            title: Text(
              'Setting',
              style: TextStyle(
                fontFamily: 'Poppins',
                fontWeight: FontWeight.w500,
              ),
            ),
            centerTitle: true,
            backgroundColor: Color.fromRGBO(177, 178, 255, 1.0),
            foregroundColor: Color.fromRGBO(238, 241, 255, 1.0),
            elevation: 0,
          ),
        ),
      ),
      backgroundColor: Color.fromRGBO(238, 241, 255, 1.0),
      body: RefreshIndicator(
        onRefresh: _refreshDataPegawai,
        child: SingleChildScrollView(
          physics: AlwaysScrollableScrollPhysics(),
          child: Padding(
            padding: const EdgeInsets.fromLTRB(20, 30, 20, 30),
            child: Column(
              children: [
                Row(
                  children: [
                    Container(
                      width: 70,
                      height: 70,
                      decoration: BoxDecoration(
                        color: Colors.grey.shade300,
                        borderRadius: BorderRadius.circular(8.0),
                        image: DecorationImage(
                          image: NetworkImage(_dataPegawai['foto_profile']),
                          fit: BoxFit.cover,
                        ),
                      ),
                    ),
                    SizedBox(width: 20),
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          '${_dataPegawai['nama_lengkap']}',
                          style: TextStyle(
                            fontSize: 18,
                            fontWeight: FontWeight.bold,
                            fontFamily: 'Poppins',
                          ),
                        ),
                        Text(
                          '${_dataPegawai['posisi']['nama_posisi']}',
                          style: TextStyle(
                            fontSize: 12,
                            color: Colors.grey,
                            fontFamily: 'Poppins',
                          ),
                        ),
                      ],
                    ),
                  ],
                ),
                Padding(
                  padding: EdgeInsets.only(top: 50),
                  child: MenuSettings(dataPegawai: _dataPegawai),
                ),
                Padding(
                  padding: const EdgeInsets.only(top: 80),
                  child: SizedBox(
                    width: 370,
                    height: 50,
                    child: ElevatedButton(
                      onPressed: () async {
                        await _logoutController.logout(context);
                      },
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Color.fromRGBO(255, 170, 170, 1.0),
                        shape: RoundedRectangleBorder(
                          side: BorderSide(
                            width: 0,
                            style: BorderStyle.solid,
                            color: Color.fromRGBO(255, 170, 170, 1.0),
                          ),
                          borderRadius: BorderRadius.all(Radius.circular(15)),
                        ),
                      ),
                      child: Text(
                        "LOGOUT",
                        style: TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold,
                          fontSize: 16,
                          fontFamily: 'Poppins',
                        ),
                      ),
                    ),
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
