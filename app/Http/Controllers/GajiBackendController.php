<?php

namespace App\Http\Controllers;
use App\Models\Gaji;
use App\Models\Pegawai;
use App\Models\Posisi;

use Illuminate\Http\Request;

class GajiBackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:Keuangan')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.gaji.index',[
            'gajis'=>Gaji::orderBy('gaji_id', 'asc')->get(),
            'pegawais' => Pegawai::all(),
            'posisis' => Posisi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.gaji.create', [
            'gajis' => Gaji::all(),
            'posisis' => Posisi::all(),
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'posisi_id' => 'required|integer',
            'pegawai_id' => 'required|integer',
            'periode_penggajian' => 'required',
        ]);

        // Ambil data gaji pokok dari tabel posisi
        $posisi = Posisi::find($request->posisi_id);
        if (!$posisi) {
            return response()->json([
                'status' => 'error',
                'message' => 'Posisi tidak ditemukan.'
            ], 404);
        }

        // Hitung tunjangan (10% dari gaji pokok)
        $tunjangan = $posisi->gaji_pokok * 0.1;

        // Hitung PPH sesuai ketentuan
        $gaji_pokok = $posisi->gaji_pokok;
        if ($gaji_pokok <= 50000000) {
            $pph = $gaji_pokok * 0.05;
        } elseif ($gaji_pokok <= 250000000) {
            $pph = $gaji_pokok * 0.15;
        } elseif ($gaji_pokok <= 500000000) {
            $pph = $gaji_pokok * 0.25;
        } else {
            $pph = $gaji_pokok * 0.3;
        }

        // Hitung total gaji
        $total_gaji = $gaji_pokok + $tunjangan - $pph;

        // Simpan data gaji ke dalam tabel gaji
        $gaji = new Gaji();
        $gaji->pegawai_id = $request->pegawai_id;
        $gaji->posisi_id = $request->posisi_id;
        $gaji->gaji_pokok = $gaji_pokok;
        $gaji->tunjangan = $tunjangan;
        $gaji->pph = $pph;
        $gaji->total_gaji = $total_gaji;
        $gaji->periode_penggajian = $request->periode_penggajian;
        $gaji->save();

        // Redirect atau response sesuai kebutuhan
        return redirect('/gaji-backend')->with('pesan', 'Data Berhasil Dihitung dan Disimpan.');
    }

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
    public function edit(string $gaji_id)
    {
        $gajis = Gaji::find($gaji_id);
        return response()->json($gajis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'posisi_id' => 'required|integer',
            'pegawai_id' => 'required|integer',
            'periode_penggajian' => 'required',
        ]);
    
        // Cari data gaji yang akan diupdate
        $gaji = Gaji::find($id);
        if (!$gaji) {
            return redirect('/gaji-backend')->with('error', 'Data gaji tidak ditemukan.');
        }
    
        // Ambil data gaji pokok dari tabel posisi
        $posisi = Posisi::find($request->posisi_id);
        if (!$posisi) {
            return redirect('/gaji-backend')->with('error', 'Posisi tidak ditemukan.');
        }
    
        // Hitung tunjangan (10% dari gaji pokok)
        $tunjangan = $posisi->gaji_pokok * 0.1;
    
        // Hitung PPH sesuai ketentuan
        $gaji_pokok = $posisi->gaji_pokok;
        if ($gaji_pokok <= 50000000) {
            $pph = $gaji_pokok * 0.05;
        } elseif ($gaji_pokok <= 250000000) {
            $pph = $gaji_pokok * 0.15;
        } elseif ($gaji_pokok <= 500000000) {
            $pph = $gaji_pokok * 0.25;
        } else {
            $pph = $gaji_pokok * 0.3;
        }
    
        // Hitung total gaji
        $total_gaji = $gaji_pokok + $tunjangan - $pph;
    
        // Update data gaji
        $gaji->pegawai_id = $request->pegawai_id;
        $gaji->posisi_id = $request->posisi_id;
        $gaji->gaji_pokok = $gaji_pokok;
        $gaji->tunjangan = $tunjangan;
        $gaji->pph = $pph;
        $gaji->total_gaji = $total_gaji;
        $gaji->periode_penggajian = $request->periode_penggajian;
        $gaji->save();
    
        // Redirect sesuai kebutuhan
        return redirect('/gaji-backend')->with('pesan', 'Data Gaji Berhasil Diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $gaji_id)
    {
        Gaji::destroy($gaji_id);
        return redirect('/gaji-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
