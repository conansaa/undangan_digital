<?php

namespace App\Http\Controllers;

use App\Models\EventTypeRef;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{
    // Menampilkan daftar event type
    public function index()
    {
        $eventTypes = EventTypeRef::all();
        return view('admin.eventtype.eventtype', compact('eventTypes'));
    }

    // Menampilkan form untuk menambah event type
    public function create()
    {
        return view('admin.eventtype.create');
    }

    // Menyimpan event type ke database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        EventTypeRef::create($validatedData);
        return redirect('/event-type')->with('success', 'Tipe acara berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit event type
    public function edit($id)
    {
        $eventType = EventTypeRef::findOrFail($id);
        return view('admin.eventtype.edit', compact('eventType'));
    }

    // Mengupdate event type di database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $eventType = EventTypeRef::findOrFail($id);
        $eventType->update($validatedData);
        return redirect('/event-type')->with('success', 'Tipe acara berhasil diupdate');
    }

    // Menghapus event type
    public function destroy($id)
    {
        $eventType = EventTypeRef::findOrFail($id);
        $eventType->delete();
        return redirect('/event-type')->with('success', 'Tipe acara berhasil dihapus');
    }
}
