<?php

namespace App\Http\Controllers;

use App\Models\EventOwnerDetails;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'parents_name' => 'nullable|string',
            'owner_photo' => 'nullable|string|max:255',
            'social_media' => 'nullable|string|max:255',
            'gender_id' => 'required|integer|exists:gender_ref,id', // Validasi gender_id sesuai dengan tabel referensi gender
        ]);

        // Menyimpan data pemilik acara
        $owner = EventOwnerDetails::create($request->all());
        return response()->json($owner, 201);
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