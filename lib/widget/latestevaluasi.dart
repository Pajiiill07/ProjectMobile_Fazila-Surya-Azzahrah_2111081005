import 'package:flutter/material.dart';

class LatestEvaluasi extends StatelessWidget {
  final double valueAbsensi;
  final double valueLaporan;

  LatestEvaluasi({super.key,required this.valueAbsensi, required this.valueLaporan});

  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.maxFinite,
      height: 150,
      decoration: BoxDecoration(
        color: Color.fromRGBO(224, 229, 255, 1),
        borderRadius: BorderRadius.circular(20),
      ),
      child: Padding(
        padding: EdgeInsets.all(20),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Center(
              child: Text(
                'Evaluasi Terbaru',
                style: TextStyle(
                  fontFamily: 'Poppins',
                  fontWeight: FontWeight.w600,
                ),
              ),
            ),
            Spacer(),
            Row(
              children: [
                Text(
                  'Penilaian Absensi',
                  style: TextStyle(
                    fontFamily: 'Poppins',
                  ),
                ),
                Spacer(),
                Text(
                  valueAbsensi.toString(),
                  style: TextStyle(
                    fontFamily: 'Poppins',
                  ),
                ),
              ],
            ),
            Spacer(),
            LinearProgressIndicator(
              borderRadius: BorderRadius.circular(20),
              minHeight: 5,
              value: valueAbsensi / 100,
              valueColor: AlwaysStoppedAnimation<Color>(getPenilaianAbsen(valueAbsensi)),
              backgroundColor: Color.fromRGBO(255, 255, 255, 1),
            ),
            Spacer(),
            Row(
              children: [
                Text(
                  'Penilaian Laporan',
                  style: TextStyle(
                    fontFamily: 'Poppins',
                  ),
                ),
                Spacer(),
                Text(
                  valueLaporan.toString(),
                  style: TextStyle(
                    fontFamily: 'Poppins',
                  ),
                ),
              ],
            ),
            Spacer(),
            LinearProgressIndicator(
              borderRadius: BorderRadius.circular(20),
              minHeight: 5,
              value: valueLaporan / 100,
              valueColor: AlwaysStoppedAnimation<Color>(getPenilaianLaporan(valueLaporan)),
              backgroundColor: Colors.white,
            ),
          ],
        ),
      ),
    );
  }

  Color getPenilaianAbsen(double value) {
    return Color.lerp(
      Color.fromRGBO(74, 191, 72, 1.0),
      Color.fromRGBO(135, 137, 255, 1.0),
      value / 100,
    )!;
  }

  Color getPenilaianLaporan(double value) {
    return Color.lerp(
      Color.fromRGBO(135, 137, 255, 1.0),
      Color.fromRGBO(74, 191, 72, 1.0),
      value / 100,
    )!;
  }
}
