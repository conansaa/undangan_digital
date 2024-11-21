<?php

namespace App\Http\Controllers;

use App\Models\EventCards;
use App\Models\EventDetails;
use Illuminate\Http\Request;

class EventCardController extends Controller
{
    public function storeModal(Request $request, $event_id)
    {
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'event_name' => 'required|string',
            'event_date' => 'required',
            'event_time' => 'required',
            'location' => 'required|string',
            'full_location' => 'required|string',
            'quota' => 'required|string',
        ]);

        $card = new EventCards();

        // Simpan data timeline
        $card->event_id = $event_id;
        $card->event_name = $request->event_name;
        $card->event_date = $request->event_date;
        $card->event_time = $request->event_time;
        $card->location = $request->location;
        $card->full_location = $request->full_location;
        $card->quota = $request->quota;

        $card->save();

        return redirect()->route('event.show', ['id' => $event_id])->with('success', 'Detail berhasil ditambahkan!');
    }

    public function editModal($id)
    {
        $eventCard = EventCards::findOrFail($id);
        $event = EventDetails::all();

        return [
            'eventCard' => $eventCard,
            'event' => $event,
        ];

        // return view('admin.eventdetail.detail', compact('gifts', 'events'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'event_name' => 'required|string',
            'event_date' => 'required',
            'event_time' => 'required',
            'location' => 'required|string',
            'full_location' => 'required|string',
            'quota' => 'required|string',
        ]);
    
        $card = EventCards::find($id);
        // dd($figure);

        // $card->event_id = $id;
        $card->event_name = $request->event_name;
        $card->event_date = $request->event_date;
        $card->event_time = $request->event_time;
        $card->location = $request->location;
        $card->full_location = $request->full_location;
        $card->quota = $request->quota;
    
        $card->save();
    
        return redirect()->route('event.show', ['id' => $card->event_id])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menemukan event berdasarkan ID
        $card = EventCards::find($id);

        if (!$card) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // Hapus data event
        $card->delete();
        return redirect()->route('event.show', ['id' => $card->event_id])->with('success', 'Data berhasil dihapus.');
    }
}
