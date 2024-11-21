<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GenderRef;
use Illuminate\Http\Request;
use App\Models\EventOwnerNew;
use App\Models\EventOwnerDetails;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventOwner = EventOwnerNew::all();
        // return $eventOwner;
        return view('admin.eventowner.eventowner', compact('eventOwner'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        $users = User::all(); // Ambil data gender dari tabel referensi
        return view('admin.eventowner.create', compact('users')); // Sesuaikan dengan nama view kamu
    }
    
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Validasi gender_id sesuai dengan tabel referensi gender
        ]);

        // Menyimpan data pemilik acara dengan nama file foto
        EventOwnerNew::create([
            'user_id' => $request->user_id,
        ]);
        return redirect('/owners')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mencari pemilik acara berdasarkan ID
        $owner = EventOwnerDetails::find($id);

        if (!$owner) {
            return response()->json(['message' => 'Event owner not found'], 404);
        }

        return response()->json($owner, 200);
    }

    public function edit($id)
    {
        $owner = EventOwnerNew::findOrFail($id);
        $users = User::all(); // Assuming you have a gender reference table
        return view('admin.eventowner.edit', compact('owner', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id', 
        ]);

        // Ambil data owner berdasarkan ID
        $owner = EventOwnerNew::findOrFail($id);

        // Update data owner
        $owner->gender_id = $request->user_id;
        // Simpan perubahan ke database
        $owner->save();

        // Redirect ke halaman daftar owner dengan pesan sukses
        return redirect('/owners')->with('success', 'Data pemilik acara berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari pemilik acara berdasarkan ID
        $owner = EventOwnerNew::find($id);

        // if (!$owner) {
        //     return response()->json(['message' => 'Event owner not found'], 404);
        // }

        // Hapus data pemilik acara
        $owner->delete();
        return redirect('/owners')->with('success', 'Data Berhasil Dihapus!!');
    }
}
