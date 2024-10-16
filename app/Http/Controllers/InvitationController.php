<?php

namespace App\Http\Controllers;

use App\Models\Bride;
use App\Models\Groom;
use App\Models\Address;
use App\Models\Comment;
use App\Models\EventDetail;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function cover()
    {
        // Ambil data mempelai pria, wanita, dan detail acara
        $groom = Groom::first(); // Ambil data mempelai pria pertama
        $bride = Bride::first(); // Ambil data mempelai wanita pertama
        $eventDetail = EventDetail::first(); // Ambil detail acara pertama
        
        // // Ambil data dari database
        // $address = Address::first(); // Misalnya hanya ada satu alamat
        // $comment = Comment::all();

        // Kirim data ke view
        return view('invitation.cover', compact('groom', 'bride', 'eventDetail'));
    }

    public function detail(Request $request)
    {
        $groom = Groom::first();
        $bride = Bride::first();
        $eventDetail = EventDetail::first();
        $comments = Comment::all();

        return view('invitation.detail', compact('groom', 'bride', 'eventDetail', 'comments'));
    }

    public function storeComment(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'comment' => 'required|string',
    ]);

    Comment::create([
        'name' => $request->name,
        'comment' => $request->comment,
    ]);

    return redirect()->route('invitation.detail')->with('success', 'Komentar berhasil ditambahkan.');
    }

}
