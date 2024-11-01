<?php

namespace App\Http\Controllers;

use App\Models\GenderRef;
use Illuminate\Http\Request;
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
        $eventOwner = EventOwnerDetails::all();
        return view('admin.eventowner.eventowner', compact('eventOwner'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        $genders = GenderRef::all(); // Ambil data gender dari tabel referensi
        return view('admin.eventowner.create', compact('genders')); // Sesuaikan dengan nama view kamu
    }
    
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'parents_name' => 'nullable|string',
            'owner_photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'social_media' => 'nullable|string|max:255',
            'gender_id' => 'required|integer|exists:gender_ref,id', // Validasi gender_id sesuai dengan tabel referensi gender
        ]);

        // Handle file upload
        if ($request->hasFile('owner_photo')) {
            $file = $request->file('owner_photo');
            $filename = $file->hashName();
            $path = $file->storeAs('owner_photos', $filename, 'public');

        } else {
            $path = null; // Atau nilai default jika tidak ada file diunggah
        }

        // Menyimpan data pemilik acara dengan nama file foto
        EventOwnerDetails::create([
            'owner_name' => $request->owner_name,
            'parents_name' => $request->parents_name,
            'owner_photo' => $path, // Simpan nama file di database
            'social_media' => $request->social_media,
            'gender_id' => $request->gender_id,
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
        $owner = EventOwnerDetails::findOrFail($id);
        $genders = GenderRef::all(); // Assuming you have a gender reference table
        return view('admin.eventowner.edit', compact('owner', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'owner_name' => 'required|max:255',
            'parents_name' => 'required|max:255',
            'social_media' => 'nullable|max:255',
            'gender' => 'required|exists:gender_ref,id', // ID gender harus valid
            'owner_photo' => 'image|mimes:jpeg,png,jpg' // Optional jika tidak mengubah foto
        ]);

        // Ambil data owner berdasarkan ID
        $owner = EventOwnerDetails::findOrFail($id);

        // Update data owner
        $owner->owner_name = $request->owner_name;
        $owner->parents_name = $request->parents_name;
        $owner->social_media = $request->social_media;
        $owner->gender_id = $request->gender;

        // Cek apakah ada file foto yang di-upload
        if ($request->hasFile('owner_photo')) {
            // Simpan file foto baru ke folder 'owner_photos'
            $photoName = time() . '_' . $request->file('owner_photo')->getClientOriginalName();
            $request->file('owner_photo')->move(public_path('owner_photos'), $photoName);

            // Hapus foto lama jika ada
            if ($owner->owner_photo) {
                File::delete(public_path('storage/' . $owner->owner_photo));
            }

            // Simpan nama file foto yang baru
            $owner->owner_photo = $photoName;
        }

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
        $owner = EventOwnerDetails::find($id);

        // if (!$owner) {
        //     return response()->json(['message' => 'Event owner not found'], 404);
        // }

        // Hapus data pemilik acara
        $owner->delete();
        return redirect('/owners')->with('success', 'Data Berhasil Dihapus!!');
    }
}
