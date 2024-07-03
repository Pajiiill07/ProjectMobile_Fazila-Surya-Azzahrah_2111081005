import 'package:flutter/material.dart';
import 'package:frontend_projectmobile/api/apiservice.dart';

class FormEditProfile extends StatefulWidget {
  final Map<String, dynamic> dataPegawai;
  final String token;
  FormEditProfile({Key? key, required this.dataPegawai, required this.token})
      : super(key: key);

  @override
  _FormEditProfileState createState() => _FormEditProfileState();
}

class _FormEditProfileState extends State<FormEditProfile> {
  final Api _api = Api();
  bool _isLoading = true;

  final TextEditingController _namaLengkapController = TextEditingController();
  final TextEditingController _noHpController = TextEditingController();
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _alamatController = TextEditingController();
  final TextEditingController _tglLahirController = TextEditingController();
  final TextEditingController _jenisKelaminController = TextEditingController();
  final TextEditingController _pendidikanTerakhirController = TextEditingController();
  final TextEditingController _fotoProfileController = TextEditingController();
  final TextEditingController _tglMulaiController = TextEditingController();

  @override
  void initState() {
    super.initState();
    _populateFieldsWithData();
  }

  void _populateFieldsWithData() {
    _namaLengkapController.text = widget.dataPegawai['nama_lengkap'] ?? '';
    _noHpController.text = widget.dataPegawai['no_hp'] ?? '';
    _emailController.text = widget.dataPegawai['email'] ?? '';
    _alamatController.text = widget.dataPegawai['alamat'] ?? '';
    _tglLahirController.text = widget.dataPegawai['tanggal_lahir'] ?? '';
    _jenisKelaminController.text = widget.dataPegawai['jenis_kelamin'] ?? '';
    _pendidikanTerakhirController.text = widget.dataPegawai['pendidikan_terakhir'] ?? '';
    _fotoProfileController.text = widget.dataPegawai['foto_profile'] ?? '';
    _tglMulaiController.text = widget.dataPegawai['tanggal_mulai'] ?? '';
    setState(() {
      _isLoading = false;
    });
  }

  Future<void> _updateProfile() async {
    try {
      await _api.updatePegawai(
        token: widget.token,
        namaLengkap: _namaLengkapController.text,
        noHp: _noHpController.text,
        email: _emailController.text,
        alamat: _alamatController.text,
        tanggalLahir: _tglLahirController.text,
        jenisKelamin: _jenisKelaminController.text,
        pendidikanTerakhir: _pendidikanTerakhirController.text,
        fotoProfile: _fotoProfileController.text,
        tanggalMulai: _tglMulaiController.text,
      );

      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Profile updated successfully')),
      );
      // Navigate back to the home page and refresh data
      Navigator.pop(context, true);
    } catch (e) {
      print('Error updating profile: $e');
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(content: Text('Failed to update profile')),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    if (_isLoading) {
      return Center(child: CircularProgressIndicator());
    }

    return Column(
      children: [
        SizedBox(
          height: 50,
          child: TextField(
            controller: _namaLengkapController,
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(220, 218, 255, 0.5),
              hintText: "Nama Lengkap",
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
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: TextField(
            controller: _noHpController,
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(220, 218, 255, 0.5),
              hintText: "Nomor Hp",
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
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: TextField(
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
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: TextField(
            controller: _alamatController,
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(220, 218, 255, 0.5),
              hintText: "Alamat",
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
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: InkWell(
            onTap: () async {
              DateTime? pickedDate = await showDatePicker(
                context: context,
                initialDate: DateTime.now(),
                firstDate: DateTime(1900),
                lastDate: DateTime(2100),
              );

              if (pickedDate != null) {
                String formattedDate = "${pickedDate.year}-${pickedDate.month}-${pickedDate.day}";
                _tglLahirController.text = formattedDate;
              }
            },
            child: IgnorePointer(
              child: TextField(
                controller: _tglLahirController,
                decoration: InputDecoration(
                  filled: true,
                  fillColor: Color.fromRGBO(220, 218, 255, 0.5),
                  hintText: "YYYY-MM-DD",
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
              ),
            ),
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: TextField(
            controller: _jenisKelaminController,
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(220, 218, 255, 0.5),
              hintText: "Jenis Kelamin : L/P",
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
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: TextField(
            controller: _pendidikanTerakhirController,
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(220, 218, 255, 0.5),
              hintText: "SLTA, D3, D4/S1, S2, S3",
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
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: TextField(
            controller: _fotoProfileController,
            maxLines: 3, // Memungkinkan untuk input multi-line
            keyboardType: TextInputType.multiline, // Jenis keyboard multi-line
            decoration: InputDecoration(
              filled: true,
              fillColor: Color.fromRGBO(220, 218, 255, 0.5),
              hintText: "Link Foto Profile",
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
          ),
        ),
        SizedBox(height: 20,),
        SizedBox(
          height: 50,
          child: InkWell(
            onTap: () async {
              DateTime? pickedDate = await showDatePicker(
                context: context,
                initialDate: DateTime.now(),
                firstDate: DateTime(1900),
                lastDate: DateTime(2100),
              );

              if (pickedDate != null) {
                String formattedDate = "${pickedDate.year}-${pickedDate.month}-${pickedDate.day}";
                _tglMulaiController.text = formattedDate;
              }
            },
            child: IgnorePointer(
              child: TextField(
                controller: _tglMulaiController,
                decoration: InputDecoration(
                  filled: true,
                  fillColor: Color.fromRGBO(220, 218, 255, 0.5),
                  hintText: "YYYY-MM-DD",
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
              ),
            ),
          ),
        ),
        SizedBox(height: 30,),
        SizedBox(
          width: 350,
          height: 50,
          child: ElevatedButton(
            onPressed: _updateProfile,
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
              "Update Profile",
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
    );
  }
}
