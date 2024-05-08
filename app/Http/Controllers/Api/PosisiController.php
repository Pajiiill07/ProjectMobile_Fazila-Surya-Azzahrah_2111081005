<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Posisi;

class PosisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pss = Posisi::orderBy('posisi_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $pss
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datapss = new Posisi;
        // $rules = [
        //     'department_id' => 'required',
        //     'nama_posisi' => 'required',
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

        // $datapss->department_id = $request->department_id;
        // $datapss->nama_posisi = $request->nama_posisi;
        // $datapss->deskripsi = $request->deskripsi;

        // $post = $datapss->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil disimpan',

        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $posisi_id)
    {
        $pss = Posisi::find($posisi_id);
        if($pss){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $pss
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
    public function update(Request $request, string $posisi_id)
    {
        // $datapss = Posisi::find($posisi_id);
        // if (empty($datapss)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }
        // $rules = [
        //     'department_id' => 'required',
        //     'nama_posisi' => 'required',
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

        // $datapss->department_id = $request->department_id;
        // $datapss->nama_posisi = $request->nama_posisi;
        // $datapss->deskripsi = $request->deskripsi;

        // $post = $datapss->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil diupdate',

        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $posisi_id)
    {
        // $datapss = Posisi::find($posisi_id);
        // if (empty($datapss)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }

        // $post = $datapss->delete();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil dihapus',

        // ]);
    }
}
