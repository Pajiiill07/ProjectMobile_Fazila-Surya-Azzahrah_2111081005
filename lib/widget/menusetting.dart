import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/page/changepassword.dart';
import 'package:frontend_projectmobile/page/profile.dart';

class MenuSettings extends StatelessWidget {
  final Map<String, dynamic> dataPegawai;
  const MenuSettings({super.key, required this.dataPegawai});

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: BoxDecoration(
        color: Color(0xFFE0E5FF),
        borderRadius: BorderRadius.circular(15.0),
      ),
      child: Column(
        mainAxisSize: MainAxisSize.min,
        children: [
          _buildListTile(
            context,
            Icons.person_outline,
            'Update Profile',
            () {
              Navigator.of(context).push(MaterialPageRoute(builder: (context) => EditProfile(dataPegawai: dataPegawai),));
            },
          ),
          _buildListTile(
            context,
            Icons.lock_outline_rounded,
            'Change Password',
            () {
              Navigator.of(context).push(MaterialPageRoute(builder: (context) => UpdateUserPage(),));
            },
          ),
          _buildListTile(
            context,
            Icons.notifications_none_rounded,
            'Notification',
            () {},
          ),
          _buildListTile(
            context,
            Icons.help_outline_rounded,
            'FAQ',
            () {},
          ),
        ],
      ),
    );
  }

  ListTile _buildListTile(
      BuildContext context, IconData icon, String title, VoidCallback onTap) {
    return ListTile(
      leading: Icon(
        icon,
        size: 24,
      ),
      title: Text(
        title,
        style: TextStyle(
          fontFamily: 'Poppins',
          fontWeight: FontWeight.w500
        ),
      ),
      trailing: Icon(
        Icons.arrow_forward_ios_rounded,
        size: 22,
      ),
      onTap: onTap,
    );
  }
}
