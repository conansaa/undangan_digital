<?php

namespace App\Http\Controllers;

use App\Models\EventDetails;
use App\Models\Timelines;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timelines = Timelines::all();
        // $eventDetail = EventDetails::all();
        return view('admin.timeline.timeline', compact('timelines'));
    }

    public function create()
    {
        $eventDetails = EventDetails::all(); // Ambil data gender dari tabel referensi
        return view('admin.timeline.create', compact('eventDetails')); // Sesuaikan dengan nama view kamu
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'event_id' => 'required|exists:event_details,id',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the max size as needed
        ]);

        // Handle the file upload if a photo is provided
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->hashName(); // Generate a unique filename
            $path = $file->storeAs('timelines', $filename, 'public'); // Store the file in the 'public/timelines' directory
        } else {
            $path = null; // No file uploaded
        }

        // Create a new timeline entry in the database
        Timelines::create([
            'event_id' => $validatedData['event_id'],
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'description' => $validatedData['description'],
            'photo' => $path, // Save the path of the uploaded photo
        ]);

        // Redirect back to the timeline list with a success message
        return redirect('/timelines')->with('success', 'Timeline has been created successfully.');
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
