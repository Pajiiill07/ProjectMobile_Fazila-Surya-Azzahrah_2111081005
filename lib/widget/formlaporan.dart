import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:frontend_projectmobile/model/laporan_model.dart';

class FormLaporan extends StatelessWidget {
  final Map<String, dynamic> dataPegawai;
  final String token;
  FormLaporan({Key? key, required this.dataPegawai, required this.token})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return DefaultTabController(
      length: 2,
      child: Container(
        height: 580,
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
                    'Submit Laporan',
                    style: TextStyle(
                      fontSize: 14,
                      fontWeight: FontWeight.w600,
                      fontFamily: 'Poppins',
                    ),
                  ),
                ),
                Tab(
                  child: Text(
                    'Riwayat Laporan',
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
                  _buildSubmitLaporanForm(context),
                  _buildRiwayatLaporan(),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildSubmitLaporanForm(BuildContext context) {
    TextEditingController _dateController = TextEditingController();
    TextEditingController _judulController = TextEditingController();
    TextEditingController _isiController = TextEditingController();

    void clearText(){
      _dateController.clear();
      _judulController.clear();
      _isiController.clear();
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
          SizedBox(
            height: 50,
            child: TextFormField(
              decoration: InputDecoration(
                filled: true,
                fillColor: Color.fromRGBO(210, 218, 255, 0.5),
                hintText: "YYYY-MM-DD", // Ubah hintText sesuai dengan format yang diharapkan
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
              controller: _dateController,
              onTap: () async {
                DateTime? pickedDate = await showDatePicker(
                  context: context,
                  initialDate: DateTime.now(),
                  firstDate: DateTime(2000),
                  lastDate: DateTime(2101),
                );

                if (pickedDate != null) {
                  _dateController.text =
                  "${pickedDate.year}-${pickedDate.month.toString().padLeft(2, '0')}-${pickedDate.day.toString().padLeft(2, '0')}";
                }
              },
            ),
          ),
          SizedBox(height: 20),
          SizedBox(
            height: 50,
            child: TextField(
              controller: _judulController,
              decoration: InputDecoration(
                filled: true,
                fillColor: Color.fromRGBO(210, 218, 255, 0.5),
                hintText: "Judul Laporan",
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
          ),
          SizedBox(height: 20),
          TextFormField(
            controller: _isiController,
            maxLines: 8,
            maxLength: 1200,
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(210, 218, 255, 0.5),
              hintText: "Isi Laporan",
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
                    if (!_isValidDateFormat(_dateController.text)) {
                      throw Exception('Invalid date format');
                    }

                    final laporan = Laporan(
                      laporanId: 0,
                      pegawaiId: dataPegawai['pegawai_id'],
                      tanggalLaporan: DateTime.parse(_dateController.text),
                      tanggalSubmit: DateTime.now(),
                      judulLaporan: _judulController.text,
                      isiLaporan: _isiController.text,
                    );

                    final result = await Api().createLaporan(laporan);
                    if (result != null) {
                      ScaffoldMessenger.of(context).showSnackBar(
                        SnackBar(content: Text('Laporan submitted successfully')),
                      );
                      clearText();
                    }
                  } catch (e) {
                    ScaffoldMessenger.of(context).showSnackBar(
                      SnackBar(content: Text('Failed to submit laporan: $e')),
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
                  "Submit Laporan",
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

  Widget _buildRiwayatLaporan() {
    Future<void> refresh() async {
      await Api().getLaporanHistory(token);
    }

    return FutureBuilder<List<Laporan>>(
      future: Api().getLaporanHistory(token),
      builder: (context, snapshot) {
        if (snapshot.connectionState == ConnectionState.waiting) {
          return Center(child: CircularProgressIndicator());
        } else if (snapshot.hasError) {
          return Center(child: Text('Error: ${snapshot.error}'));
        } else if (!snapshot.hasData || snapshot.data!.isEmpty) {
          return Center(child: Text('No reports found'));
        } else {
          final laporanList = snapshot.data!;
          return Padding(
            padding: const EdgeInsets.all(20),
            child: RefreshIndicator(
              onRefresh: refresh,
              child: ListView(
                children: [
                  ExpansionPanelList.radio(
                    expandedHeaderPadding: EdgeInsets.all(10),
                    elevation: 1,
                    children: laporanList.map<ExpansionPanelRadio>((Laporan laporan) {
                      return ExpansionPanelRadio(
                        value: laporan.judulLaporan,
                        headerBuilder: (BuildContext context, bool isExpanded) {
                          return ListTile(
                            title: Text(
                              laporan.judulLaporan,
                              style: TextStyle(
                                fontSize: 14,
                                fontWeight: FontWeight.w600,
                                fontFamily: 'Poppins',
                              ),
                            ),
                            subtitle: Text(
                              "${laporan.tanggalLaporan.day.toString().padLeft(2, '0')}/${laporan.tanggalLaporan.month.toString().padLeft(2, '0')}/${laporan.tanggalLaporan.year}",
                              style: TextStyle(
                                fontSize: 12,
                                fontWeight: FontWeight.normal,
                                fontFamily: 'Poppins',
                              ),
                            ),
                          );
                        },
                        body: Padding(
                          padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 10),
                          child: Text(
                            laporan.isiLaporan,
                            style: TextStyle(
                              fontSize: 14,
                              fontWeight: FontWeight.normal,
                              fontFamily: 'Poppins',
                            ),
                          ),
                        ),
                      );
                    }).toList(),
                  ),
                ],
              ),
            ),
          );
        }
      },
    );
  }
}
