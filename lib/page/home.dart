import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:frontend_projectmobile/model/department_model.dart';
import 'package:frontend_projectmobile/widget/latestevaluasi.dart';
import 'package:frontend_projectmobile/widget/leaveoverview.dart';
import 'package:frontend_projectmobile/widget/menuhome.dart';
import 'package:frontend_projectmobile/widget/slidedepartment.dart';
import 'package:http/http.dart' as http;
import 'package:intl/intl.dart';

class HomePage extends StatefulWidget {
  final Map<String, dynamic> dataPegawai;
  const HomePage({super.key, required this.dataPegawai});

  @override
  State<HomePage> createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  List<Department> departments = [];
  bool isLoading = true;

  Future<List<Department>> getDepartment() async {
    final response = await http.get(Uri.parse('${Api().urlApi}/department'));

    if (response.statusCode == 200) {
      final Map<String, dynamic> responseData = json.decode(response.body);
      if (responseData['status']) {
        final List<dynamic> data = responseData['data'];
        return data.map((item) => Department.fromJson(item)).toList();
      } else {
        throw Exception('Failed to load data');
      }
    } else {
      throw Exception('Failed to load data');
    }
  }

  @override
  void initState() {
    super.initState();
    fetchDepartmentData();
  }

  void fetchDepartmentData() async {
    try {
      List<Department> fetchedDepartments = await getDepartment();
      setState(() {
        departments = fetchedDepartments;
        isLoading = false;
      });
    } catch (error) {
      print('Error fetching department data: $error');
      setState(() {
        isLoading = false;
      });
    }
  }

  Stream<DateTime> _currenttime() {
    return Stream<DateTime>.periodic(Duration(seconds: 1), (_) => DateTime.now());
  }

  @override
  Widget build(BuildContext context) {
    // Debug print to check the structure of dataPegawai
    print('dataPegawai: ${widget.dataPegawai}');
    print('Type of dataPegawai: ${widget.dataPegawai.runtimeType}');

    return Scaffold(
      appBar: PreferredSize(
        preferredSize: Size.fromHeight(56.0),
        child: ClipRRect(
          borderRadius: BorderRadius.only(
            bottomLeft: Radius.circular(20.0),
            bottomRight: Radius.circular(20.0),
          ),
          child: AppBar(
            backgroundColor: Color.fromRGBO(177, 178, 255, 1.0),
            foregroundColor: Color.fromRGBO(238, 241, 255, 1.0),
            elevation: 0,
            actions: [
              IconButton(onPressed: () {}, icon: Icon(Icons.search_rounded)),
              IconButton(onPressed: () {}, icon: Icon(Icons.notifications_none_rounded)),
            ],
            leading: Padding(
              padding: const EdgeInsets.only(left: 20),
              child: CircleAvatar(
                backgroundImage: NetworkImage(widget.dataPegawai['foto_profile']),
              ),
            ),
          ),
        ),
      ),
      backgroundColor: Color.fromRGBO(238, 241, 255, 1.0),
      body: SingleChildScrollView(
        child: Padding(
          padding: EdgeInsets.all(20),
          child: Column(
            children: [
              Row(
                children: [
                  Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        '${widget.dataPegawai['nama_lengkap']}',
                        style: TextStyle(
                          color: Color.fromRGBO(22, 22, 22, 1.0),
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
                          fontWeight: FontWeight.w600,
                          fontFamily: 'Poppins',
                        ),
                      ),
                    ],
                  ),
                  Spacer(),
                  StreamBuilder(
                    stream: _currenttime(),
                    builder: (context, snapshot) {
                      if (snapshot.connectionState == ConnectionState.active) {
                        final DateTime now = snapshot.data!;
                        final String formatDate = DateFormat('EE, d MMMM y').format(now);
                        final String formatTime = DateFormat('hh:mm:ss').format(now);

                        return Column(
                          mainAxisAlignment: MainAxisAlignment.start,
                          crossAxisAlignment: CrossAxisAlignment.end,
                          children: [
                            SizedBox(height: 6),
                            Text(
                              formatDate,
                              style: TextStyle(
                                color: Color.fromRGBO(22, 22, 22, 1.0),
                                fontSize: 12,
                                fontWeight: FontWeight.w700,
                                fontFamily: 'Poppins',
                              ),
                            ),
                            SizedBox(height: 8),
                            Text(
                              formatTime + " WIB",
                              style: TextStyle(
                                color: Color.fromRGBO(150, 150, 150, 1.0),
                                fontSize: 12,
                                fontWeight: FontWeight.w600,
                                fontFamily: 'Poppins',
                              ),
                            ),
                          ],
                        );
                      } else {
                        return CircularProgressIndicator();
                      }
                    },
                  ),
                ],
              ),
              Padding(
                padding: const EdgeInsets.only(top: 35),
                child: isLoading
                    ? Center(child: CircularProgressIndicator())
                    : SlideDpt(departments: departments),
              ),
              Padding(
                padding: const EdgeInsets.only(top: 35),
                child: LeaveOview(),
              ),
              Padding(
                padding: const EdgeInsets.only(top: 35),
                // child: LatestEvaluasi(
                //   valueAbsensi: widget.dataPegawai['evaluasi']['penilaian_absensi'],
                //   valueLaporan: widget.dataPegawai['evaluasi']['penilaian_pelaporan'],
                // ),
              ),
              Padding(
                padding: const EdgeInsets.only(top: 35, bottom: 80),
                child: MenuHome(dataPegawai: widget.dataPegawai),
              )
            ],
          ),
        ),
      ),
    );
  }
}
