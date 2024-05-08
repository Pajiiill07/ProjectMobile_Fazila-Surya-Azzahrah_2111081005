<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usr = User::orderBy('user_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $usr
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datausr = new User;
        // $rules = [
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'hak_akses' => 'required'
        // ];
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data gagal disimpan',
        //         'data' => $validator->errors()
        //     ]);
        // }

        // $datausr->username = $request->username;
        // $datausr->email = $request->email;
        // $datausr->password = $request->password;
        // $datausr->hak_akses = $request->hak_akses;

        // $post = $datausr->save();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil disimpan',

        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $usr = User::find($user_id);
        if($usr){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $usr
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
    public function update(Request $request, string $user_id)
    {
        $datausr = User::find($user_id);
        if (empty($datausr)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
        $rules = [
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'hak_akses' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal diupdate',
                'data' => $validator->errors()
            ]);
        }

        $datausr->username = $request->username;
        $datausr->email = $request->email;
        $datausr->password = $request->password;
        $datausr->hak_akses = $request->hak_akses;

        $post = $datausr->save();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diupdate',

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        // $datausr = User::find($user_id);
        // if (empty($datausr)) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data tidak ditemukan'
        //     ], 404);
        // }

        // $post = $datausr->delete();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'Data berhasil dihapus',

        // ]);
    }
}
