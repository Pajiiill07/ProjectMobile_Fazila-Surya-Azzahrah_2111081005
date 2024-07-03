import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/page/cuti.dart';
import 'package:frontend_projectmobile/page/gaji.dart';
import 'package:frontend_projectmobile/page/laporan.dart';

class MenuHome extends StatelessWidget {
  final Map<String, dynamic> dataPegawai;
  const MenuHome({Key? key, required this.dataPegawai}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    // List of icons and labels
    final List<Map<String, dynamic>> menuItems = [
      {
        "icon": Icons.account_balance_wallet_rounded,
        "label": "Gaji",
        "color": Color.fromRGBO(116, 93, 34, 1.0)
      },
      {
        "icon": Icons.arrow_circle_right_rounded,
        "label": "Cuti",
        "color": Color.fromRGBO(110, 110, 110, 1.0)
      },
      {
        "icon": Icons.library_books_rounded,
        "label": "Laporan",
        "color": Color.fromRGBO(6, 104, 255, 1.0)
      },
      {
        "icon": Icons.assignment_turned_in_rounded,
        "label": "Evaluasi",
        "color": Color.fromRGBO(101, 204, 42, 1.0)
      },
    ];

    return Row(
      children: [
        InkWell(
          onTap: () {Navigator.of(context).push(
              MaterialPageRoute(builder: (context) => GajiPage(dataPegawai: dataPegawai,))
          );},
          child: Container(
            width: 80,
            height: 90,
            decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(20),
                border: Border.all(color: Colors.grey)),
            child: Padding(
              padding: const EdgeInsets.all(15),
              child: Column(
                children: [
                  Icon(
                    Icons.account_balance_wallet_rounded,
                    size: 30,
                    color: Color.fromRGBO(116, 93, 34, 1.0),
                  ),
                  Spacer(),
                  Text(
                    'Gaji',
                    style: TextStyle(fontSize: 11, fontFamily: 'Poppins'),
                  ),
                ],
              ),
            ),
          ),
        ),
        Spacer(),
        InkWell(
          onTap: () {Navigator.of(context).push(
              MaterialPageRoute(builder: (context) =>  CutiPage(dataPegawai: dataPegawai))
          );},
          child: Container(
            width: 80,
            height: 90,
            decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(20),
                border: Border.all(color: Colors.grey)),
            child: Padding(
              padding: const EdgeInsets.all(15),
              child: Column(
                children: [
                  Icon(
                    Icons.arrow_circle_right_rounded,
                    size: 30,
                    color: Color.fromRGBO(110, 110, 110, 1.0),
                  ),
                  Spacer(),
                  Text(
                    'Cuti',
                    style: TextStyle(fontSize: 11, fontFamily: 'Poppins'),
                  ),
                ],
              ),
            ),
          ),
        ),
        Spacer(),
        InkWell(
          onTap: () {Navigator.of(context).push(
              MaterialPageRoute(builder: (context) =>  LaporanPage(dataPegawai: dataPegawai,))
          );},
          child: Container(
            width: 80,
            height: 90,
            decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(20),
                border: Border.all(color: Colors.grey)),
            child: Padding(
              padding: const EdgeInsets.all(15),
              child: Column(
                children: [
                  Icon(
                    Icons.library_books_rounded,
                    size: 30,
                    color: Color.fromRGBO(6, 104, 255, 1.0),
                  ),
                  Spacer(),
                  Text(
                    'Laporan',
                    style: TextStyle(fontSize: 11, fontFamily: 'Poppins'),
                  ),
                ],
              ),
            ),
          ),
        ),
        Spacer(),
        InkWell(
          onTap: () {},
          child: Container(
            width: 80,
            height: 90,
            decoration: BoxDecoration(
                borderRadius: BorderRadius.circular(20),
                border: Border.all(color: Colors.grey)),
            child: Padding(
              padding: const EdgeInsets.all(15),
              child: Column(
                children: [
                  Icon(
                    Icons.assignment_turned_in_rounded,
                    size: 30,
                    color: Color.fromRGBO(101, 204, 42, 1.0),
                  ),
                  Spacer(),
                  Text(
                    'Evaluasi',
                    style: TextStyle(fontSize: 11, fontFamily: 'Poppins'),
                  ),
                ],
              ),
            ),
          ),
        ),
      ],
    );
  }
}
