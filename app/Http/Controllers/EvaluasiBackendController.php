<?php

namespace App\Http\Controllers;
use App\Models\Evaluasi;
use App\Models\Pegawai;

use Illuminate\Http\Request;

class EvaluasiBackendController extends Controller
{

    public function __construct()
    {
        $this->middleware('checkRole:Manager')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.evaluasi.index',[
            'evaluasis'=>Evaluasi::orderBy('evaluasi_id', 'asc')->get(),
            'pegawais' => Pegawai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.evaluasi.create', [
            'pegawais' => Pegawais::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'pegawai_id'=>'required',
            'tanggal_evaluasi'=>'required',
            'penilaian_absensi'=>'required',
            'penilaian_pelaporan'=>'required',
            'catatan_dan_komentar'=>'required',
        ]);

        Evaluasi::create($validatedData);
        return redirect('/evaluasi-backend')->with('pesan','Data Berhasil di Simpan');
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
    public function edit(string $evaluasi_id)
    {
        $evaluasis = Evaluasi::find($evaluasi_id);
        return response()->json($evaluasis);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $evaluasi_id)
    {
        $validatedData=$request->validate([
            'pegawai_id'=>'required',
            'tanggal_evaluasi'=>'required',
            'penilaian_absensi'=>'required',
            'penilaian_pelaporan'=>'required',
            'catatan_dan_komentar'=>'required',
        ]);

        Evaluasi::where('evaluasi_id', $evaluasi_id)->update($validatedData);
        return redirect('/evaluasi-backend')->with('pesan','Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $evaluasi_id)
    {
        Evaluasi::destroy($evaluasi_id);
        return redirect('/evaluasi-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
