<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gaji;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gj = Gaji::orderBy('gaji_id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'data' => $gj
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $gaji_id)
    {
        $gj = Gaji::find($gaji_id);
        if($gj){
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil ditemukan',
                'data' => $gj
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
