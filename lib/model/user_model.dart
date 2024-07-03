class User {
  final int id;
  final String username;
  final String email;
  final String password;
  final String hakAkses;

  User({
    required this.id,
    required this.username,
    required this.email,
    required this.password,
    required this.hakAkses,
  });

  factory User.fromJson(Map<String, dynamic> json) {
    return User(
      id: json['user_id'],
      username: json['username'],
      email: json['email'],
      password: json['password'],
      hakAkses: json['hak_akses'],
    );
  }
}
