<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThemeCategory;

class ThemeCategoryController extends Controller
{
    public function index()
    {
        $categories = ThemeCategory::all();
        return view('admin.themecategory.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        ThemeCategory::create($validatedData);
        return redirect('/categories')->with('success', 'Kategori tema berhasil ditambahkan');
    }
}
