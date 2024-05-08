<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserBackendController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        return view('content.user.index',['users'=>User::orderBy('user_id', 'asc')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('content.user.create',['users'=>User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'username' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'hak_akses' => 'required',
    ]);

    $validatedData['password'] = Hash::make($request->password);

    User::create($validatedData);

    return redirect('/user-backend')->with('pesan', 'Data Berhasil di Simpan');
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
    public function edit(string $user_id)
    {
        $item = User::find($user_id);
        // Pastikan $item tidak null sebelum diubah menjadi JSON
        if (!$item) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'hak_akses' => 'required',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        
        User::where('user_id', $user_id)->update($validatedData);
        return redirect('/user-backend')->with('pesan', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        User::destroy($user_id);
        return redirect('/user-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
