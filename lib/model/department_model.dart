class Department {
  final int departmentId;
  final String namaDepartment;
  final String deskripsi;

  Department({
    required this.departmentId,
    required this.namaDepartment,
    required this.deskripsi
  });

  factory Department.fromJson(Map<String, dynamic> json){
    return Department(
      departmentId: json['department_id'],
      namaDepartment: json['nama_department'],
      deskripsi: json['deskripsi'],
    );
  }

  Map<String, dynamic> toJson(){
    return {
      'department_id' : departmentId,
      'nama_department' : namaDepartment,
      'deskripsi' : deskripsi
    };
  }
}