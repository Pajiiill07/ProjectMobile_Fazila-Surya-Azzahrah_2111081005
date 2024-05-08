<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;
use App\Models\Pegawai;

class AbsenBackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:Admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.absen.index',[
            'absens'=>Absen::orderBy('absen_id', 'asc')->paginate(10),
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('content.absen.create', [
        //     'pegawais' => Pegawai::all()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //     $validatedData = $request->validate([
    //         'pegawai_id' => 'required',
    //         'tanggal' => 'required',
    //         'jam_datang' => 'required',
    //         'jam_pulang' => 'required',
    //         'keterangan' => 'required',
    //     ]);

    //     // Hitung total jam kerja
    //     $total_jamkerja = $this->hitungTotalJamKerja($request->jam_datang, $request->jam_pulang);

    //     // Simpan data absen
    //     $absen = new Absen;
    //     $absen->pegawai_id = $request->pegawai_id;
    //     $absen->tanggal = $request->tanggal;
    //     $absen->jam_datang = $request->jam_datang;
    //     $absen->jam_pulang = $request->jam_pulang;
    //     $absen->total_jamkerja = $total_jamkerja;
    //     $absen->keterangan = $request->keterangan;
    //     $absen->save();

    //     // Redirect atau response sesuai kebutuhan aplikasi
    //     return redirect('/absen')->with('success', 'Data absen berhasil disimpan.');
    }

    // // Metode untuk menghitung total jam kerja
    // private function hitungTotalJamKerja($jam_datang, $jam_pulang)
    // {
    //     $jam_datang = strtotime($jam_datang);
    //     $jam_pulang = strtotime($jam_pulang);
    //     return ($jam_pulang - $jam_datang) / 3600; // Konversi ke jam
    // }

    // Metode untuk menghitung jam lembur
    // private function hitungJamLembur($absen, $total_jamkerja)
    // {
    //     $jam_kerja_normal = 8; // Jam kerja normal per hari
    //     return max(0, $total_jamkerja - $jam_kerja_normal);
    // }

    //  Metode untuk menghitung gaji lembur
    // private function hitungGajiLembur($jam_lembur)
    // {
    //     $tarif_lembur_per_jam = 10000; // Contoh tarif lembur per jam
    //     return $jam_lembur * $tarif_lembur_per_jam;
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $absen_id)
    {
        Absen::destroy($absen_id);
        return redirect('/absen-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
