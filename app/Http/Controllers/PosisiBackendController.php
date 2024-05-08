<?php

namespace App\Http\Controllers;
use App\Models\Posisi;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class PosisiBackendController extends Controller
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
        return view('content.posisi.index', [
            'posisis' => Posisi::orderBy('posisi_id', 'asc')->get(),
            'departments' => Department::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.posisi.create', ['departments' => Department::all()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'department_id'=>'required',
            'nama_posisi'=>'required',
            'deskripsi'=>'required',
            'gaji_pokok'=>'required',
        ]);

        Posisi::create($validatedData);
        return redirect('/posisi-backend')->with('pesan','Data Berhasil di Simpan');
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
    public function edit(string $posisi_id)
    {
        $posisi = Posisi::find($posisi_id);
        return response()->json($posisi);
        // if (!$posisi) {
        //     return response()->json(['error' => 'Posisi not found'], 404);
        // }

        // $departments = Department::all();

        // return view('content.posisi.update', compact('posisi', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $posisi_id)
    {
        $validatedData=$request->validate([
            'department_id'=>'required',
            'nama_posisi'=>'required',
            'deskripsi'=>'required',
            'gaji_pokok'=>'required',
        ]);

        Posisi::where('posisi_id', $posisi_id)->update($request->only(['department_id', 'nama_posisi', 'deskripsi']));
        return redirect('/posisi-backend')->with('pesan','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $posisi_id)
    {
        Posisi::destroy($posisi_id);
        return redirect('/posisi-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
