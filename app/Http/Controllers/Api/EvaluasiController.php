<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Evaluasi;

class EvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evls = Evaluasi::orderBy('evaluasi_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $evls
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $dataevls = new Evaluasi;
        // $rules = [
        //     'pegawai_id' => 'required',
        //     'tanggal_evaluasi' => 'required',
        //     'penilaian_absensi' => 'required',
        //     'penilaian_pelaporan' => 'required',
        //     'catatan_dan_komentar' => 'required',
        // ];
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data gagal disimpan',
        //         'data' => $validator->errors()
        //     ]);
        // }

        // $dataevls->pegawai_id = $request->pegawai_id;
        // $dataevls->tanggal_evaluasi = $request->tanggal_evaluasi;
        // $dataevls->penilaian_absensi = $request->penilaian_absensi;
        // $dataevls->penilaian_pelaporan = $request->penilaian_pelaporan;
        // $dataevls->catatan_dan_komentar = $request->catatan_dan_komentar;

        // $post = $dataevls->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil disimpan',

        // ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $evaluasi_id)
    {
        $evls = Evaluasi::find($evaluasi_id);
        if($evls){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $evls
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
    public function update(Request $request, string $evaluasi_id)
    {
        // $dataevls = Evaluasi::find($evaluasi_id);
        // if (empty($dataevls)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }
        // $rules = [
        //     'pegawai_id' => 'required',
        //     'tanggal_evaluasi' => 'required',
        //     'penilaian_absensi' => 'required',
        //     'penilaian_pelaporan' => 'required',
        //     'catatan_dan_komentar' => 'required',
        // ];
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data gagal diupdate',
        //         'data' => $validator->errors()
        //     ]);
        // }

        // $dataevls->pegawai_id = $request->pegawai_id;
        // $dataevls->tanggal_evaluasi = $request->tanggal_evaluasi;
        // $dataevls->penilaian_absensi = $request->penilaian_absensi;
        // $dataevls->penilaian_pelaporan = $request->penilaian_pelaporan;
        // $dataevls->catatan_dan_komentar = $request->catatan_dan_komentar;

        // $post = $dataevls->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil diupdate',

        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $evaluasi_id)
    {
        // $dataevls = Evaluasi::find($evaluasi_id);
        // if (empty($dataevls)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }

        // $post = $dataevls->delete();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil dihapus',

        // ]);
    }
}
