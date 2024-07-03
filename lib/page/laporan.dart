import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/widget/formlaporan.dart';
import 'package:shared_preferences/shared_preferences.dart';

class LaporanPage extends StatefulWidget {
  final Map<String, dynamic> dataPegawai;

  const LaporanPage({super.key, required this.dataPegawai});

  @override
  State<LaporanPage> createState() => _LaporanPageState();
}

class _LaporanPageState extends State<LaporanPage> {
  late Future<String?> _tokenFuture;

  @override
  void initState() {
    super.initState();
    _tokenFuture = _fetchToken();
  }

  Future<String?> _fetchToken() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    return prefs.getString('token');
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
              'Laporan',
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
      body: FutureBuilder<String?>(
        future: _tokenFuture,
        builder: (context, snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return Center(child: CircularProgressIndicator());
          } else if (snapshot.hasError) {
            return Center(child: Text('Error: ${snapshot.error}'));
          } else if (!snapshot.hasData || snapshot.data == null) {
            return Center(child: Text('Token not found'));
          } else {
            final token = snapshot.data!;
            return SingleChildScrollView(
              child: Padding(
                padding: const EdgeInsets.all(20),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Column(
                      children: [
                        CircleAvatar(
                          backgroundImage: NetworkImage(
                            widget.dataPegawai['foto_profile'],
                          ),
                          radius: 30,
                          backgroundColor: Colors.grey,
                        ),
                        SizedBox(height: 10),
                        Text(
                          '${widget.dataPegawai['nama_lengkap']}',
                          style: TextStyle(
                            fontSize: 20,
                            fontWeight: FontWeight.bold,
                            fontFamily: 'Poppins',
                          ),
                        ),
                        Text(
                          '${widget.dataPegawai['posisi']['nama_posisi']}',
                          style: TextStyle(
                            color: Color.fromRGBO(150, 150, 150, 1.0),
                            fontSize: 12,
                            fontWeight: FontWeight.w500,
                            fontFamily: 'Poppins',
                          ),
                        ),
                      ],
                    ),
                    Padding(
                      padding: EdgeInsets.only(top: 25),
                      child: FormLaporan(
                        dataPegawai: widget.dataPegawai,
                        token: token,
                      ),
                    ),
                  ],
                ),
              ),
            );
          }
        },
      ),
    );
  }
}
