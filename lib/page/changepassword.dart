import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';

class UpdateUserPage extends StatefulWidget {
  @override
  _UpdateUserPageState createState() => _UpdateUserPageState();
}

class _UpdateUserPageState extends State<UpdateUserPage> {
  final _formKey = GlobalKey<FormState>();
  final _iduserController = TextEditingController();
  final _usernameController = TextEditingController();
  final _emailController = TextEditingController();
  final _passwordController = TextEditingController();

  final Api _apiService = Api();
  bool _isLoading = true;

  @override
  void initState() {
    super.initState();
    _loadUserData();
  }

  void _loadUserData() async {
    try {
      final user = await _apiService.getUserData();
      setState(() {
        _iduserController.text = user.id.toString();
        _usernameController.text = user.username ?? '';
        _emailController.text = user.email ?? '';
        _passwordController.text = user.password ?? '';
        _isLoading = false;
      });
    } catch (e) {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Failed to load user data: $e')),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Update User'),
      ),
      body: _isLoading
          ? Center(child: CircularProgressIndicator())
          : Padding(
        padding: EdgeInsets.all(30),
        child: Form(
          key: _formKey,
          child: Column(
            children: [
              SizedBox(
                height: 50,
                child: TextFormField(
                  controller: _iduserController,
                  decoration: InputDecoration(
                    filled: true,
                    fillColor: Color.fromRGBO(220, 218, 255, 0.5),
                    hintText: "user_id",
                    hintStyle: TextStyle(
                      color: Color.fromRGBO(96, 96, 96, 1.0),
                      fontSize: 16,
                      fontWeight: FontWeight.normal,
                      fontFamily: 'Poppins',
                    ),
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.all(Radius.circular(15)),
                      borderSide: BorderSide.none,
                    ),
                  ),
                  enabled: false,
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Please enter username';
                    }
                    return null;
                  },
                ),
              ),
              SizedBox(height: 20,),
              SizedBox(
                height: 50,
                child: TextFormField(
                  controller: _usernameController,
                  decoration: InputDecoration(
                    filled: true,
                    fillColor: Color.fromRGBO(220, 218, 255, 0.5),
                    hintText: "Username",
                    hintStyle: TextStyle(
                      color: Color.fromRGBO(96, 96, 96, 1.0),
                      fontSize: 16,
                      fontWeight: FontWeight.normal,
                      fontFamily: 'Poppins',
                    ),
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.all(Radius.circular(15)),
                      borderSide: BorderSide.none,
                    ),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Please enter username';
                    }
                    return null;
                  },
                ),
              ),
              SizedBox(height: 20,),
              SizedBox(
                height: 50,
                child: TextFormField(
                  controller: _emailController,
                  decoration: InputDecoration(
                    filled: true,
                    fillColor: Color.fromRGBO(220, 218, 255, 0.5),
                    hintText: "Email",
                    hintStyle: TextStyle(
                      color: Color.fromRGBO(96, 96, 96, 1.0),
                      fontSize: 16,
                      fontWeight: FontWeight.normal,
                      fontFamily: 'Poppins',
                    ),
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.all(Radius.circular(15)),
                      borderSide: BorderSide.none,
                    ),
                  ),
                  validator: (value) {
                    if (value == null || value.isEmpty) {
                      return 'Please enter email';
                    }
                    if (!RegExp(r'^[^@]+@[^@]+\.[^@]+').hasMatch(value)) {
                      return 'Please enter a valid email address';
                    }
                    return null;
                  },
                ),
              ),
              SizedBox(height: 20,),
              SizedBox(
                height: 50,
                child: TextFormField(
                  controller: _passwordController,
                  decoration: InputDecoration(
                    filled: true,
                    fillColor: Color.fromRGBO(220, 218, 255, 0.5),
                    hintText: "Password",
                    hintStyle: TextStyle(
                      color: Color.fromRGBO(96, 96, 96, 1.0),
                      fontSize: 16,
                      fontWeight: FontWeight.normal,
                      fontFamily: 'Poppins',
                    ),
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.all(Radius.circular(15)),
                      borderSide: BorderSide.none,
                    ),
                  ),
                  obscureText: true,
                  validator: (value) {
                    if (value != null && value.length < 6) {
                      return 'Password must be at least 6 characters';
                    }
                    return null;
                  },
                ),
              ),
              SizedBox(height: 30),
              SizedBox(
                width: 350,
                height: 50,
                child: ElevatedButton(
                  onPressed: _updateUser,
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
                    "Update Data",
                    style: TextStyle(
                      color: Colors.white,
                      fontWeight: FontWeight.bold,
                      fontSize: 16,
                      fontFamily: 'Poppins',
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }

  void _updateUser() async {
    if (_formKey.currentState!.validate()) {
      try {
        final result = await _apiService.updateUser(
          _usernameController.text,
          _emailController.text,
          _passwordController.text.isNotEmpty ? _passwordController.text : null,
        );
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text('Update successful: ${result['message']}')),
        );
      } catch (e) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text('Update failed: $e')),
        );
      }
    }
  }
}
