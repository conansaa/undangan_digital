<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SectionRef;
use App\Models\EventDetails;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all gallery items for a specific event
        $galleries = Gallery::all();
        return view('admin.gallery.gallery', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = EventDetails::all(); // Mendapatkan semua data event untuk dropdown
        $sections = SectionRef::all();
        return view('admin.gallery.create', compact('events', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:event_details,id',
            'section_id' => 'required|exists:section_ref,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        // Upload photo
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = $file->hashName(); // Generate a unique filename
            $path = $file->storeAs('galleries', $filename, 'public');
        } else {
            $path = null; // No file uploaded
        }

        // Simpan data gallery
        Gallery::create([
            'event_id' => $request->event_id,
            'section_id' => $request->section_id,
            'photo' => $path,
            'description' => $request->description,
        ]);

        return redirect('/galleries')->with('success', 'Galeri berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Fetch gallery item by ID
        $galleryItem = Gallery::findOrFail($id);
        return view('gallery.show', compact('galleryItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $events = EventDetails::all(); // Asumsikan EventDetail adalah model untuk tabel event details
        $sections = SectionRef::all(); // Asumsikan SectionRef adalah model untuk tabel section_ref

        return view('admin.gallery.edit', compact('gallery', 'events', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_id' => 'required|exists:event_details,id',
            'section_id' => 'required|exists:section_ref,id',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $gallery = Gallery::findOrFail($id);
        $gallery->event_id = $request->event_id;
        $gallery->section_id = $request->section_id;
        $gallery->description = $request->description;
    
        // Cek dan hapus foto lama jika ada foto baru diunggah
        if ($request->hasFile('photo')) {
            if ($gallery->photo && file_exists(public_path('storage/' . $gallery->photo))) {
                unlink(public_path('storage/' . $gallery->photo));
            }
    
            // Simpan foto baru
            $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('gallery_photos'), $fileName);
            $gallery->photo = $fileName;
        }
    
        $gallery->save();
    
        return redirect('/galleries')->with('success', 'Data Gallery berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the gallery item by ID and delete it
        $galleryItem = Gallery::findOrFail($id);
        $galleryItem->delete();

        return redirect('/galleries')->with('success', 'Gallery item deleted successfully.');
    }
}
