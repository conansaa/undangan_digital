<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function showDashboard()
    {
        // Calculate total guests where confirmation is 'Hadir'
        $totalGuests = Rsvp::where('confirmation', 'Hadir')->sum('total_guest');
        // Calculate total comments
        $totalComments = Comments::count();

        return view('client.client', compact('totalGuests', 'totalComments'));

    }

}

