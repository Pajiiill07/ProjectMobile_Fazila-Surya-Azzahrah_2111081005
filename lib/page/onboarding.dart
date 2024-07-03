import 'package:flutter/material.dart';

class OnboardingScreen extends StatefulWidget {
  @override
  _OnboardingScreenState createState() => _OnboardingScreenState();
}

class _OnboardingScreenState extends State<OnboardingScreen> {
  int _currentIndex = 0;
  PageController _pageController = PageController(initialPage: 0);

  final List<Widget> _swipeableBody = [
    Container(
        color: Color.fromRGBO(238, 241, 255, 1.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Image.asset('assets/images/onboard1.png'),
            Padding(
              padding: const EdgeInsets.fromLTRB(25, 20, 25, 0),
              child: Text(
                "Welcome to the StaffSync App!",
                style: TextStyle(
                    fontFamily: 'Poppins',
                    fontSize: 25,
                    fontWeight: FontWeight.w800
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.fromLTRB(25, 0, 25, 0),
              child: Text(
                'We’re excited to have you on board. This app helps you manage attendence, salary, leave, and reports effortlessly.',
                style: TextStyle(
                    fontFamily: 'Poppins',
                    fontSize: 15,
                    fontWeight: FontWeight.w500,
                    color: Color.fromRGBO(150, 150, 150, 1.0)
                ),
              ),
            )
          ],
        )
    ),
    Container(
        color: Color.fromRGBO(238, 241, 255, 1.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Image.asset('assets/images/onboard2.png'),
            Padding(
              padding: const EdgeInsets.fromLTRB(25, 20, 25, 0),
              child: Text(
                "Let's Get Started",
                style: TextStyle(
                    fontFamily: 'Poppins',
                    fontSize: 25,
                    fontWeight: FontWeight.w800
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.fromLTRB(25, 0, 25, 0),
              child: Text(
                'View and manage your salary details, do your attendence esealy, apply for and track your leave, and create and access various employee reports.',
                style: TextStyle(
                    fontFamily: 'Poppins',
                    fontSize: 15,
                    fontWeight: FontWeight.w500,
                    color: Color.fromRGBO(150, 150, 150, 1.0)
                ),
              ),
            )
          ],
        )
    ),
    Container(
        color: Color.fromRGBO(238, 241, 255, 1.0),
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Image.asset('assets/images/onboard3.png'),
            Padding(
              padding: const EdgeInsets.fromLTRB(25, 20, 25, 0),
              child: Text(
                "Ready to Begin ?",
                style: TextStyle(
                    fontFamily: 'Poppins',
                    fontSize: 25,
                    fontWeight: FontWeight.w800
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsets.fromLTRB(25, 0, 25, 0),
              child: Text(
                'Press the button below to start your journey with our StaffSync App!',
                style: TextStyle(
                    fontFamily: 'Poppins',
                    fontSize: 15,
                    fontWeight: FontWeight.w500,
                    color: Color.fromRGBO(150, 150, 150, 1.0)
                ),
              ),
            )
          ],
        )
    ),
  ];

  @override
  void dispose() {
    _pageController.dispose();
    super.dispose();
  }

  void _goToLoginPage(BuildContext context) {
    Navigator.pushReplacementNamed(context, '/login');
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Stack(
        children: [
          PageView.builder(
            controller: _pageController,
            itemCount: _swipeableBody.length,
            onPageChanged: (index) {
              setState(() {
                _currentIndex = index;
              });
            },
            itemBuilder: (context, index) {
              return _swipeableBody[index];
            },
          ),
          Positioned(
            bottom: 30,
            left: 20,
            right: 20,
            child: Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Row(
                  children: List.generate(_swipeableBody.length, (index) {
                    return Container(
                      margin: EdgeInsets.symmetric(horizontal: 3.0),
                      width: _currentIndex == index ? 12.0 : 8.0,
                      height: _currentIndex == index ? 12.0 : 8.0,
                      decoration: BoxDecoration(
                        shape: BoxShape.circle,
                        color: _currentIndex == index
                            ? Colors.black
                            : Colors.grey,
                      ),
                    );
                  }),
                ),
                TextButton(
                  onPressed: () {
                    if (_currentIndex < _swipeableBody.length - 1) {
                      _pageController.animateToPage(
                        _swipeableBody.length - 1,
                        duration: Duration(milliseconds: 300),
                        curve: Curves.easeInOut,
                      );
                      setState(() {
                        _currentIndex = _swipeableBody.length - 1;
                      });
                    } else {
                      _goToLoginPage(context);
                    }
                  },
                  child: Text(_currentIndex == _swipeableBody.length - 1 ? 'Login' : 'Skip'),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}