import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';

class DailyAbsen extends StatefulWidget {
  final String token;
  final Function(bool) updateCheckInStatus;
  const DailyAbsen({Key? key, required this.token, required this.updateCheckInStatus}) : super(key: key);

  @override
  _DailyAbsenState createState() => _DailyAbsenState();
}

class _DailyAbsenState extends State<DailyAbsen> {
  bool _isCheckedIn = false;
  int? _absenId;
  String? _checkInTime;
  String? _checkOutTime;

  void _checkIn() async {
    try {
      final result = await Api().checkIn(widget.token);
      setState(() {
        _isCheckedIn = true;
        _absenId = result['data']['id'];
        _checkInTime = result['data']['jam_datang'];
      });
      widget.updateCheckInStatus(true); // Update check-in status in parent widget
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Berhasil check-in')),
      );
    } catch (e) {
      print('Failed to check in: $e');
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Failed to check in')),
      );
    }
  }

  void _checkOut() async {
    if (_absenId == null) {
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Invalid check-out operation')),
      );
      return;
    }

    try {
      await Api().checkOut(widget.token, _absenId!);
      setState(() {
        _isCheckedIn = false;
        _checkOutTime = DateTime.now().toString().split(' ')[1];
      });
      widget.updateCheckInStatus(false); // Update check-in status in parent widget
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Berhasil check-out')),
      );
    } catch (e) {
      print('Failed to check out: $e');
      ScaffoldMessenger.of(context).showSnackBar(
        const SnackBar(content: Text('Failed to check out')),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Container(
      width: double.maxFinite,
      height: 180,
      padding: EdgeInsets.fromLTRB(20, 20, 20, 0),
      decoration: BoxDecoration(
        color: Colors.transparent,
        border: Border.all(
          color: Color.fromRGBO(96, 96, 96, 1.0),
        ),
        borderRadius: BorderRadius.circular(20),
      ),
      child: Column(
        children: [
          Padding(
            padding: const EdgeInsets.only(bottom: 10),
            child: Row(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Padding(
                  padding: const EdgeInsets.only(left: 20),
                  child: Text(
                    "Absen Masuk",
                    style: TextStyle(
                      color: Color.fromRGBO(96, 96, 96, 1.0),
                      fontSize: 14,
                      fontWeight: FontWeight.w600,
                      fontFamily: 'Poppins',
                    ),
                  ),
                ),
                Spacer(),
                Padding(
                  padding: const EdgeInsets.only(right: 20),
                  child: Text(
                    "Absen Keluar",
                    style: TextStyle(
                      color: Color.fromRGBO(96, 96, 96, 1.0),
                      fontSize: 14,
                      fontWeight: FontWeight.w600,
                      fontFamily: 'Poppins',
                    ),
                  ),
                ),
              ],
            ),
          ),
          const Divider(
            color: Color.fromRGBO(96, 96, 96, 1.0),
            height: 1,
            thickness: 1.5,
          ),
          Row(
            children: [
              Column(
                children: [
                  Padding(
                    padding: const EdgeInsets.only(top: 20, bottom: 15),
                    child: Text(
                      _checkInTime ?? '--:--:--',
                      style: TextStyle(
                        color: Color.fromRGBO(22, 22, 22, 1.0),
                        fontSize: 17,
                        fontWeight: FontWeight.w700,
                        fontFamily: 'Poppins',
                      ),
                    ),
                  ),
                  SizedBox(
                    height: 40,
                    width: 140,
                    child: ElevatedButton(
                      onPressed: _isCheckedIn ? null : _checkIn,
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Color.fromRGBO(170, 196, 255, 1.0),
                        shape: RoundedRectangleBorder(
                          side: BorderSide(
                            width: 0,
                            style: BorderStyle.solid,
                            color: Color.fromRGBO(170, 196, 255, 1.0),
                          ),
                          borderRadius: BorderRadius.all(Radius.circular(20)),
                        ),
                      ),
                      child: Row(
                        children: [
                          Icon(
                            Icons.login_rounded,
                            size: 17,
                            color: Colors.black,
                          ),
                          Text(
                            " Clock In",
                            style: TextStyle(
                              color: Colors.black,
                              fontSize: 14,
                              fontWeight: FontWeight.w600,
                              fontFamily: 'Poppins',
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              ),
              Spacer(),
              Column(
                children: [
                  Padding(
                    padding: const EdgeInsets.only(top: 20, bottom: 15),
                    child: Text(
                      _checkOutTime ?? '--:--:--',
                      style: TextStyle(
                        color: Color.fromRGBO(22, 22, 22, 1.0),
                        fontSize: 17,
                        fontWeight: FontWeight.w700,
                        fontFamily: 'Poppins',
                      ),
                    ),
                  ),
                  SizedBox(
                    height: 40,
                    width: 140,
                    child: ElevatedButton(
                      onPressed: !_isCheckedIn ? null : _checkOut,
                      style: ElevatedButton.styleFrom(
                        backgroundColor: Color.fromRGBO(170, 196, 255, 1.0),
                        shape: RoundedRectangleBorder(
                          side: BorderSide(
                            width: 0,
                            style: BorderStyle.solid,
                            color: Color.fromRGBO(170, 196, 255, 1.0),
                          ),
                          borderRadius: BorderRadius.all(Radius.circular(20)),
                        ),
                      ),
                      child: Row(
                        children: [
                          Icon(
                            Icons.logout_rounded,
                            size: 17,
                            color: Colors.black,
                          ),
                          Text(
                            " Clock Out",
                            style: TextStyle(
                              color: Colors.black,
                              fontSize: 14,
                              fontWeight: FontWeight.w600,
                              fontFamily: 'Poppins',
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ],
              ),
            ],
          ),
        ],
      ),
    );
  }
}
