import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:frontend_projectmobile/model/absen_model.dart';

class HistoryAbsen extends StatelessWidget {
  final Map<String, dynamic> dataPegawai;
  final String token;

  HistoryAbsen({Key? key, required this.dataPegawai, required this.token}) : super(key: key);

  String getMonthName(int month) {
    const List<String> monthNames = [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];
    return monthNames[month - 1];
  }

  Future<void> refresh() async{
    await Api().getCutiHistory(token);
  }

  Color getStatusColor(String keterangan) {
    switch (keterangan.toLowerCase()) {
      case 'hadir':
        return Color.fromRGBO(74, 191, 72, 1.0);
      case 'sakit':
        return Color.fromRGBO(212, 178, 0, 1.0);
      case 'izin':
        return Color.fromRGBO(255, 170, 170, 1.0);
      default:
        return Color.fromRGBO(96, 96, 96, 1.0);
    }
  }

  @override
  Widget build(BuildContext context) {
    return RefreshIndicator(
      onRefresh: refresh,
      child: Container(
        height: 380,
        width: double.maxFinite,
        padding: EdgeInsets.fromLTRB(20, 20, 20, 0),
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(20),
          boxShadow: [
            BoxShadow(
              color: Colors.black12,
              blurRadius: 10,
              offset: Offset(0, 5),
            ),
          ],
        ),
        child: FutureBuilder<List<Absensi>>(
          future: Api().getAbsenHistory(token),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.waiting) {
              return Center(child: CircularProgressIndicator());
            } else if (snapshot.hasError) {
              return Center(child: Text('Error: ${snapshot.error}'));
            } else if (!snapshot.hasData || snapshot.data!.isEmpty) {
              return Center(child: Text('No data available'));
            } else {
              final absenHistory = snapshot.data!;
              return ListView.builder(
                itemCount: absenHistory.length,
                itemBuilder: (context, index) {
                  final absen = absenHistory[index];

                  // Parse the date
                  DateTime parsedDate = absen.tanggal;
                  String day = parsedDate.day.toString();
                  String month = getMonthName(parsedDate.month); // Get month name

                  return Card(
                    margin: EdgeInsets.fromLTRB(25, 5, 25, 10),
                    child: Container(
                      height: 100,
                      width: double.maxFinite,
                      decoration: BoxDecoration(
                        color: Color.fromRGBO(229, 233, 255, 1.0),
                        borderRadius: BorderRadius.circular(8),
                      ),
                      child: Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.spaceAround,
                          children: [
                            Container(
                              height: 65,
                              width: 55,
                              decoration: BoxDecoration(
                                color: Color.fromRGBO(135, 137, 255, 1.0),
                                borderRadius: BorderRadius.circular(5),
                              ),
                              child: Column(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: [
                                  Text(
                                    day,
                                    style: TextStyle(
                                      color: Colors.white,
                                      fontSize: 20,
                                      fontWeight: FontWeight.w600,
                                      fontFamily: 'Poppins',
                                    ),
                                  ),
                                  Text(
                                    month,
                                    style: TextStyle(
                                      color: Colors.white,
                                      fontSize: 11,
                                      fontFamily: 'Poppins',
                                    ),
                                  ),
                                ],
                              ),
                            ),
                            Column(
                              mainAxisAlignment: MainAxisAlignment.center,
                              children: [
                                Row(
                                  mainAxisAlignment: MainAxisAlignment.center,
                                  children: [
                                    Column(
                                      mainAxisAlignment: MainAxisAlignment.center,
                                      children: [
                                        Text(
                                          absen.jamDatang != null ? absen.jamDatang! : 'N/A',
                                          style: TextStyle(
                                            fontSize: 17,
                                            fontWeight: FontWeight.w600,
                                            fontFamily: 'Poppins',
                                            color: Color.fromRGBO(86, 87, 173, 1.0),
                                          ),
                                        ),
                                        Text(
                                          'Clock In',
                                          style: TextStyle(
                                            color: Colors.grey,
                                            fontFamily: 'Poppins',
                                            fontSize: 13,
                                            fontWeight: FontWeight.w500,
                                          ),
                                        ),
                                      ],
                                    ),
                                    SizedBox(width: 10),
                                    SizedBox(
                                      height: 40,
                                      child: VerticalDivider(
                                        color: Colors.grey,
                                        thickness: 1,
                                      ),
                                    ),
                                    SizedBox(width: 10),
                                    Column(
                                      mainAxisAlignment: MainAxisAlignment.center,
                                      children: [
                                        Text(
                                          absen.jamPulang != null ? absen.jamPulang! : 'N/A',
                                          style: TextStyle(
                                            fontSize: 17,
                                            fontWeight: FontWeight.w600,
                                            fontFamily: 'Poppins',
                                            color: Color.fromRGBO(86, 87, 173, 1.0),
                                          ),
                                        ),
                                        Text(
                                          'Clock Out',
                                          style: TextStyle(
                                            color: Colors.grey,
                                            fontFamily: 'Poppins',
                                            fontSize: 13,
                                            fontWeight: FontWeight.w500,
                                          ),
                                        ),
                                      ],
                                    ),
                                  ],
                                ),
                                Padding(
                                  padding: const EdgeInsets.only(top : 8),
                                  child: Text(
                                    absen.keterangan,
                                    style: TextStyle(
                                      fontFamily: 'Poppins',
                                      fontSize: 13,
                                      color: getStatusColor(absen.keterangan),
                                      fontWeight: FontWeight.w600,
                                    ),
                                  ),
                                ),
                              ],
                            )
                          ],
                        ),
                      ),
                    ),
                  );
                },
              );
            }
          },
        ),
      ),
    );
  }
}
