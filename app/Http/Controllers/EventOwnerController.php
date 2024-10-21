<?php

namespace App\Http\Controllers;

use App\Models\GenderRef;
use Illuminate\Http\Request;
use App\Models\EventOwnerDetails;

class EventOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data pemilik acara
        $owners = EventOwnerDetails::all();
        return response()->json($owners, 200);
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
            'owner_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'social_media' => 'nullable|string|max:255',
            'gender_id' => 'required|integer|exists:gender_ref,id', // Validasi gender_id sesuai dengan tabel referensi gender
        ]);

        // Handle file upload
        if ($request->hasFile('owner_photo')) {
            $file = $request->file('owner_photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/owner_photos'), $filename);
            $request->merge(['owner_photo' => $filename]);
        }

        // Menyimpan data pemilik acara
        EventOwnerDetails::create($request->all());
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Mencari pemilik acara berdasarkan ID
        $owner = EventOwnerDetails::find($id);

        if (!$owner) {
            return response()->json(['message' => 'Event owner not found'], 404);
        }

        // Validate input
        $request->validate([
            'owner_name' => 'sometimes|required|string|max:255',
            'parents_name' => 'nullable|string',
            'owner_photo' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'gender_id' => 'sometimes|required|integer|exists:gender_ref,id',
        ]);

        // Update data pemilik acara
        $owner->update($request->all());
        return response()->json($owner, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Mencari pemilik acara berdasarkan ID
        $owner = EventOwnerDetails::find($id);

        if (!$owner) {
            return response()->json(['message' => 'Event owner not found'], 404);
        }

        // Hapus data pemilik acara
        $owner->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
