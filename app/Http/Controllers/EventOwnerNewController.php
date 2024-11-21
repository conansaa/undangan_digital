<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventOwnerNew;

class EventOwnerNewController extends Controller
{
    public function storeModal(Request $request, $event_id)
    {
        $request->validate([
            // 'event_id' => 'required',
            'title' => 'required|max:100',
            'date' => 'required|date',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:1000',
        ]);

        $timeline = new EventOwnerNew();

        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timelines' dengan nama unik
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('timelines'), $photoName);
            
            // Simpan nama file foto yang baru ke dalam timeline
            $timeline->photo = $photoName;
        }

        // Simpan data timeline
        $timeline->event_id = $event_id;
        $timeline->title = $request->title;
        $timeline->date = $request->date;
        $timeline->description = $request->description;

        $timeline->save();

        return redirect()->route('event.show', ['id' => $event_id])->with('success', 'Timeline berhasil ditambahkan!');
    }
}
