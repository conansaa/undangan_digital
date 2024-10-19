<?php

namespace App\Http\Controllers;

use App\Models\Timelines;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data timeline
        $timelines = Timelines::all();
        return response()->json($timelines, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Membuat data timeline baru
        $timeline = Timelines::create($request->all());
        return response()->json($timeline, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan timeline berdasarkan ID
        $timeline = Timelines::find($id);

        // Jika data tidak ditemukan, kembalikan 404
        if (!$timeline) {
            return response()->json(['message' => 'Timeline not found'], 404);
        }

        return response()->json($timeline, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Menemukan timeline berdasarkan ID
        $timeline = Timelines::find($id);

        if (!$timeline) {
            return response()->json(['message' => 'Timeline not found'], 404);
        }

        // Update data
        $timeline->update($request->all());
        return response()->json($timeline, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan timeline berdasarkan ID
        $timeline = Timelines::find($id);

        if (!$timeline) {
            return response()->json(['message' => 'Timeline not found'], 404);
        }

        // Hapus data
        $timeline->delete();
        return response()->json(['message' => 'Timeline deleted successfully'], 200);
    }
}
