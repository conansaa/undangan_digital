<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data RSVP
        $rsvps = Rsvp::all(); // Fetch all RSVPs

        // Ambil event_date dari tabel event_details dengan id 1
        $event = DB::table('event_details')->where('id', 1)->first();

        // Jika event tidak ditemukan, kirim pesan error melalui session
        if (!$event) {
            return redirect()->back()->with('event_error', 'Event not found.');
        }

        // Kirim data RSVP dan event ke view
        return view('RSVP.rsvp', compact('rsvps', 'event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'confirmation' => 'required|string',
            'total_guest' => 'required|integer|min:1',
            'event_id' => 'required|exists:event_details,id', // Ensure event_id exists
        ]);

        // Membuat data RSVP baru
        $rsvp = Rsvp::create($request->all());
        return redirect()->route('rsvp.index')->with('success', 'RSVP berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan RSVP berdasarkan ID
        $rsvp = Rsvp::find($id);

        // Jika data tidak ditemukan, kembalikan 404
        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        return response()->json($rsvp, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Menemukan RSVP berdasarkan ID
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        // Update data
        $rsvp->update($request->all());
        return response()->json($rsvp, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan RSVP berdasarkan ID
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        // Hapus data
        $rsvp->delete();
        return response()->json(['message' => 'RSVP deleted successfully'], 200);
    }
    
}

