<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($event_id)
    {
        // Fetch all gallery items for a specific event
        $galleryItems = Gallery::where('event_id', $event_id)->get();
        return view('gallery.index', compact('galleryItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'event_id' => 'required|integer|exists:event_details,id',
            'section_id' => 'required|integer|exists:section_ref,id',
            'photo' => 'required|string|max:255',  // Assuming this is a file path or URL
            'description' => 'nullable|string',
        ]);

        // Store gallery item
        Gallery::create($validatedData);

        return redirect()->route('gallery.index', $validatedData['event_id'])
                         ->with('success', 'Gallery item created successfully.');
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
        // Fetch gallery item by ID for editing
        $galleryItem = Gallery::findOrFail($id);
        return view('gallery.edit', compact('galleryItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate input
        $validatedData = $request->validate([
            'section_id' => 'required|integer|exists:section_ref,id',
            'photo' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Update gallery item
        $galleryItem = Gallery::findOrFail($id);
        $galleryItem->update($validatedData);

        return redirect()->route('gallery.index', $galleryItem->event_id)
                         ->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the gallery item by ID and delete it
        $galleryItem = Gallery::findOrFail($id);
        $event_id = $galleryItem->event_id; // Store event_id for redirect
        $galleryItem->delete();

        return redirect()->route('gallery.index', $event_id)
                         ->with('success', 'Gallery item deleted successfully.');
    }
}
