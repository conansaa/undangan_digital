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

        if (!$eventOwner || $eventOwner->event()->count() == 0) {
            return redirect()->route('client.landingpage')->withErrors('Silakan buat event terlebih dahulu.');
        }

        // Ambil ID event yang dimiliki oleh user
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        if ($eventDetailsIds->isEmpty()) {
            return redirect()->route('home')->withErrors('Tidak ada event yang ditemukan untuk Event Owner ini.');
        }

        // Ambil ID RSVP yang terkait dengan event milik user
        $rsvpIds = Rsvp::whereIn('event_id', $eventDetailsIds)->pluck('id');

        // Total tamu yang hadir berdasarkan RSVP
        $totalGuests = Rsvp::whereIn('event_id', $eventDetailsIds)
            ->where('confirmation', 'Hadir')
            ->sum('total_guest');

        // Total komentar yang terkait dengan RSVP milik user
        $totalComments = Comments::whereIn('rsvp_id', $rsvpIds)->count();

        // $latestComments = Comments::whereIn('rsvp_id', $rsvpIds)->first();
        $latestComment = Comments::whereHas('rsvp', function ($query) use ($eventDetailsIds) {
            $query->where('event_id', $eventDetailsIds);
        })->with('rsvp')->latest()->take(1)->get(); 

        // Kirim data ke view
        return view('client.client', compact('totalGuests', 'totalComments', 'latestComment'));
    }

    public function showLandingPage()
    {
        return view('client.landingpage');
    }
}

