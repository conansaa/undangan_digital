<?php

namespace App\Http\Controllers;

use App\Models\Figures;
use App\Models\GenderRef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FigureController extends Controller
{
    public function storeModal(Request $request, $event_id)
    {
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'fullname' => 'required|string',
            'name' => 'required|string',
            'fathers_name' => 'required|string',
            'mothers_name' => 'required|string',
            'ordinal_child_number' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:1000',
            'social_media' => 'required|string',
            'gender_id' => 'required|exists:gender_ref,id'
        ]);

        $figure = new Figures();

        // Upload photo
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timelines' dengan nama unik
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('figures'), $photoName);
            
            // Simpan nama file foto yang baru ke dalam timeline
            $figure->photo = $photoName;
        }

        // Simpan data timeline
        $figure->event_id = $event_id;
        $figure->fullname = $request->fullname;
        $figure->name = $request->name;
        $figure->fathers_name = $request->fathers_name;
        $figure->mothers_name = $request->mothers_name;
        $figure->ordinal_child_number = $request->ordinal_child_number;
        $figure->social_media = $request->social_media;
        $figure->gender_id = $request->gender_id;

        $figure->save();

        return redirect()->route('event.show', ['id' => $event_id])->with('success', 'Tokoh Utama berhasil ditambahkan!');
    }

    public function editModal($id)
    {
        $figures = Figures::findOrFail($id);
        $genders = GenderRef::all();

        return [
            'figures' => $figures,
            'genders' => $genders,
        ];

        // return view('admin.eventdetail.detail', compact('gifts', 'events'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'fullname' => 'required|string',
            'name' => 'required|string',
            'fathers_name' => 'required|string',
            'mothers_name' => 'required|string',
            'ordinal_child_number' => 'required|integer',
            'photo' => 'image|mimes:jpeg,png,jpg,webp|max:1000',
            'social_media' => 'required|string',
            'gender_id' => 'required|exists:gender_ref,id'
        ]);
    
        $figure = Figures::find($id);
        // dd($figure);
    
        // Cek dan hapus foto lama jika ada foto baru diunggah
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timeline_photos'
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('figures'), $photoName);

            // Hapus foto lama jika ada
            if ($figure->photo) {
                File::delete(public_path('figures/' . $figure->photo));
            }

            // Simpan nama file foto yang baru
            $figure->photo = $photoName;
        }

        // $figure->event_id = $id;
        $figure->fullname = $request->fullname;
        $figure->name = $request->name;
        $figure->fathers_name = $request->fathers_name;
        $figure->mothers_name = $request->mothers_name;
        $figure->ordinal_child_number = $request->ordinal_child_number;
        $figure->social_media = $request->social_media;
        $figure->gender_id = $request->gender_id;
    
        $figure->save();
    
        return redirect()->route('event.show', ['id' => $figure->event_id])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Find the gallery item by ID and delete it
        $figures = Figures::findOrFail($id);

        if ($figures->photo && File::exists(public_path('figures/' . $figures->photo))) {
            File::delete(public_path('figures/' . $figures->photo));
        }

        $figures->delete();

        return redirect()->route('event.show', ['id' => $figures->event_id])->with('success', 'Data berhasil dihapus.');
    }

    public function storeModalClient(Request $request, $id)
    {
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'fullname' => 'required|string',
            'name' => 'required|string',
            'fathers_name' => 'required|string',
            'mothers_name' => 'required|string',
            'ordinal_child_number' => 'required|integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:1000',
            'social_media' => 'required|string',
            'gender_id' => 'required|exists:gender_ref,id'
        ]);

        $figure = new Figures();

        // Upload photo
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timelines' dengan nama unik
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('figures'), $photoName);
            
            // Simpan nama file foto yang baru ke dalam timeline
            $figure->photo = $photoName;
        }

        // Simpan data timeline
        $figure->event_id = $id;
        $figure->fullname = $request->fullname;
        $figure->name = $request->name;
        $figure->fathers_name = $request->fathers_name;
        $figure->mothers_name = $request->mothers_name;
        $figure->ordinal_child_number = $request->ordinal_child_number;
        $figure->social_media = $request->social_media;
        $figure->gender_id = $request->gender_id;

        $figure->save();

        return redirect()->route('manageevent.detail', ['id' => $id])->with('success', 'Tokoh Utama berhasil ditambahkan!');
    }

    public function updateModalClient(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            // 'event_id' => 'required|exists:event_details,id',
            'fullname' => 'required|string',
            'name' => 'required|string',
            'fathers_name' => 'required|string',
            'mothers_name' => 'required|string',
            'ordinal_child_number' => 'required|integer',
            'photo' => 'image|mimes:jpeg,png,jpg,webp|max:1000',
            'social_media' => 'required|string',
            'gender_id' => 'required|exists:gender_ref,id'
        ]);
    
        $figure = Figures::find($id);
        // dd($figure);
    
        // Cek dan hapus foto lama jika ada foto baru diunggah
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timeline_photos'
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('figures'), $photoName);

            // Hapus foto lama jika ada
            if ($figure->photo) {
                File::delete(public_path('figures/' . $figure->photo));
            }

            // Simpan nama file foto yang baru
            $figure->photo = $photoName;
        }

        // $figure->event_id = $id;
        $figure->fullname = $request->fullname;
        $figure->name = $request->name;
        $figure->fathers_name = $request->fathers_name;
        $figure->mothers_name = $request->mothers_name;
        $figure->ordinal_child_number = $request->ordinal_child_number;
        $figure->social_media = $request->social_media;
        $figure->gender_id = $request->gender_id;
    
        $figure->save();
    
        return redirect()->route('manageevent.detail', ['id' => $figure->event_id])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroyClient($id)
    {
        // Find the gallery item by ID and delete it
        $figures = Figures::findOrFail($id);

        if ($figures->photo && File::exists(public_path('figures/' . $figures->photo))) {
            File::delete(public_path('figures/' . $figures->photo));
        }

        $figures->delete();

        return redirect()->route('manageevent.detail', ['id' => $figures->event_id])->with('success', 'Data berhasil dihapus.');
    }
}
