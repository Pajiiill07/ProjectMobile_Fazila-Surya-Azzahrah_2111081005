  import 'package:flutter/material.dart';
  import 'package:frontend_projectmobile/controller/login_controller.dart';
  import 'package:flutter/gestures.dart';

  class LoginPage extends StatefulWidget {
    const LoginPage({super.key});

    @override
    State<LoginPage> createState() => _LoginPageState();
  }

  class _LoginPageState extends State<LoginPage> {
    final LoginController _loginController = LoginController();
    @override
    Widget build(BuildContext context) {
      return Scaffold(
        body: Container(
          width: double.maxFinite,
          height: double.maxFinite,
          decoration: BoxDecoration(
            color: Color.fromRGBO(237, 241, 255, 1.0),
          ),
          child: SingleChildScrollView(
            child: Column(
                children: [
            Container(
            padding: EdgeInsets.fromLTRB(15, 50, 15, 30),
            width: double.maxFinite,
            height: MediaQuery.of(context).size.height,
            child: Column(
              children: <Widget>[
                Image.asset(
                  'assets/images/assets_login.png', // Adjust the asset path
                  scale: 1.0,
                ),
                SizedBox(height: 50),
                Text(
                  "Welcome Back !",
                  style: TextStyle(
                    decoration: TextDecoration.none,
                    fontSize: 22,
                    fontWeight: FontWeight.w700,
                    color: Color.fromRGBO(135, 137, 255, 1.0),
                    fontFamily: 'Poppins',
                  ),
                ),
                Text(
                  "Please login into your account",
                  style: TextStyle(
                    decoration: TextDecoration.none,
                    fontSize: 13,
                    fontWeight: FontWeight.normal,
                    color: Color.fromRGBO(135, 137, 255, 1.0),
                    fontFamily: 'Poppins',
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.fromLTRB(15, 50, 15, 15),
                  child: TextField(
                    controller: _loginController.emailController,
                    decoration: InputDecoration(
                      prefixIcon: Icon(Icons.email_outlined),
                      filled: true,
                      fillColor: Color.fromRGBO(210, 218, 255, 0.5),
                      hintText: "Enter Email",
                      hintStyle: TextStyle(
                        color: Color.fromRGBO(96, 96, 96, 1.0),
                        fontSize: 16,
                        fontWeight: FontWeight.normal,
                        fontFamily: 'Poppins',
                      ),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(20)),
                        borderSide: BorderSide.none,
                      ),
                    ),
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.fromLTRB(15, 15, 15, 0),
                  child: TextField(
                    controller: _loginController.passwordController,
                    obscureText: true,
                    decoration: InputDecoration(
                      prefixIcon: Icon(Icons.key),
                      filled: true,
                      fillColor: Color.fromRGBO(210, 218, 255, 0.5),
                      hintText: "Enter Password",
                      hintStyle: TextStyle(
                        color: Color.fromRGBO(96, 96, 96, 1.0),
                        fontSize: 16,
                        fontWeight: FontWeight.normal,
                        fontFamily: 'Poppins',
                      ),
                      border: OutlineInputBorder(
                        borderRadius: BorderRadius.all(Radius.circular(20)),
                        borderSide: BorderSide.none,
                      ),
                    ),
                  ),
                ),
                const Padding(
                  padding: EdgeInsets.fromLTRB(220, 10, 15, 100),
                  child: Text(
                    "Forgot Password ?",
                    style: TextStyle(
                      color: Color.fromRGBO(86, 86, 86, 1.0),
                      fontSize: 13,
                      fontWeight: FontWeight.normal,
                      fontFamily: 'Poppins',
                    ),
                  ),
                ),
                SizedBox(
                  width: 350,
                  height: 50,
                  child: ElevatedButton(
                    onPressed: () => _loginController.loginUser(context),
                    style: ElevatedButton.styleFrom(
                      backgroundColor: Color.fromRGBO(135, 137, 255, 1.0),
                      shape: RoundedRectangleBorder(
                        side: BorderSide(
                          width: 0,
                          style: BorderStyle.solid,
                          color: Color.fromRGBO(135, 137, 255, 1.0),
                        ),
                        borderRadius: BorderRadius.all(Radius.circular(15)),
                      ),
                    ),
                    child: Text(
                      "LOGIN",
                      style: TextStyle(
                        color: Colors.white,
                        fontWeight: FontWeight.bold,
                        fontSize: 16,
                        fontFamily: 'Poppins',
                      ),
                    ),
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.fromLTRB(0, 10, 0, 20),
                  child: RichText(
                    text: TextSpan(
                      text: 'Dont Have an Account ?  ',
                      style: const TextStyle(
                        fontSize: 14,
                        fontWeight: FontWeight.normal,
                        color: Color.fromRGBO(86, 86, 86, 1.0),
                        fontFamily: 'Poppins',
                      ),
                      children: <TextSpan>[
                        TextSpan(
                          text: 'Contact Admin!',
                          style: const TextStyle(
                            fontSize: 14,
                            fontWeight: FontWeight.w700,
                            color: Color.fromRGBO(135, 137, 255, 1.0),
                            decoration: TextDecoration.underline,
                            fontFamily: 'Poppins',
                          ),
                          recognizer: TapGestureRecognizer()
                            ..onTap = () {
                              // Implement your "Contact Admin" logic here
                            },
                        ),
                      ],
                    ),
                  ),
                ),
              ],
            ),
          ),
          ],
        ),
      ),
      ),
      );
    }
  }
