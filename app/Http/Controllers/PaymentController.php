<?php

namespace App\Http\Controllers;

use App\Models\Figures;
use App\Models\Payments;
use Illuminate\Support\Str;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\InvitationLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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

    public function confirm($id)
    {
        $event = EventDetails::with('eventType', 'themes')->findOrFail($id);

        // Cek apakah user punya akses ke event ini
        if ($event->eventOwner->user_id !== Auth::id()) {
            abort(403, 'Kamu tidak memiliki akses ke event ini.');
        }

        return view('client.payment.confirm', compact('event'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpg,jpeg,png,webp|max:1000',
            'amount' => 'required|numeric'
        ]);

        // Cek apakah user memiliki event ini
        $event = EventDetails::with('eventOwner')->findOrFail($id);
        if ($event->eventOwner->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }

        $payment = Payments::firstOrNew([
            'event_id' => $id,
            'user_id' => Auth::id()
        ]);

        // Simpan bukti pembayaran
        if ($request->hasFile('payment_proof')) {
            // Hapus file lama jika ada
            if ($payment->payment_proof && File::exists(public_path('payment_proof/' . $payment->payment_proof))) {
                File::delete(public_path('payment_proof/' . $payment->payment_proof));
            }

            $fileName = time() . '_' . $request->file('payment_proof')->getClientOriginalName();
            $request->file('payment_proof')->move(public_path('payment_proof'), $fileName);
            $payment->payment_proof = $fileName;
        }

        $payment->event_id = $id;
        $payment->user_id = Auth::id();
        $payment->payment_status = 'pending';
        $payment->amount = $request->amount;
        $payment->save();

        return redirect()->route('client.manageevent')->with('success', 'Bukti pembayaran berhasil dikirim. Menunggu verifikasi admin.');
    }

    public function index()
    {
        $payments = Payments::with(['event', 'user', 'event.themes.package'])->latest()->get();
        $events = EventDetails::with(['eventOwner.user', 'payment', 'themes.package'])
                ->latest()
                ->get();
        return view('admin.payments.index', compact('payments', 'events'));
    }

    public function verify($id)
    {
        $payment = Payments::findOrFail($id);
        $payment->payment_status = 'verified';
        $payment->save();

        return redirect()->back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    public function reject($id)
    {
        $payment = Payments::findOrFail($id);
        $payment->payment_status = 'rejected';
        $payment->save();

        return redirect()->back()->with('error', 'Pembayaran ditolak.');
    }

    // public function store(Request $request, $eventId)
    // {
    //     $request->validate([
    //         'payment_proof' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);

    //     $userId = Auth::id();

    //     $file = $request->file('payment_proof');
    //     $path = $file->store('payments', 'public');

    //     Payments::create([
    //         'event_id' => $eventId,
    //         'user_id' => $userId,
    //         'amount' => 250000, // contoh biaya
    //         'payment_proof' => $path,
    //         'payment_status' => 'pending',
    //     ]);

    //     return redirect()->back()->with('success', 'Bukti pembayaran berhasil dikirim, menunggu validasi admin.');
    // }

}
