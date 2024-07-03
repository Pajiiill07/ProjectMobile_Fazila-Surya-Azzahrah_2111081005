import 'package:flutter/material.dart';

class LeaveOview extends StatelessWidget {
  const LeaveOview({super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.maxFinite,
      height: 85,
      padding: EdgeInsets.fromLTRB(20, 20, 20, 20),
      decoration: BoxDecoration(
        color: Color.fromRGBO(210, 218, 255, 0.5),
        borderRadius: BorderRadius.circular(20),
      ),
      child: Row(
        mainAxisAlignment: MainAxisAlignment.center,
        crossAxisAlignment: CrossAxisAlignment.center,
        children: [
          Spacer(),
          Column(
            children: [
              Text(
                "10 Days",
                style: TextStyle(
                  color: Color.fromRGBO(22, 22, 22, 1.0),
                  fontSize: 15,
                  fontWeight: FontWeight.w700,
                  fontFamily: 'Poppins',
                ),
              ),
              Text(
                "Sisa Jatah Cuti",
                style: TextStyle(
                  color: Color.fromRGBO(96, 96, 96, 1.0),
                  fontSize: 13,
                  fontWeight: FontWeight.normal,
                  fontFamily: 'Poppins',
                ),
              ),
            ],
          ),
          Spacer(),
          VerticalDivider(
            color: Colors.grey,
            thickness: 1.5,
          ),
          Spacer(),
          Column(
            children: [
              Text(
                "2 Days",
                style: TextStyle(
                  color: Color.fromRGBO(22, 22, 22, 1.0),
                  fontSize: 15,
                  fontWeight: FontWeight.w700,
                  fontFamily: 'Poppins',
                ),
              ),
              Text(
                "Sedang Cuti",
                style: TextStyle(
                  color: Color.fromRGBO(96, 96, 96, 1.0),
                  fontSize: 13,
                  fontWeight: FontWeight.normal,
                  fontFamily: 'Poppins',
                ),
              ),
            ],
          ),
          Spacer(),
        ],
      ),
    );
  }
}
