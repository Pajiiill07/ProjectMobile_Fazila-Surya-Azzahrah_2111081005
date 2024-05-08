<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\Configuration\Group;
use App\Http\Controllers\UserBackendController;
use App\Http\Controllers\PosisiBackendController;
use App\Http\Controllers\DepartmentBackendController;
use App\Http\Controllers\AbsenBackendController;
use App\Http\Controllers\GajiBackendController;
use App\Http\Controllers\CutiBackendController;
use App\Http\Controllers\LaporanBackendController;
use App\Http\Controllers\PegawaiBackendController;
use App\Http\Controllers\EvaluasiBackendController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::resource('user-backend', UserBackendController::class)->middleware('checkRole:Admin');
Route::resource('department-backend', DepartmentBackendController::class);
Route::resource('posisi-backend', PosisiBackendController::class);
Route::resource('pegawai-backend', PegawaiBackendController::class);
Route::resource('absen-backend', AbsenBackendController::class);
Route::resource('gaji-backend', GajiBackendController::class);
Route::resource('cuti-backend', CutiBackendController::class);
Route::put('/approve-cuti/{id}', [CutiBackendController::class, 'approve'])->name('approve.cuti');
Route::put('/reject-cuti/{id}', [CutiBackendController::class, 'reject'])->name('reject.cuti');

Route::resource('laporan-backend', LaporanBackendController::class);
Route::resource('evaluasi-backend', EvaluasiBackendController::class);


Route::get('/login', [LoginController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'authenticate']);

Route::post('/logout', [LoginController::class,'logout']);

// // Rute untuk tampilan dan data pengguna
// Route::get('user-backend', [UserBackendController::class, 'index']);
// Route::post('user-backend', [UserBackendController::class, 'store'])->middleware('checkRole:Admin');
// Route::get('user-backend/create', [UserBackendController::class, 'create'])->middleware('checkRole:Admin');
// Route::get('user-backend/{user_backend}/edit', [UserBackendController::class, 'edit'])->middleware('checkRole:Admin');
// Route::put('user-backend/{user_backend}', [UserBackendController::class, 'update'])->middleware('checkRole:Admin');
// Route::delete('user-backend/{user_id}', [UserBackendController::class, 'destroy'])->middleware('checkRole:Admin');

// // Rute untuk tampilan dan data departemen
// Route::get('department-backend', [DepartmentBackendController::class, 'index']);
// Route::post('department-backend', [DepartmentBackendController::class, 'store'])->middleware('checkRole:Admin');
// Route::get('department-backend/create', [DepartmentBackendController::class, 'create'])->middleware('checkRole:Admin');
// Route::get('department-backend/{department_backend}/edit', [DepartmentBackendController::class, 'edit'])->middleware('checkRole:Admin');
// Route::put('department-backend/{department_backend}', [DepartmentBackendController::class, 'update'])->middleware('checkRole:Admin');
// Route::delete('department-backend/{department_backend}', [DepartmentBackendController::class, 'destroy'])->middleware('checkRole:Admin');

// // Rute untuk tampilan dan data posisi
// Route::get('posisi-backend', [PosisiBackendController::class, 'index']);
// Route::post('posisi-backend', [PosisiBackendController::class, 'store'])->middleware('checkRole:Admin');
// Route::get('posisi-backend/create', [PosisiBackendController::class, 'create'])->middleware('checkRole:Admin');
// Route::get('posisi-backend/{posisi_backend}/edit', [PosisiBackendController::class, 'edit'])->middleware('checkRole:Admin');
// Route::put('posisi-backend/{posisi_backend}', [PosisiBackendController::class, 'update'])->middleware('checkRole:Admin');
// Route::delete('posisi-backend/{posisi_backend}', [PosisiBackendController::class, 'destroy'])->middleware('checkRole:Admin');

// // Rute untuk tampilan dan data pegawai
// Route::get('pegawai-backend', [PegawaiBackendController::class, 'index']);
// Route::post('pegawai-backend', [PegawaiBackendController::class, 'store'])->middleware('checkRole:Admin');
// Route::get('pegawai-backend/create', [PegawaiBackendController::class, 'create'])->middleware('checkRole:Admin');
// Route::get('pegawai-backend/{pegawai_backend}/edit', [PegawaiBackendController::class, 'edit'])->middleware('checkRole:Admin');
// Route::put('pegawai-backend/{pegawai_backend}', [PegawaiBackendController::class, 'update'])->middleware('checkRole:Admin');
// Route::delete('pegawai-backend/{pegawai_id}', [PegawaiBackendController::class, 'destroy'])->middleware('checkRole:Admin');


