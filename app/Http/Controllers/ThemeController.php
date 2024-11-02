<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\EventDetails;
use Illuminate\Http\Request;

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
        return view('admin.theme.create', compact('eventDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:event_details,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'max_images' => 'required|integer|min:1',
        ]);

        Theme::create([
            'event_id' => $request->event_id,
            'name' => $request->name,
            'description' => $request->description,
            'max_images' => $request->max_images,
        ]);
    

        Theme::create($request->all());
        return redirect('/themes')->with('success', 'Theme created successfully!');
    }

    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'max_images' => 'required|integer|min:1',
        ]);

        $theme->update($request->all());
        return redirect()->route('themes.index')->with('success', 'Theme updated successfully!');
    }

    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect()->route('themes.index')->with('success', 'Theme deleted successfully!');
    }
}
