<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use App\Models\Payments;
use App\Models\GenderRef;
use App\Models\ThemePrice;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\EventOwnerNew;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Google\Service\Blogger\Resource\Comments as ResourceComments;

class ClientController extends Controller
{
    public function showDashboard(Request $request)
    {
        $userId = Auth::id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();

        if (!$eventOwner || $eventOwner->event()->count() == 0) {
            return redirect()->route('info')->withErrors('Silakan buat event terlebih dahulu.');
        }

        // Ambil semua event milik user
        $allEvents = $eventOwner->event()->orderByDesc('created_at')->get();

        // Ambil ID event dari dropdown atau pilih yang terbaru sebagai default
        $selectedEventId = $request->input('event_id') ?? $allEvents->first()->id;

        // Ambil nama event untuk ditampilkan
        $event = EventDetails::find($selectedEventId)->event_name ?? '-';

        // Ambil RSVP dan Comments untuk event terpilih
        $rsvpIds = Rsvp::where('event_id', $selectedEventId)->pluck('id');

        $totalGuests = Rsvp::where('event_id', $selectedEventId)
            ->where('confirmation', 'Hadir')
            ->sum('total_guest');

        $totalComments = Comments::whereIn('rsvp_id', $rsvpIds)->count();

        $latestComment = Comments::with('rsvp')
            ->whereHas('rsvp', function ($query) use ($selectedEventId) {
                $query->where('event_id', $selectedEventId);
            })
            ->latest()
            ->take(5)
            ->get();

        $commenters = Comments::whereHas('rsvp', function ($query) use ($selectedEventId) {
            $query->where('event_id', $selectedEventId);
        })
            ->select('rsvp_id', DB::raw('COUNT(*) as count'))
            ->groupBy('rsvp_id')
            ->with('rsvp')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => optional($item->rsvp)->name,
                    'count' => $item->count
                ];
            });

        $totalRsvp = Rsvp::where('event_id', $selectedEventId)->count();

        $totalRsvpWithComments = Comments::whereHas('rsvp', function ($query) use ($selectedEventId) {
                $query->where('event_id', $selectedEventId);
            })
            ->distinct('rsvp_id')
            ->count();

        $totalRsvpWithoutComments = $totalRsvp - $totalRsvpWithComments;

        return view('client.client', compact(
            'event',
            'totalGuests',
            'totalComments',
            'latestComment',
            'commenters',
            'totalRsvpWithComments',
            'totalRsvpWithoutComments',
            'allEvents',
            'selectedEventId'
        ));
    }

    public function showLandingPage()
    {
        return view('client.landingpage');
    }

    public function checkEvent()
    {
        $userId = Auth::id();

        // Cek apakah user memiliki event
        $hasEvent = EventDetails::whereHas('eventOwner', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->exists();

        // Arahkan berdasarkan kondisi
        if ($hasEvent) {
            return redirect('/manage-event');
        } else {
            return redirect('/info');
        }
    }

    public function showManageEvent(Request $request)
    {
        $userId = Auth::id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        // Kalau belum punya eventOwner atau belum punya event
        if (!$eventOwner || $eventOwner->event()->count() === 0) {
            return redirect()->route('info')->with('warning', 'Kamu belum memiliki acara.');
        }
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        // $eventDetails = EventDetails::whereIn('id', $eventDetailsIds)->get();
        $eventDetails = EventDetails::whereIn('id', $eventDetailsIds)
                ->orderBy('created_at', 'desc')
                ->get();
        
        // Ambil event yang dipilih berdasarkan event_id dari request
        $selectedEvent = null;
        if ($request->has('event_id')) {
            $selectedEvent = EventDetails::where('id', $request->event_id)->first();
        }
        // dd(vars: $selectedEvent);

        // Ambil harga tema dari tabel theme_prices berdasarkan theme_id event
        // $themePrice = ThemePrice::where('theme_id', $selectedEvent->theme_id)->first();
        // dd($themePrice);

        // Ambil status pembayaran jika ada
        // $payment = Payments::where('event_id', $selectedEvent->id)->first();

        $events = EventDetails::all();
        return view('client.manageevent', compact('eventDetails', 'selectedEvent'));
    }

    public function detail($id)
    {
        $event = EventDetails::with([
            'figures',
            'eventCards',
            'timeline',
            'mediaAssets',
            'gifts',
            'galleries',
            'payment'
        ])->findOrFail($id);
        $genders = GenderRef::all();
        $payment = Payments::all();

        // Optional: Pastikan hanya owner yang bisa akses
        if ($event->eventOwner->user_id !== Auth::id()) {
            abort(403, 'Kamu tidak memiliki akses ke event ini.');
        }

        return view('client.manageevent-detail', compact('event', 'genders', 'payment'));
    }

    public function showEventReport(Request $request)
    {
        $userId = Auth::id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        // Kalau belum punya eventOwner atau belum punya event
        if (!$eventOwner || $eventOwner->event()->count() === 0) {
            return redirect()->route('info')->with('warning', 'Kamu belum memiliki acara.');
        }
        // $eventDetailsIds = $eventOwner->event()->pluck('id');
        $eventDetails = $eventOwner->event()->orderBy('created_at', 'desc')->get(); // urutkan event dari yang terbaru
        $eventDetailsIds = $eventDetails->pluck('id');
        $selectedEventId = $request->get('event_id', $eventDetailsIds->first());
        $rsvpData = Rsvp::where('event_id', $selectedEventId)
        ->with('comments') // Ambil juga komentar yang terkait dengan RSVP ini
        ->get();
        
        return view('client.eventreport', compact('rsvpData', 'eventDetails', 'selectedEventId'));
    }
}

