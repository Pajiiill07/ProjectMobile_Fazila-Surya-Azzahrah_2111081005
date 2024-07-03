import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';
import 'package:frontend_projectmobile/model/gaji_model.dart';

class ListGaji extends StatelessWidget {
  final Map<String, dynamic> dataPegawai;
  final String token;

  ListGaji({Key? key, required this.dataPegawai, required this.token}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return FutureBuilder<List<Gaji>>(
      future: Api().getGajiHistory(token),
      builder: (context, snapshot) {
        if (snapshot.connectionState == ConnectionState.waiting) {
          return Center(child: CircularProgressIndicator());
        } else if (snapshot.hasError) {
          return Center(child: Text('Error: ${snapshot.error}'));
        } else if (!snapshot.hasData || snapshot.data!.isEmpty) {
          return Center(child: Text('No data found'));
        } else {
          List<Gaji> gajiList = snapshot.data!;
          return ExpansionPanelList.radio(
            elevation: 1,
            children: gajiList.map<ExpansionPanelRadio>((gaji) {
              return _buildExpansionPanel(
                gaji.periodePenggajian,
                gaji.gajiPokok,
                gaji.bonus,
                gaji.tunjangan,
                gaji.potongan,
                gaji.pph,
              );
            }).toList(),
          );
        }
      },
    );
  }

  ExpansionPanelRadio _buildExpansionPanel(
      String period, int gajiPokok, int bonus, int tunjangan, int potongan, int pajak) {
    int totalGaji = gajiPokok + bonus + tunjangan - potongan - pajak;

    return ExpansionPanelRadio(
      value: period,
      headerBuilder: (BuildContext context, bool isExpanded) {
        return ListTile(
          title: Text(
            'Gaji Pegawai',
            style: TextStyle(
                fontFamily: 'Poppins',
                fontWeight: FontWeight.bold
            ),
          ),
          subtitle: Text(
            period,
            style: TextStyle(
                fontFamily: 'Poppins'
            ),
          ),
        );
      },
      body: Padding(
        padding: const EdgeInsets.symmetric(horizontal: 16.0, vertical: 8.0),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            _buildRow('Gaji Pokok', gajiPokok),
            _buildRow('Bonus', bonus),
            _buildRow('Tunjangan', tunjangan),
            _buildRow('Potongan', potongan),
            _buildRow('Pajak Penghasilan', pajak),
            Divider(thickness: 1.5, color: Color.fromRGBO(96, 96, 96, 1)),
            _buildRow('Total Gaji', totalGaji, isBold: true),
          ],
        ),
      ),
    );
  }

  Widget _buildRow(String label, int value, {bool isBold = false}) {
    return Padding(
      padding: const EdgeInsets.only(top: 10),
      child: Row(
        children: [
          Text(
            label,
            style: TextStyle(
              fontFamily: 'Courier',
              fontWeight: isBold ? FontWeight.w800 : FontWeight.w600,
            ),
          ),
          Spacer(),
          Text(
            'Rp. ${value.toString()}',
            style: TextStyle(
              fontFamily: 'Courier',
              fontWeight: isBold ? FontWeight.w800 : FontWeight.w600,
            ),
          ),
        ],
      ),
    );
  }
}
