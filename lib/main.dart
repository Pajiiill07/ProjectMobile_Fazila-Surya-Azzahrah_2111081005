import 'package:animated_notch_bottom_bar/animated_notch_bottom_bar/animated_notch_bottom_bar.dart';
import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/page/absen.dart';
import 'package:frontend_projectmobile/page/home.dart';
import 'package:frontend_projectmobile/page/login-page.dart';
import 'package:frontend_projectmobile/page/setting.dart';
import 'package:frontend_projectmobile/page/splashscreen.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        colorScheme:
            ColorScheme.fromSeed(seedColor: Color.fromRGBO(135, 137, 255, 1.0)),
        useMaterial3: true,
      ),
      home: Splash(),
      routes: {
        '/login': (context) => LoginPage(),
      },
    );
  }
}

class Sipeg extends StatefulWidget {
  final Map<String, dynamic> dataPegawai;
  const Sipeg({super.key, required this.dataPegawai});

  @override
  State<Sipeg> createState() => _SipegState();
}

class _SipegState extends State<Sipeg> {
  final _pageController = PageController(initialPage: 0);
  final NotchBottomBarController _controller =
      NotchBottomBarController(index: 0);

  int maxCount = 3;

  @override
  void dispose() {
    _pageController.dispose();

    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    /// widget list
    final List<Widget> bottomBarPages = [
      HomePage(dataPegawai: widget.dataPegawai),
      AbsenPage(dataPegawai: widget.dataPegawai),
      SettingPage(dataPegawai: widget.dataPegawai),
    ];
    return Scaffold(
      body: PageView(
        controller: _pageController,
        physics: const NeverScrollableScrollPhysics(),
        children: List.generate(
            bottomBarPages.length, (index) => bottomBarPages[index]),
      ),
      extendBody: true,
      bottomNavigationBar: (bottomBarPages.length <= maxCount)
          ? AnimatedNotchBottomBar(
              notchBottomBarController: _controller,
              color: Color.fromRGBO(177, 178, 255, 1),
              showLabel: true,
              notchColor: Color.fromRGBO(255, 255, 255, 1.0),
              removeMargins: false,
              bottomBarWidth: 500,
              showShadow: true,
              durationInMilliSeconds: 150,
              itemLabelStyle: const TextStyle(fontSize: 10, color: Color.fromRGBO(255, 255, 255, 1.0)),
              bottomBarItems: const [
                BottomBarItem(
                  inActiveItem: Icon(
                    Icons.home_filled,
                    color: Colors.white,
                  ),
                  activeItem: Icon(
                    Icons.home_filled,
                    color: Color.fromRGBO(135, 137, 255, 1),
                  ),
                  itemLabel: 'Home',
                ),
                BottomBarItem(
                  inActiveItem: Icon(
                    Icons.share_arrival_time_rounded,
                    color: Colors.white,
                  ),
                  activeItem: Icon(
                    Icons.share_arrival_time_rounded,
                    color: Color.fromRGBO(135, 137, 255, 1),
                  ),
                  itemLabel: 'Absen',
                ),
                BottomBarItem(
                  inActiveItem: Icon(
                    Icons.settings,
                    color: Colors.white,
                  ),
                  activeItem: Icon(
                    Icons.settings,
                    color: Color.fromRGBO(135, 137, 255, 1),
                  ),
                  itemLabel: 'Setting',
                ),
              ],
              onTap: (index) {
                _pageController.jumpToPage(index);
              },
            )
          : null,
    );
  }
}
