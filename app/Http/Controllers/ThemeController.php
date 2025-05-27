<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\ThemeCategory;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class ThemeController extends Controller
{
    public function index()
    {
        // dd('masuk ke controller');

        $themes = Theme::all();
        return view('admin.theme.theme', compact('themes'));
    }

    public function create()
    {
        $eventDetails = EventDetails::all();
        $categories = ThemeCategory::all();
        return view('admin.theme.create', compact('eventDetails', 'categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'max_images' => 'required|integer|min:1',
            'tag' => 'nullable|string',
            'theme_category_id' => 'required|exists:theme_categories,id', 
            'color' => 'nullable|string',
            'preview_url' => 'nullable|string',
            'preview_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,svg|max:1000',
        ]);

        $themes = new Theme();

        // Upload photo
        if ($request->hasFile('preview_image')) {
            // Simpan file foto ke folder 'themes' dengan nama unik
            $photoName = time() . '_' . $request->file('preview_image')->getClientOriginalName();
            $request->file('preview_image')->move(public_path('themes'), $photoName);
            
            // Simpan nama file foto yang baru ke dalam theme
            $themes->preview_image = $photoName;
        }

        $themes->name = $request->name;
        $themes->description = $request->description;
        $themes->max_images = $request->max_images;
        $themes->tag = $request->tag;
        $themes->theme_category_id = $request->theme_category_id;
        $themes->color = $request->color;
        $themes->preview_url = $request->preview_url;

        $themes->save();

        // Theme::create([
        //     'name' => $request->name,
        //     'description' => $request->description,
        //     'max_images' => $request->max_images,
        //     'tag' => $request->tag,
        //     'theme_category_id' => $request->theme_category_id,
        //     'color' => $request->color,
        // ]);

        return redirect('/themes')->with('success', 'Theme created successfully!');
    }

    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    public function edit($id)
    {
        // Ambil data tema berdasarkan id
        $theme = Theme::findOrFail($id);
        
        // Ambil semua event details untuk dropdown event_id
        $events = EventDetails::all();
        $categories = ThemeCategory::all();

        // Kirim data ke view
        return view('admin.theme.edit', compact('theme', 'events', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'max_images' => 'required|integer',
            'tag' => 'required',
            'theme_category_id' => 'required',
            'color' => 'required',
            'preview_url' => 'required',
            'preview_image' => 'image|mimes:jpeg,png,jpg,webp,svg|max:1000',
        ]);

        // Ambil tema berdasarkan id
        $theme = Theme::findOrFail($id);

        if ($request->hasFile('preview_image')) {
            // Simpan file foto ke folder 'timeline_photos'
            $photoName = time() . '_' . $request->file('preview_image')->getClientOriginalName();
            $request->file('preview_image')->move(public_path('themes'), $photoName);

            // Hapus foto lama jika ada
            if ($theme->preview_image) {
                File::delete(public_path('themes/' . $theme->preview_image));
            }

            // Simpan nama file foto yang baru
            $theme->preview_image = $photoName;
        }

        // Update data tema
        $theme->name = $request->name;
        $theme->description = $request->description;
        $theme->max_images = $request->max_images;
        $theme->tag = $request->tag;
        $theme->theme_category_id = $request->theme_category_id;
        $theme->color = $request->color;
        $theme->preview_url = $request->preview_url;

        // Simpan perubahan ke database
        $theme->save();

        // Redirect ke halaman daftar tema dengan pesan sukses
        return redirect('/themes')->with('success', 'Tema berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $theme = Theme::find($id);

        if (!$theme) {
            return response()->json(['message' => 'Timeline not found'], 404);
        }
        $theme->delete();
        return redirect('/themes')->with('success', 'Theme deleted successfully!');
    }
}
