<?php

namespace App\Http\Controllers;

use App\Models\GenderRef;
use Illuminate\Http\Request;

class GenderRefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data gender
        $genders = GenderRef::all();
        return response()->json($genders, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Membuat data gender baru
        $gender = GenderRef::create($request->all());
        return response()->json($gender, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menemukan gender berdasarkan ID
        $gender = GenderRef::find($id);

        // Jika data tidak ditemukan, kembalikan 404
        if (!$gender) {
            return response()->json(['message' => 'Gender not found'], 404);
        }

        return response()->json($gender, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Menemukan gender berdasarkan ID
        $gender = GenderRef::find($id);

        if (!$gender) {
            return response()->json(['message' => 'Gender not found'], 404);
        }

        // Update data
        $gender->update($request->all());
        return response()->json($gender, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Menemukan gender berdasarkan ID
        $gender = GenderRef::find($id);

        if (!$gender) {
            return response()->json(['message' => 'Gender not found'], 404);
        }

        // Hapus data
        $gender->delete();
        return response()->json(['message' => 'Deleted successfully'], 200);
    }
}
