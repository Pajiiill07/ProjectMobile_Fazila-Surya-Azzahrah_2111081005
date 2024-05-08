<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Laporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lpr = Laporan::orderBy('laporan_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $lpr
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datalpr = new Laporan;
        $rules = [
            'pegawai_id' => 'required',
            'tanggal_laporan' => 'required',
            'tanggal_submit' => 'required',
            'judul_laporan' => 'required',
            'isi_laporan' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan',
                'data' => $validator->errors()
            ]);
        }

        $datalpr->pegawai_id = $request->pegawai_id;
        $datalpr->tanggal_laporan = $request->tanggal_laporan;
        $datalpr->tanggal_submit = $request->tanggal_submit;
        $datalpr->judul_laporan = $request->judul_laporan;
        $datalpr->isi_laporan = $request->isi_laporan;

        $post = $datalpr->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $laporan_id)
    {
        $lpr = Laporan::find($laporan_id);
        if($lpr){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $lpr
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
    public function update(Request $request, string $laporan_id)
    {
        $datalpr = Laporan::find($laporan_id);
        if (empty($datalpr)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        $rules = [
            'pegawai_id' => 'required',
            'tanggal_laporan' => 'required',
            'tanggal_submit' => 'required',
            'judul_laporan' => 'required',
            'isi_laporan' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diupdate',
                'data' => $validator->errors()
            ]);
        }

        $datalpr->pegawai_id = $request->pegawai_id;
        $datalpr->tanggal_laporan = $request->tanggal_laporan;
        $datalpr->tanggal_submit = $request->tanggal_submit;
        $datalpr->judul_laporan = $request->judul_laporan;
        $datalpr->isi_laporan = $request->isi_laporan;

        $post = $datalpr->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $laporan_id)
    {
        $datalpr = Laporan::find($laporan_id);
        if (empty($datalpr)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $post = $datalpr->delete();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil dihapus',

        ]);
    }
}
