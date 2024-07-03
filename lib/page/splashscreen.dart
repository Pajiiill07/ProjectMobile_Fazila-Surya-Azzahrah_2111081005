import 'package:flutter/cupertino.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/page/onboarding.dart';

class Splash extends StatefulWidget {
  const Splash({super.key});

  @override
  State<Splash> createState() => _SplashState();
}

class _SplashState extends State<Splash> with TickerProviderStateMixin {

  @override
  void initState() {
    super.initState();
    Future.delayed(Duration(seconds: 5), () {
      Navigator.pushReplacement(context, MaterialPageRoute(builder: (context) => OnboardingScreen()));
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Color.fromRGBO(237, 241, 255, 1.0),
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            Image.asset(
              'assets/images/staffsync_logo.png',
              scale: (1/0.08),
            ),
            SizedBox(height: 20,),
            if (defaultTargetPlatform == TargetPlatform.android)
              Padding(
                padding: const EdgeInsets.fromLTRB(75, 80, 75, 20),
                child: const LinearProgressIndicator(
                  color: Color.fromRGBO(135, 137, 255, 1.0),
                  backgroundColor: Color.fromRGBO(237, 241, 255, 1.0),
                ),
              )
            else
              const CupertinoActivityIndicator(
                color: Colors.black38,
              )
          ],
        ),
      ),
    );
  }
}
