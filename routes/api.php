<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\PosisiController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LaporanController;
use App\Http\Controllers\Api\EvaluasiController;
use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\PegawaiController;
use App\Http\Controllers\Api\GajiController;
use App\Http\Controllers\Api\CutiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Department API
Route::get('department', [DepartmentController::class, 'index']);
Route::get('department/{department_id}', [DepartmentController::class, 'show']);
// Route::post('department', [DepartmentController::class, 'store']);
// Route::put('department/{department_id}', [DepartmentController::class, 'update']);
// Route::delete('department/{department_id}', [DepartmentController::class, 'destroy']);

//Posisi API
Route::get('posisi', [PosisiController::class, 'index']);
Route::get('posisi/{posisi_id}', [PosisiController::class, 'show']);
// Route::post('posisi', [PosisiController::class, 'store']);
// Route::put('posisi/{posisi_id}', [PosisiController::class, 'update']);
// Route::delete('posisi/{posisi_id}', [PosisiController::class, 'destroy']);

//User API
Route::get('user', [UserController::class, 'index']);
Route::get('user/{user_id}', [UserController::class, 'show']);
// Route::post('user', [UserController::class, 'store']);
Route::put('user/{user_id}', [UserController::class, 'update']);
// Route::delete('user/{user_id}', [UserController::class, 'destroy']);

//Laporan API
Route::get('laporan', [LaporanController::class, 'index']);
Route::get('laporan/{laporan_id}', [LaporanController::class, 'show']);
Route::post('laporan', [LaporanController::class, 'store']);
Route::put('laporan/{laporan_id}', [LaporanController::class, 'update']);
Route::delete('laporan/{laporan_id}', [LaporanController::class, 'destroy']);

//Evaluasi API
Route::get('evaluasi', [EvaluasiController::class, 'index']);
Route::get('evaluasi/{evaluasi_id}', [EvaluasiController::class, 'show']);
// Route::post('evaluasi', [EvaluasiController::class, 'store']);
// Route::put('evaluasi/{evaluasi_id}', [EvaluasiController::class, 'update']);
// Route::delete('evaluasi/{evaluasi_id}', [EvaluasiController::class, 'destroy']);


//Absen API
Route::get('absen', [AbsenController::class, 'index']);
Route::get('absen/{absen_id}', [AbsenController::class, 'show']);
Route::post('absen', [AbsenController::class, 'store']);
Route::put('absen/{absen_id}', [AbsenController::class, 'update']);
// Route::delete('absen/{absen_id}', [AbsenController::class, 'destroy']);

//Pegawai API
Route::get('pegawai', [PegawaiController::class, 'index']);
Route::get('pegawai/{pegawai_id}', [PegawaiController::class, 'show']);
Route::post('pegawai', [PegawaiController::class, 'store']);
Route::put('pegawai/{pegawai_id}', [PegawaiController::class, 'update']);
// Route::delete('pegawai/{pegawai_id}', [PegawaiController::class, 'destroy']);

//Gaji API
Route::get('gaji', [GajiController::class, 'index']);
Route::get('gaji/{gaji_id}', [GajiController::class, 'show']);

//Cuti API
Route::get('cuti', [CutiController::class, 'index']);
Route::post('cuti', [CutiController::class, 'store']);
Route::put('/cuti/approve/{id}', [CutiController::class, 'approve'])->name('cuti.approve');
Route::put('/cuti/reject/{id}', [CutiController::class, 'reject'])->name('cuti.reject');