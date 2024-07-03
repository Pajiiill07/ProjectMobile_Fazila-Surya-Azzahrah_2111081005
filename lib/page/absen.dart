import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/widget/absenhistory.dart';
import 'package:frontend_projectmobile/widget/homeabsen.dart';
import 'package:shared_preferences/shared_preferences.dart';

class AbsenPage extends StatefulWidget {
  final Map<String, dynamic> dataPegawai;
  const AbsenPage({Key? key, required this.dataPegawai}) : super(key: key);

  @override
  State<AbsenPage> createState() => _AbsenPageState();
}

class _AbsenPageState extends State<AbsenPage> {
  String? token;

  @override
  void initState() {
    super.initState();
    _fetchToken();
  }

  Future<void> _fetchToken() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    String? retrievedToken = prefs.getString('token');
    setState(() {
      token = retrievedToken;
    });
  }

  void updateCheckInStatus(bool isCheckedIn) {
    setState(() {
      // Update the check-in status in this state
      // You can handle further logic based on isCheckedIn if needed
    });
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
              'Absen',
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
      body: SingleChildScrollView(
        padding: EdgeInsets.all(20),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.center,
          children: [
            Column(
              children: [
                CircleAvatar(
                  backgroundImage: NetworkImage(widget.dataPegawai['foto_profile']),
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
              padding: const EdgeInsets.only(top: 20, bottom: 20),
              child: token == null
                  ? CircularProgressIndicator()
                  : DailyAbsen(token: token!, updateCheckInStatus: updateCheckInStatus),
            ),
            Padding(
              padding: EdgeInsets.only(top: 5),
              child: token == null
                  ? CircularProgressIndicator()
                  : HistoryAbsen(dataPegawai: widget.dataPegawai, token: token!),
            ),
          ],
        ),
      ),
    );
  }
}
