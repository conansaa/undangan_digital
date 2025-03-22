<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvitationLink;

class InvitationController extends Controller
{
    public function show($link)
    {
        // Cari link berdasarkan nama di database
        $getlink = InvitationLink::where('link', $link)->first();

        if (!$getlink || $getlink->expired_at < now()) {
            abort(403, 'Link undangan tidak aktif atau telah kedaluwarsa.');
        }

        return view('invitation.show', compact('link'));
    }
}
