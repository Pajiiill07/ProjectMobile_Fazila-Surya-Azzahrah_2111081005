<?php

namespace App\Http\Controllers;
use App\Models\Cuti;
use App\Models\Pegawai;

use Illuminate\Http\Request;

class CutiBackendController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkRole:Manager')->only(['approve', 'reject']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.cuti.index',['cutis'=>Cuti::orderBy('cuti_id', 'asc')->get()]);
    }
    
    // Method untuk menyetujui pengajuan cuti
    public function approve($cuti_id)
    {
        $cuti = Cuti::findOrFail($cuti_id);
        $cuti->status_pengajuan = 'approved';
        $cuti->save();

        return redirect()->back()->with('success', 'Pengajuan cuti berhasil disetujui');
    }

    // Method untuk menolak pengajuan cuti
    public function reject($cuti_id)
    {
        $cuti = Cuti::findOrFail($cuti_id);
        $cuti->status_pengajuan = 'rejected';
        $cuti->save();

        return redirect()->back()->with('success', 'Pengajuan cuti berhasil ditolak');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $pegawais = Pegawai::all();
        // return view('content.cuti.create', ['pegawais' => $pegawais]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $cuti_id)
    {
        Cuti::destroy($cuti_id);
        return redirect('/cuti-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
