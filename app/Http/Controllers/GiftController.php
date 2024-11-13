<?php

namespace App\Http\Controllers;

use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\Gifts;

class GiftController extends Controller
{
    // Display all gifts for a specific event
    public function index()
    {
        $gifts = Gifts::all();
        return view('admin.gift.gift', compact('gifts'));
    }

    // Show form to create a new gift
    public function create()
    {
        $events = EventDetails::all();
        return view('admin.gift.create', compact('events'));
    }

    // Store a new gift
    public function store(Request $request)
    {
        // Validasi data input
        $request->validate([
            'event_id' => 'required|exists:event_details,id', // pastikan event_id ada di tabel event_details
            'name' => 'required|string|max:255',
            'category' => 'required|in:Uang,Barang',
            'notes' => 'nullable|string',
        ]);

        // Simpan data ke tabel gift
        Gifts::create([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        // Redirect setelah berhasil menyimpan data
        return redirect('/gifts')->with('success', 'Data hadiah berhasil ditambahkan!');
    }

    // Show form to edit an existing gift
    public function edit($id)
    {
        $gift = Gifts::findOrFail($id);
        $events = EventDetails::all();
        return view('admin.gift.edit', compact('gift', 'events'));
    }

    // Update an existing gift
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_id' => 'required|exists:event_details,id',
            'name' => 'required|string|max:255',
            'category' => 'required|in:Uang,Barang',
            'notes' => 'nullable|string',
        ]);

        // Temukan data gift dan perbarui isinya
        $gift = Gifts::findOrFail($id);
        $gift->update([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        // Redirect setelah berhasil menyimpan perubahan
        return redirect('/event')->with('success', 'Data hadiah berhasil diperbarui!');
    }

    // Delete a gift
    public function destroy($id)
    {
        $gift = Gifts::findOrFail($id);
        $gift->delete();

        return redirect('/gifts')->with('success', 'Data Berhasil Dihapus!!');
    }
}
