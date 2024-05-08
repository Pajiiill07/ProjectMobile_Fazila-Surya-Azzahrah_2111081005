<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absn = Absen::orderBy('absen_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $absn
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'pegawai_id' => 'required',
            'tanggal' => 'required',
            'jam_datang' => 'nullable',
            'jam_pulang' => 'nullable',
            'keterangan' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan',
                'data' => $validator->errors()
            ]);
        }

        $dataabsn = new Absen;
        $dataabsn->pegawai_id = $request->pegawai_id;
        $dataabsn->tanggal = $request->tanggal;
        $dataabsn->jam_datang = $request->jam_datang;
        $dataabsn->jam_pulang = $request->jam_pulang;
        $dataabsn->keterangan = $request->keterangan;

        $post = $dataabsn->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $dataabsn
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $absen_id)
    {
        $absn = Absen::find($absen_id);
        if($absn){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $absn
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
    public function update(Request $request, string $absen_id)
    {
        $dataabsn = Absen::find($absen_id);
        if (empty($dataabsn)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'pegawai_id' => 'required',
            'tanggal' => 'required',
            'jam_datang' => 'nullable',
            'jam_pulang' => 'nullable',
            'keterangan' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diupdate',
                'data' => $validator->errors()
            ]);
        }

        $dataabsn->pegawai_id = $request->pegawai_id;
        $dataabsn->tanggal = $request->tanggal;
        $dataabsn->jam_datang = $request->jam_datang;
        $dataabsn->jam_pulang = $request->jam_pulang;
        $dataabsn->keterangan = $request->keterangan;

        $post = $dataabsn->save();

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',
            'data' => $dataabsn
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $absen_id)
    {
        // $dataabsn = Absen::find($absen_id);
        // if (empty($dataabsn)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }

        // $post = $dataabsn->delete();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil dihapus',

        // ]);
    }
}
