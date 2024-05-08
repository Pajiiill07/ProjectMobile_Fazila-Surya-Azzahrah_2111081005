<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cuti;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuti = Cuti::orderBy('cuti_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $cuti
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pegawai_id' => 'required|integer',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
        ]);
    
        // Hitung jumlah hari kerja dalam rentang tanggal cuti
        $hari_kerja = $this->hitungHariKerja($request->tanggal_mulai, $request->tanggal_selesai);
    
        // Dapatkan jatah cuti tersisa
        $cuti = Cuti::where('pegawai_id', $request->pegawai_id)->first();
        $jatah_cuti_tersisa = $cuti ? $cuti->jatah_cuti : 12; // Jika belum ada data cuti, maka jatah cuti default adalah 12 hari
    
        // Validasi jatah cuti
        if ($hari_kerja > $jatah_cuti_tersisa) {
            return response()->json(['message' => 'Jatah cuti tidak mencukupi'], 400);
        }
    
        // Simpan data pengajuan cuti
        $cuti = new Cuti();
        $cuti->fill($request->all());
        $cuti->status_pengajuan = 'pending approval';
        $cuti->save();
    
        // Kurangi jatah cuti hanya pada hari kerja
        // if ($cuti) {
        //     $cuti->jatah_cuti -= $hari_kerja;
        //     $cuti->save();
        // }
    
        return response()->json(['message' => 'Pengajuan cuti berhasil diajukan'], 201);
    }
    
    private function hitungHariKerja($tanggal_mulai, $tanggal_selesai)
    {
        $tanggal_mulai = Carbon::parse($tanggal_mulai);
        $tanggal_selesai = Carbon::parse($tanggal_selesai);
    
        $hari_kerja = 0;
        $tanggal = $tanggal_mulai->copy();
        while ($tanggal->lte($tanggal_selesai)) {
            if ($tanggal->isWeekday()) { // Periksa apakah hari kerja (Senin hingga Jumat)
                $hari_kerja++;
            }
            $tanggal->addDay(); // Tambah satu hari
        }
    
        return $hari_kerja;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $cuti_id)
    {
        $show = Cuti::find($cuti_id);
        if($show){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $show
            ], 200);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditemukan'
            ], 404);
        }
    }

    public function approve($cuti_id)
    {
        $cuti = Cuti::findOrFail($cuti_id);

        // Periksa apakah pengajuan cuti telah disetujui sebelumnya
        if ($cuti->status_pengajuan !== 'approved') {
            // Kurangi jatah cuti hanya jika pengajuan cuti belum disetujui sebelumnya
            $cuti->status_pengajuan = 'approved';
            $hari_kerja = $this->hitungHariKerja($cuti->tanggal_mulai, $cuti->tanggal_selesai);
            $cuti->jatah_cuti -= $hari_kerja;
            $cuti->save();

            return redirect()->back()->with('success', 'Pengajuan cuti berhasil disetujui');
        } else {
            return redirect()->back()->with('error', 'Pengajuan cuti sudah disetujui sebelumnya');
        }
    }

    public function reject($cuti_id)
    {
        $cuti = Cuti::findOrFail($cuti_id);

        // Periksa apakah pengajuan cuti telah disetujui sebelumnya
        if ($cuti->status_pengajuan !== 'approved') {
            // Tidak ada aksi yang dilakukan jika pengajuan cuti belum disetujui sebelumnya
            $cuti->status_pengajuan = 'rejected';
            $cuti->save();

            return redirect()->back()->with('success', 'Pengajuan cuti berhasil ditolak');
        } else {
            return redirect()->back()->with('error', 'Pengajuan cuti sudah disetujui sebelumnya');
        }
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
    public function destroy(string $id)
    {
        //
    }
}
