<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\EventDetails;
use App\Models\ThemeCategory;
use Illuminate\Http\Request;
use Laravel\Prompts\Concerns\Themes;

class ThemeController extends Controller
{
    public function index()
    {
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
        ]);

        Theme::create([
            'name' => $request->name,
            'description' => $request->description,
            'max_images' => $request->max_images,
            'tag' => $request->tag,
            'theme_category_id' => $request->theme_category_id,
            'color' => $request->color,
        ]);

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
        ]);

        // Ambil tema berdasarkan id
        $theme = Theme::findOrFail($id);

        // Update data tema
        $theme->name = $request->name;
        $theme->description = $request->description;
        $theme->max_images = $request->max_images;
        $theme->tag = $request->tag;
        $theme->theme_category_id = $request->theme_category_id;
        $theme->color = $request->color;

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
