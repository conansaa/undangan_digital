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
        // dd($userId);

        // Ambil event owner berdasarkan user yang login
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        // dd($eventOwner);

        if (!$eventOwner || $eventOwner->event()->count() == 0) {
            return redirect()->route('info')->withErrors('Silakan buat event terlebih dahulu.');
        }

        // Ambil ID event yang dimiliki oleh user
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        if ($eventDetailsIds->isEmpty()) {
            return redirect()->route('home')->withErrors('Tidak ada event yang ditemukan untuk Event Owner ini.');
        }
        // dd($eventDetailsIds);
        // dd($eventOwner->event);

        // Ambil ID RSVP yang terkait dengan event milik user
        $rsvpIds = Rsvp::whereIn('event_id', $eventDetailsIds)->pluck('id');
        // dd($rsvpIds);

        // Total tamu yang hadir berdasarkan RSVP
        $totalGuests = Rsvp::whereIn('event_id', $eventDetailsIds)
            ->where('confirmation', 'Hadir')
            ->sum('total_guest');
        // dd($totalGuests);

        // Total komentar yang terkait dengan RSVP milik user
        $totalComments = Comments::whereIn('rsvp_id', $rsvpIds)->count();
        // dd($totalComments);

        // Kirim data ke view
        return view('client.client', compact('totalGuests', 'totalComments'));
    }
}

