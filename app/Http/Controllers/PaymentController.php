<?php

namespace App\Http\Controllers;

use App\Models\Figures;
use Illuminate\Support\Str;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\InvitationLink;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function confirmPayment(Request $request, $figureId)
    {
        // Ambil user yang sedang login
        $user = Auth::id();

        // Ambil event yang dimiliki user
        $event = EventDetails::where('user_id', $user)->first();

        if (!$event) {
            return redirect()->back()->with('error', 'Anda belum memiliki acara.');
        }

        // Ambil dua figure berdasarkan event
        $figures = Figures::where('event_id', $event->id)->take(2)->pluck('name');

        if ($figures->count() < 2) {
            return redirect()->back()->with('error', 'Acara membutuhkan dua figure.');
        }

        // Format link menjadi "/figure1-figure2/to"
        $link = url('/' . Str::slug($figures[0]) . '-' . Str::slug($figures[1]) . '/to');

        // Set tanggal pembayaran & expired
        $tanggal_pembayaran = now();
        $expired_at = now()->addMonths(3);
        $totalTagihan = $request->input('total_tagihan');

        // Simpan ke database
        InvitationLink::create([
            'figure_id' => $figureId,
            'link' => $link,
            'total_tagihan' => $totalTagihan,
            'status_pembayaran' => 'paid',
            'tanggal_pembayaran' => $tanggal_pembayaran,
            'expired_at' => $expired_at,
        ]);

        return redirect()->back()->with('success', 'Pembayaran berhasil, link undangan telah diaktifkan.');
    }


}
