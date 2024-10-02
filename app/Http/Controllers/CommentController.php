<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    Comment::create($request->all());

    return redirect()->route('comments.index')->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function index()
    {
    $comments = Comment::all(); 
    return view('comments.index', compact('comments'));
    }


}
