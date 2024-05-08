<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentBackendController extends Controller
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
        return view('content.department.index',['dpts'=>Department::orderBy('department_id', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.department.create',['dpts'=>Department::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'nama_department'=>'required',
            'deskripsi'=>'required',
        ]);

        Department::create($validatedData);
        return redirect('/department-backend')->with('pesan','Data Berhasil di Simpan');
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
    public function edit(string $department_id)
    {
        $item = Department::find($department_id);
        // Pastikan $item tidak null sebelum diubah menjadi JSON
        if (!$item) {
            return response()->json(['error' => 'Department not found'], 404);
        }

        return response()->json($item);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $department_id)
    {
        $validatedData = $request->validate([
            'nama_department'=>'required',
            'deskripsi'=>'required',
        ]);
        Department::where('department_id', $department_id)->update($validatedData);
        return redirect('/department-backend')->with('pesan', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $department_id)
    {
        Department::destroy($department_id);
        return redirect('/department-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
