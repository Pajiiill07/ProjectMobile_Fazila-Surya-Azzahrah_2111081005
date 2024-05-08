<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dpt = Department::orderBy('department_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $dpt
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datadpt = new Department;
        // $rules = [
        //     'nama_department' => 'required',
        //     'deskripsi' => 'required'
        // ];
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data gagal disimpan',
        //         'data' => $validator->errors()
        //     ]);
        // }

        // $datadpt->nama_department = $request->nama_department;
        // $datadpt->deskripsi = $request->deskripsi;

        // $post = $datadpt->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil disimpan',

        // ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $department_id)
    {
        $dpt = Department::find($department_id);
        if($dpt){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $dpt
            ], 200);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditemukan'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $department_id)
    {
        // $datadpt = Department::find($department_id);
        // if (empty($datadpt)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }
        // $rules = [
        //     'nama_department' => 'required',
        //     'deskripsi' => 'required'
        // ];
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data gagal diupdate',
        //         'data' => $validator->errors()
        //     ]);
        // }

        // $datadpt->nama_department = $request->nama_department;
        // $datadpt->deskripsi = $request->deskripsi;

        // $post = $datadpt->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil diupdate',

        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $department_id)
    {
        // $datadpt = Department::find($department_id);
        // if (empty($datadpt)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }

        // $post = $datadpt->delete();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil dihapus',

        // ]);
    }
}
