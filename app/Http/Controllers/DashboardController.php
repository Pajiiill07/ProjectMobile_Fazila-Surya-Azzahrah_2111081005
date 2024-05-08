<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Evaluasi;
use App\Models\Karyawan;
use App\Models\Pelatihan;
use App\Models\Posisi;

class DashboardController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::paginate(5);
        $totalKaryawans = Karyawan::count();
        $departments = Department::all();
        $posisis = Posisi::all();
        $evaluasis = Evaluasi::all();
        $pelatihans = Pelatihan::all();
        return view('backend.dashboard.index',[
            'karyawans' => $karyawans,
            'totalKaryawans' => $totalKaryawans,
            'departments' => $departments,
            'posisis' => $posisis,
            'evaluasis' => $evaluasis,
            'pelatihans' => $pelatihans
        ]);
    }
}
