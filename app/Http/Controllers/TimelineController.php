<?php

namespace App\Http\Controllers;

use App\Models\Timelines;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TimelineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timelines = Timelines::all();
        // $eventDetail = EventDetails::select('event_id');
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048', // Adjust the max size as needed
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
        return redirect('/event')->with('success', 'Timeline has been created successfully.');
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

    public function edit($id)
    {
        // Ambil data timeline berdasarkan id
        $timeline = Timelines::findOrFail($id);
        
        // Ambil semua event details untuk dropdown event_id
        $events = EventDetails::all();

        // Kirim data ke view
        return view('admin.timeline.edit', compact('timeline', 'events'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'event_id' => 'required',
            'title' => 'required|max:255',
            'date' => 'required|date',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:6048', // optional jika mengubah foto
        ]);

        // Ambil timeline berdasarkan id
        $timeline = Timelines::findOrFail($id);

        // Update data timeline
        $timeline->event_id = $request->event_id;
        $timeline->title = $request->title;
        $timeline->date = $request->date;
        $timeline->description = $request->description;

        // Cek apakah ada file foto yang di-upload
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timeline_photos'
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('timelines'), $photoName);

            // Hapus foto lama jika ada
            if ($timeline->photo) {
                File::delete(public_path('storage/' . $timeline->photo));
            }

            // Simpan nama file foto yang baru
            $timeline->photo = $photoName;
        }

        // Simpan perubahan ke database
        $timeline->save();

        // Redirect ke halaman daftar timeline dengan pesan sukses
        return redirect('/timelines')->with('success', 'Timeline berhasil diperbarui.');
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

        if (File::exists($timeline->ImagePath)) File::delete($timeline->ImagePath);

        // Hapus data
        $timeline->delete();
        return redirect('/details/{id}')->with('success', 'Data Berhasil Dihapus!!');
    }
}
