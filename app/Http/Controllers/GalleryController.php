<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SectionRef;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:6048',
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

    public function storeModal(Request $request, $event_id)
    {
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'section_id' => 'required|exists:section_ref,id',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:1200',
            'description' => 'nullable|string',
        ]);

        $gallery = new Gallery();

        // Upload photo
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timelines' dengan nama unik
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('galleries'), $photoName);
            
            // Simpan nama file foto yang baru ke dalam timeline
            $gallery->photo = $photoName;
        }

        // Simpan data timeline
        $gallery->event_id = $event_id;
        $gallery->section_id = $request->section_id;
        $gallery->description = $request->description;

        $gallery->save();

        return redirect()->route('event.show', ['id' => $event_id])->with('success', 'Galeri berhasil ditambahkan!');
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

    public function editModal($id)
    {
        $gallery = Gallery::findOrFail($id);
        $sections = SectionRef::all();

        return [
            'gallery' => $gallery,
            'sections' => $sections,
        ];

        // return view('admin.eventdetail.detail', compact('gifts', 'events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'section_id' => 'required|exists:section_ref,id',
            'description' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1000'
        ]);
    
        $gallery = Gallery::find($id);
    
        // Cek dan hapus foto lama jika ada foto baru diunggah
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timeline_photos'
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('galleries'), $photoName);

            // Hapus foto lama jika ada
            if ($gallery->photo) {
                File::delete(public_path('galleries/' . $gallery->photo));
            }

            // Simpan nama file foto yang baru
            $gallery->photo = $photoName;
        }

        // $gallery->event_id = $request->event_id;
        $gallery->section_id = $request->section_id;
        $gallery->description = $request->description;
    
        $gallery->save();
    
        return redirect()->route('event.show', ['id' => $gallery->event_id])->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the gallery item by ID and delete it
        $galleryItem = Gallery::findOrFail($id);

        if ($galleryItem->photo && File::exists(public_path('galleries/' . $galleryItem->photo))) {
            File::delete(public_path('galleries/' . $galleryItem->photo));
        }

        $galleryItem->delete();

        return redirect()->route('event.show', ['id' => $galleryItem->event_id])->with('success', 'Data berhasil dihapus.');
    }
}
