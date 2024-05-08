<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pgw = Pegawai::orderBy('pegawai_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $pgw
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datapgw = new Pegawai;
        $rules = [
            'user_id' => 'required',
            'posisi_id' => 'required',
            'manager_id' => 'nullable',
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan_terakhir' => 'required',
            'file_upload' => 'required',
            'tanggal_mulai' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal disimpan',
                'data' => $validator->errors()
            ]);
        }

        $datapgw->user_id = $request->user_id;
        $datapgw->posisi_id = $request->posisi_id;
        $datapgw->manager_id = $request->manager_id;
        $datapgw->nama_lengkap = $request->nama_lengkap;
        $datapgw->no_hp = $request->no_hp;
        $datapgw->email = $request->email;
        $datapgw->alamat = $request->alamat;
        $datapgw->tanggal_lahir = $request->tanggal_lahir;
        $datapgw->jenis_kelamin = $request->jenis_kelamin;
        $datapgw->pendidikan_terakhir = $request->pendidikan_terakhir;
        $datapgw->file_upload = $request->file_upload;
        $datapgw->tanggal_mulai = $request->tanggal_mulai;

        $post = $datapgw->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil disimpan',

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $pegawai_id)
    {
        $pgw = Pegawai::find($pegawai_id);
        if($pgw){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $pgw
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
    public function update(Request $request, string $pegawai_id)
    {
        $datapgw = Pegawai::find($pegawai_id);
        if (empty($datapgw)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        $rules = [
            'user_id' => 'required',
            'posisi_id' => 'required',
            'manager_id' => 'nullable',
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'pendidikan_terakhir' => 'required',
            'file_upload' => 'required',
            'tanggal_mulai' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diupdate',
                'data' => $validator->errors()
            ]);
        }

        $datapgw->user_id = $request->user_id;
        $datapgw->posisi_id = $request->posisi_id;
        $datapgw->manager_id = $request->manager_id;
        $datapgw->nama_lengkap = $request->nama_lengkap;
        $datapgw->no_hp = $request->no_hp;
        $datapgw->email = $request->email;
        $datapgw->alamat = $request->alamat;
        $datapgw->tanggal_lahir = $request->tanggal_lahir;
        $datapgw->jenis_kelamin = $request->jenis_kelamin;
        $datapgw->pendidikan_terakhir = $request->pendidikan_terakhir;
        $datapgw->file_upload = $request->file_upload;
        $datapgw->tanggal_mulai = $request->tanggal_mulai;

        $post = $datapgw->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $pegawai_id)
    {
        // $datapgw = Pegawai::find($pegawai_id);
        // if (empty($datapgw)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }

        // $post = $datapgw->delete();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil dihapus',

        // ]);
    }
}
