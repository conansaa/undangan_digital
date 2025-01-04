<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use App\Models\EventOwnerNew;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function showDashboard()
    {
        $userId = Auth::id();

        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();

        if (!$eventOwner) {
            return redirect()->route('home')->withErrors('Event Owner tidak ditemukan.');
        }

        $eventDetailsIds = $eventOwner->event()->pluck('id');

        $totalGuests = Rsvp::whereIn('event_id', $eventDetailsIds)
            ->where('confirmation', 'Hadir')
            ->sum('total_guest');

        $totalComments = Comments::count();

        return view('client.client', compact('totalGuests', 'totalComments'));
    }
}

