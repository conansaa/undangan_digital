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
        $userId = Auth::id(); // ID user yang login

        // Ambil event owner berdasarkan user yang login
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();

        if (!$eventOwner) {
            return redirect()->route('home')->withErrors('Event Owner tidak ditemukan.');
        }

        // Ambil ID event yang dimiliki oleh user
        $eventDetailsIds = $eventOwner->event()->pluck('id');

        // Ambil ID RSVP yang terkait dengan event milik user
        $rsvpIds = Rsvp::whereIn('event_id', $eventDetailsIds)->pluck('id');

        // Total tamu yang hadir berdasarkan RSVP
        $totalGuests = Rsvp::whereIn('event_id', $eventDetailsIds)
            ->where('confirmation', 'Hadir')
            ->sum('total_guest');

        // Total komentar yang terkait dengan RSVP milik user
        $totalComments = Comments::whereIn('rsvp_id', $rsvpIds)->count();

        // Kirim data ke view
        return view('client.client', compact('totalGuests', 'totalComments'));
    }
}

