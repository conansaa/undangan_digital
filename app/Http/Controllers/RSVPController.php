<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data RSVP
        $rsvps = Rsvp::all();
        return response()->json($rsvps, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Membuat data RSVP baru
        $rsvp = Rsvp::create($request->all());
        return response()->json($rsvp, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan RSVP berdasarkan ID
        $rsvp = Rsvp::find($id);

        // Jika data tidak ditemukan, kembalikan 404
        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        return response()->json($rsvp, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Menemukan RSVP berdasarkan ID
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        // Update data
        $rsvp->update($request->all());
        return response()->json($rsvp, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan RSVP berdasarkan ID
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        // Hapus data
        $rsvp->delete();
        return response()->json(['message' => 'RSVP deleted successfully'], 200);
    }
}
