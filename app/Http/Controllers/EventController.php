<?php

namespace App\Http\Controllers;

use App\Models\EventDetails;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data event
        $events = EventDetails::all();
        return response()->json($events, 200);
    }

    public function create()
    {
        return view('admin.eventtype.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Validasi user_id berdasarkan tabel users
            'event_name' => 'required|string|max:255',
            'event_type_id' => 'required|integer|exists:event_type_ref,id', // Validasi event_type_id
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'quota' => 'required|integer',
        ]);

        // Menyimpan data event baru
        $event = EventDetails::create($validatedData);
        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan event berdasarkan ID
        $event = EventDetails::find($id);

        // Jika data tidak ditemukan, kembalikan 404
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return response()->json($event, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Menemukan event berdasarkan ID
        $event = EventDetails::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // Validate input
        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'event_name' => 'sometimes|required|string|max:255',
            'event_type_id' => 'sometimes|required|integer|exists:event_type_ref,id',
            'event_date' => 'sometimes|required|date',
            'event_time' => 'sometimes|required|date_format:H:i',
            'location' => 'sometimes|required|string|max:255',
            'quota' => 'sometimes|required|integer',
        ]);

        // Update data event
        $event->update($validatedData);
        return response()->json($event, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan event berdasarkan ID
        $event = EventDetails::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // Hapus data event
        $event->delete();
        return response()->json(['message' => 'Event deleted successfully'], 200);
    }
}
