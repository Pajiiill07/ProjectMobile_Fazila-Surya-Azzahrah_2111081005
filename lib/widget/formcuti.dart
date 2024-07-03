import 'package:frontend_projectmobile/model/cuti_model.dart';
import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:intl/intl.dart';

class FormCuti extends StatelessWidget {
  final Map<String, dynamic> dataPegawai;
  final String token;
  FormCuti({Key? key, required this.dataPegawai, required this.token})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 2,
      child: Container(
        height: 480,
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
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            TabBar(
              indicatorColor: Color.fromRGBO(135, 137, 255, 1.0),
              labelColor: Color.fromRGBO(135, 137, 255, 1.0),
              unselectedLabelColor: Color.fromRGBO(96, 96, 96, 1.0),
              tabs: [
                Tab(
                  child: Text(
                    'Submit Request',
                    style: TextStyle(
                      fontSize: 14,
                      fontWeight: FontWeight.w600,
                      fontFamily: 'Poppins',
                    ),
                  ),
                ),
                Tab(
                  child: Text(
                    'Riwayat Cuti',
                    style: TextStyle(
                      fontSize: 14,
                      fontWeight: FontWeight.w600,
                      fontFamily: 'Poppins',
                    ),
                  ),
                ),
              ],
            ),
            Expanded(
              child: TabBarView(
                children: [
                  _buildSubmitCutiForm(context),
                  _buildRiwayatCuti(token),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildSubmitCutiForm(BuildContext context) {
    TextEditingController _startDateController = TextEditingController();
    TextEditingController _endDateController = TextEditingController();
    TextEditingController _reasonController = TextEditingController();

    void clearText(){
      _startDateController.clear();
      _endDateController.clear();
      _reasonController.clear();
    }

    bool _isValidDateFormat(String dateStr) {
      try {
        DateTime.parse(dateStr);
        return true;
      } catch (e) {
        return false;
      }
    }

    return Padding(
      padding: const EdgeInsets.all(20.0),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Row(
            children: [
              Expanded(
                child: SizedBox(
                  height: 50,
                  child: TextFormField(
                    decoration: InputDecoration(
                      filled: true,
                      fillColor: Color.fromRGBO(210, 218, 255, 0.5),
                      hintText: "DD/MM/YYYY",
                      hintStyle: TextStyle(
                        color: Color.fromRGBO(96, 96, 96, 1.0),
                        fontSize: 14,
                        fontWeight: FontWeight.normal,
                        fontFamily: 'Poppins',
                      ),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(15)),
                        borderSide: BorderSide.none,
                      ),
                    ),
                    readOnly: true,
                    controller: _startDateController,
                    onTap: () async {
                      DateTime? pickedDate = await showDatePicker(
                        context: context,
                        initialDate: DateTime.now(),
                        firstDate: DateTime(2000),
                        lastDate: DateTime(2101),
                      );

                      if (pickedDate != null) {
                        _startDateController.text =
                        "${pickedDate.year}-${pickedDate.month.toString().padLeft(2, '0')}-${pickedDate.day.toString().padLeft(2, '0')}";
                      }
                    },
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 10.0),
                child: Text(
                  "to",
                  style: TextStyle(
                    color: Color.fromRGBO(96, 96, 96, 1.0),
                    fontFamily: 'Poppins',
                  ),
                ),
              ),
              Expanded(
                child: SizedBox(
                  height: 50,
                  child: TextFormField(
                    decoration: InputDecoration(
                      filled: true,
                      fillColor: Color.fromRGBO(210, 218, 255, 0.5),
                      hintText: "DD/MM/YYYY",
                      hintStyle: TextStyle(
                        color: Color.fromRGBO(96, 96, 96, 1.0),
                        fontSize: 14,
                        fontWeight: FontWeight.normal,
                        fontFamily: 'Poppins',
                      ),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(15)),
                        borderSide: BorderSide.none,
                      ),
                    ),
                    readOnly: true,
                    controller: _endDateController,
                    onTap: () async {
                      DateTime? pickedDate = await showDatePicker(
                        context: context,
                        initialDate: DateTime.now(),
                        firstDate: DateTime(2000),
                        lastDate: DateTime(2101),
                      );

                      if (pickedDate != null) {
                        _endDateController.text =
                        "${pickedDate.year}-${pickedDate.month.toString().padLeft(2, '0')}-${pickedDate.day.toString().padLeft(2, '0')}";
                      }
                    },
                  ),
                ),
              ),
            ],
          ),
          SizedBox(height: 20),
          TextFormField(
            controller: _reasonController,
            maxLines: 8,
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(210, 218, 255, 0.5),
              hintText: "Tuliskan alasan anda disini...",
              hintStyle: TextStyle(
                color: Color.fromRGBO(96, 96, 96, 1.0),
                fontSize: 14,
                fontWeight: FontWeight.normal,
                fontFamily: 'Poppins',
              ),
              border: OutlineInputBorder(
                borderRadius: BorderRadius.all(Radius.circular(15)),
                borderSide: BorderSide.none,
              ),
            ),
          ),
          Padding(
            padding: const EdgeInsets.only(top: 20),
            child: SizedBox(
              width: double.infinity,
              height: 50,
              child: ElevatedButton(
                onPressed: () async {
                  try {
                    if (!_isValidDateFormat(_startDateController.text) ||
                        !_isValidDateFormat(_endDateController.text)) {
                      throw Exception('Invalid date format');
                    }

                    final cuti = Cuti(
                      cutiId: 0,
                      pegawaiId: dataPegawai['pegawai_id'],
                      jatahCuti: 0,
                      tglMulai: DateTime.parse(_startDateController.text),
                      tglSelesai: DateTime.parse(_endDateController.text),
                      alasan: _reasonController.text,
                      statusPengajuan: 'Pending Approval',
                    );
                    final result = await Api().createCuti(cuti);

                    if (result != null) {
                      ScaffoldMessenger.of(context).showSnackBar(
                        SnackBar(
                            content:
                            Text('Cuti submitted request successfully')),
                      );
                      clearText();
                    }
                  } catch (e) {
                    ScaffoldMessenger.of(context).showSnackBar(
                      SnackBar(
                          content: Text('Failed to submit cuti request: $e')),
                    );
                    clearText();
                  }
                },
                style: ElevatedButton.styleFrom(
                  primary: Color.fromRGBO(135, 137, 255, 1.0),
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.all(Radius.circular(15)),
                  ),
                ),
                child: Text(
                  "Submit Cuti",
                  style: TextStyle(
                    color: Colors.white,
                    fontWeight: FontWeight.w700,
                    fontSize: 14,
                    fontFamily: 'Poppins',
                  ),
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildRiwayatCuti(String token) {
    int calculateWorkingDays(DateTime start, DateTime end) {
      int count = 0;
      DateTime current = start;

      while (current.isBefore(end) || current.isAtSameMomentAs(end)) {
        if (current.weekday != DateTime.saturday &&
            current.weekday != DateTime.sunday) {
          count++;
        }
        current = current.add(Duration(days: 1));
      }

      return count;
    }

    Future<void> refresh() async{
      await Api().getCutiHistory(token);
    }

    Color getStatusColor(String status) {
      switch (status.toLowerCase()) {
        case 'approved':
          return Color.fromRGBO(74, 191, 72, 1.0);
        case 'pending approval':
          return Color.fromRGBO(212, 178, 0, 1.0);
        case 'rejected':
          return Color.fromRGBO(255, 170, 170, 1.0);
        default:
          return Color.fromRGBO(96, 96, 96, 1.0);
      }
    }

    return RefreshIndicator(
      onRefresh: refresh,
      child: Container(
        height: 380,
        width: double.maxFinite,
        padding: EdgeInsets.fromLTRB(15, 15, 15, 0),
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(15),
          boxShadow: [
            BoxShadow(
              color: Colors.black12,
              blurRadius: 10,
              offset: Offset(0, 5),
            ),
          ],
        ),
        child: FutureBuilder<List<Cuti>>(
          future: Api().getCutiHistory(token),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.waiting) {
              return Center(child: CircularProgressIndicator());
            } else if (snapshot.hasError) {
              return Center(child: Text('Error: ${snapshot.error}'));
            } else if (!snapshot.hasData || snapshot.data!.isEmpty) {
              return Center(child: Text('No leave history available'));
            } else {
              final cutiHistory = snapshot.data!;
              return ListView.builder(
                itemCount: cutiHistory.length,
                itemBuilder: (context, index) {
                  final cuti = cutiHistory[index];
                  final startDate = cuti.tglMulai;
                  final endDate = cuti.tglSelesai;
                  final workingDays = calculateWorkingDays(startDate, endDate);
                  final statusColor = getStatusColor(cuti.statusPengajuan);

                  return Card(
                    margin: EdgeInsets.fromLTRB(3, 5, 3, 10),
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
                              height: 75,
                              width: 55,
                              decoration: BoxDecoration(
                                color: Color.fromRGBO(135, 137, 255, 1.0),
                                borderRadius: BorderRadius.circular(5),
                              ),
                              child: Column(
                                mainAxisAlignment: MainAxisAlignment.center,
                                children: [
                                  Text(
                                    '$workingDays',
                                    style: TextStyle(
                                      color: Colors.white,
                                      fontSize: 20,
                                      fontWeight: FontWeight.w600,
                                      fontFamily: 'Poppins',
                                    ),
                                  ),
                                  Text(
                                    'days',
                                    style: TextStyle(
                                      color: Colors.white,
                                      fontSize: 12,
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
                                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                                  children: [
                                    Column(
                                      crossAxisAlignment: CrossAxisAlignment.start,
                                      children: [
                                        Text(
                                          'Mulai',
                                          style: TextStyle(
                                            fontSize: 11,
                                            fontWeight: FontWeight.w500,
                                            fontFamily: 'Poppins',
                                            color: Color.fromRGBO(96, 96, 96, 1.0),
                                          ),
                                        ),
                                        Text(
                                          '${DateFormat('dd/MM/yyyy').format(startDate)}',
                                          style: TextStyle(
                                            color: Color.fromRGBO(86, 87, 173, 1.0),
                                            fontFamily: 'Poppins',
                                            fontSize: 14,
                                            fontWeight: FontWeight.w600,
                                          ),
                                        ),
                                      ],
                                    ),
                                    SizedBox(width: 20),
                                    Column(
                                      crossAxisAlignment: CrossAxisAlignment.start,
                                      children: [
                                        Text(
                                          'Selesai',
                                          style: TextStyle(
                                            fontSize: 11,
                                            fontWeight: FontWeight.w500,
                                            fontFamily: 'Poppins',
                                            color: Color.fromRGBO(96, 96, 96, 1.0),
                                          ),
                                        ),
                                        Text(
                                          '${DateFormat('dd/MM/yyyy').format(endDate)}',
                                          style: TextStyle(
                                            color: Color.fromRGBO(86, 87, 173, 1.0),
                                            fontFamily: 'Poppins',
                                            fontSize: 14,
                                            fontWeight: FontWeight.w600,
                                          ),
                                        ),
                                      ],
                                    ),
                                  ],
                                ),
                                Divider(
                                  height: 10,
                                  thickness: 1,
                                  color: Color.fromRGBO(96, 96, 96, 0.5),
                                ),
                                Text(
                                  cuti.statusPengajuan,
                                  style: TextStyle(
                                    fontFamily: 'Poppins',
                                    fontSize: 13,
                                    color: statusColor,
                                    fontWeight: FontWeight.w600,
                                  ),
                                ),
                              ],
                            ),
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
