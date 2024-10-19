<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gifts;

class GiftController extends Controller
{
    // Display all gifts for a specific event
    public function index($event_id)
    {
        $gifts = Gifts::where('event_id', $event_id)->get();
        return view('gifts.index', compact('gifts'));
    }

    // Show form to create a new gift
    public function create()
    {
        return view('gifts.create');
    }

    // Store a new gift
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'account_number' => 'required|integer',
            'notes' => 'nullable|string',
        ]);

        Gifts::create($validatedData);

        return redirect()->route('gifts.index', $validatedData['event_id'])
                         ->with('success', 'Gift created successfully.');
    }

    // Show form to edit an existing gift
    public function edit($id)
    {
        $gift = Gifts::findOrFail($id);
        return view('gifts.edit', compact('gift'));
    }

    // Update an existing gift
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'account_number' => 'required|integer',
            'notes' => 'nullable|string',
        ]);

        $gift = Gifts::findOrFail($id);
        $gift->update($validatedData);

        return redirect()->route('gifts.index', $gift->event_id)
                         ->with('success', 'Gift updated successfully.');
    }

    // Delete a gift
    public function destroy($id)
    {
        $gift = Gifts::findOrFail($id);
        $event_id = $gift->event_id;
        $gift->delete();

        return redirect()->route('gifts.index', $event_id)
                         ->with('success', 'Gift deleted successfully.');
    }
}
