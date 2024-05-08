<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Posisi;
use App\Models\User;

class PegawaiBackendController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.pegawai.index', [
            'pegawais' => Pegawai::orderBy('pegawai_id', 'asc')->get(),
            'users' => User::all(),
            'posisis' => Posisi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.pegawai.create', [
            'users' => User::all(),
            'posisis' => Posisi::all(),
            'pegawais' => Pegawai::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'user_id' => 'required|integer',
            'posisi_id' => 'required|integer',
            'manager_id' => 'nullable|integer',
            'nama_lengkap' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'pendidikan_terakhir' => 'required|string',
            'foto_profile' => 'required|string',
            'tanggal_mulai' => 'required|date',
        ]);

        Pegawai::create($validatedData);
        return redirect('/pegawai-backend')->with('success', 'Pegawai berhasil ditambahkan.');
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
    public function edit(string $pegawai_id)
    {
        $pegawai = Pegawai::find($pegawai_id);
        return response()->json($pegawai);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $pegawai_id)
    {
        $validatedData=$request->validate([
            'user_id' => 'required|integer',
            'posisi_id' => 'required|integer',
            'manager_id' => 'nullable|integer',
            'nama_lengkap' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'pendidikan_terakhir' => 'required|string',
            'foto_profile' => 'required|string',
            'tanggal_mulai' => 'required|date',
        ]);

        Pegawai::where('pegawai_id', $pegawai_id)->update($validatedData);
        return redirect('/pegawai-backend')->with('pesan', 'Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pegawai_id)
    {
        Pegawai::destroy($pegawai_id);
        return redirect('/pegawai-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