// // Rute untuk tampilan dan data absen
// Route::get('absen-backend', [AbsenBackendController::class, 'index']);
// Route::post('absen-backend', [AbsenBackendController::class, 'store'])->middleware('checkRole:Admin');
// Route::get('absen-backend/create', [AbsenBackendController::class, 'create'])->middleware('checkRole:Admin');
// Route::get('absen-backend/{absen_backend}/edit', [AbsenBackendController::class, 'edit'])->middleware('checkRole:Admin');
// Route::put('absen-backend/{absen_backend}', [AbsenBackendController::class, 'update'])->middleware('checkRole:Admin');
// Route::delete('absen-backend/{absen_backend}', [AbsenBackendController::class, 'destroy'])->middleware('checkRole:Admin');

// // Rute untuk tampilan dan data gaji
// Route::get('gaji-backend', [GajiBackendController::class, 'index']);
// Route::post('gaji-backend', [GajiBackendController::class, 'store'])->middleware('checkRole:Keuangan');
// Route::get('gaji-backend/create', [GajiBackendController::class, 'create'])->middleware('checkRole:Keuangan');
// Route::get('gaji-backend/{gaji_backend}/edit', [GajiBackendController::class, 'edit'])->middleware('checkRole:Keuangan');
// Route::put('gaji-backend/{gaji_backend}', [GajiBackendController::class, 'update'])->middleware('checkRole:Keuangan');
// Route::delete('gaji-backend/{gaji_backend}', [GajiBackendController::class, 'destroy'])->middleware('checkRole:Keuangan');

// // Rute untuk tampilan dan data cuti
// Route::get('cuti-backend', [CutiBackendController::class, 'index']);
// Route::post('cuti-backend', [CutiBackendController::class, 'store'])->middleware('checkRole:Manager');
// Route::get('cuti-backend/create', [CutiBackendController::class, 'create'])->middleware('checkRole:Manager');
// Route::get('cuti-backend/{cuti_backend}/edit', [CutiBackendController::class, 'edit'])->middleware('checkRole:Manager');
// Route::put('cuti-backend/{cuti_backend}', [CutiBackendController::class, 'update'])->middleware('checkRole:Manager');
// Route::delete('cuti-backend/{cuti_backend}', [CutiBackendController::class, 'destroy'])->middleware('checkRole:Manager');

// // Rute untuk tampilan dan data laporan
// Route::get('laporan-backend', [LaporanBackendController::class, 'index']);
// Route::post('laporan-backend', [LaporanBackendController::class, 'store']);
// Route::get('laporan-backend/create', [LaporanBackendController::class, 'create']);
// Route::get('laporan-backend/{laporan_backend}', [LaporanBackendController::class, 'show']);
// Route::get('laporan-backend/{laporan_backend}/edit', [LaporanBackendController::class, 'edit']);
// Route::put('laporan-backend/{laporan_backend}', [LaporanBackendController::class, 'update']);
// Route::delete('laporan-backend/{laporan_backend}', [LaporanBackendController::class, 'destroy']);

// // Rute untuk tampilan dan data evaluasi
// Route::get('evaluasi-backend', [EvaluasiBackendController::class, 'index']);
// Route::post('evaluasi-backend', [EvaluasiBackendController::class, 'store'])->middleware('checkRole:Manager');
// Route::get('evaluasi-backend/create', [EvaluasiBackendController::class, 'create'])->middleware('checkRole:Manager');
// Route::get('evaluasi-backend/{evaluasi_backend}', [EvaluasiBackendController::class, 'show'])->middleware('checkRole:Manager');
// Route::get('evaluasi-backend/{evaluasi_backend}/edit', [EvaluasiBackendController::class, 'edit'])->middleware('checkRole:Manager');
// Route::put('evaluasi-backend/{evaluasi_backend}', [EvaluasiBackendController::class, 'update'])->middleware('checkRole:Manager');
// Route::delete('evaluasi-backend/{evaluasi_backend}', [EvaluasiBackendController::class, 'destroy'])->middleware('checkRole:Manager');
