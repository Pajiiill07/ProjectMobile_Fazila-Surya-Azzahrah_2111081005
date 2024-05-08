<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use App\Models\Pegawai;

use Illuminate\Http\Request;

class LaporanBackendController extends Controller
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
        return view('content.laporan.index',[
            'lprns'=>Laporan::orderBy('laporan_id', 'asc')->get(),
            'pegawais' => Pegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('content.laporan.create', [
        //     'pegawais' => Pegawais::all(),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validatedData=$request->validate([
        //     'pegawai_id'=>'required',
        //     'tanggal_laporan'=>'required',
        //     'tanggal_submit'=>'required',
        //     'judul_laporan'=>'required',
        //     'isi_laporan'=>'required',
        // ]);

        // Laporan::create($validatedData);
        // return redirect('/laporan-backend')->with('pesan','Data Berhasil di Simpan');
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
        // $laporan = Laporan::find($laporan_id);

        // if (!$laporan) {
        //     return response()->json(['error' => 'laporan not found'], 404);
        // }

        // $pegawais = Pegawai::all();

        // return view('content.laporan.update', compact('laporan', 'pegawais'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $laporan_id)
    {
        // $validatedData=$request->validate([
        //     'pegawai_id'=>'required',
        //     'tanggal_laporan'=>'required',
        //     'tanggal_submit'=>'required',
        //     'judul_laporan'=>'required',
        //     'isi_laporan'=>'required',
        // ]);

        // Laporan::where('laporan_id', $laporan_id)->update($validatedData);
        // return redirect('/laporan-backend')->with('pesan','Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $laporan_id)
    {
        Laporan::destroy($laporan_id);
        return redirect('/laporan-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
