<?php

namespace App\Http\Controllers;

use App\Models\SectionRef;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = SectionRef::all();
        return view('admin.section.section', compact('sections'));
    }

    public function create()
    {
        return view('admin.section.create'); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        SectionRef::create($validatedData);
        return redirect('/sections')->with('success', 'Tipe acara berhasil ditambahkan');
    }

    public function edit($id)
    {
        $section = SectionRef::findOrFail($id);
        return view('admin.section.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $section = SectionRef::findOrFail($id);
        $section->update($validatedData);
        return redirect('/sections')->with('success', 'Tipe acara berhasil diupdate');
    }

    public function destroy($id)
    {
        $section = SectionRef::findOrFail($id);
        $section->delete();
        return redirect('/sections')->with('success', 'Tipe acara berhasil dihapus');
    }
}
