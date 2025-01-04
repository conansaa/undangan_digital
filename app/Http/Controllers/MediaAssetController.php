<?php

namespace App\Http\Controllers;

use App\Models\MediaAssets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaAssetController extends Controller
{
    public function storeModal(Request $request, $event_id)
    {
        $request->validate([
            // 'event_id' => 'required',
            'link' => 'required|max:100',
            'photo' => 'image|mimes:jpeg,png,jpg,webp|max:1000',
        ]);

        $media = new MediaAssets();

        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'timelines' dengan nama unik
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('media'), $photoName);
            
            // Simpan nama file foto yang baru ke dalam timeline
            $media->photo = $photoName;
        }

        // Simpan data timeline
        $media->event_id = $event_id;
        $media->link = $request->link;

        $media->save();

        return redirect()->route('event.show', ['id' => $event_id])->with('success', 'Timeline berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // Validasi input
        $request->validate([
            // 'event_id' => 'required',
            'link' => 'required|max:100',
            'photo' => 'image|mimes:jpeg,png,jpg,webp|max:1000', // optional jika mengubah foto
        ]);

        // Ambil media berdasarkan id
        $media = MediaAssets::find($id);

        // Cek apakah ada file foto yang di-upload
        if ($request->hasFile('photo')) {
            // Simpan file foto ke folder 'media_photos'
            $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path('media'), $photoName);

            // Hapus foto lama jika ada
            if ($media->photo) {
                File::delete(public_path('media/' . $media->photo));
            }

            // Simpan nama file foto yang baru
            $media->photo = $photoName;
        }

        // Update data media
        // $media->event_id = $request->event_id;
        $media->link = $request->link;

        $media->save();
        
        return redirect()->route('event.show', ['id' => $media->event_id])->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Menemukan media berdasarkan ID
        $media = MediaAssets::find($id);

        if (!$media) {
            return response()->json(['message' => 'media not found'], 404);
        }

        if ($media->photo && File::exists(public_path('media/' . $media->photo))) {
            File::delete(public_path('media/' . $media->photo));
        }

        // Hapus data
        $media->delete();
        return redirect()->route('event.show', ['id' => $media->event_id])->with('success', 'Data berhasil dihapus.');
    }
}
