<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rsvps = Rsvp::with('comments')->orderBy('name')->get();
        $comments = Comments::with('rsvp')->get(); // Include related RSVP data

        // Fetch event details
        $event = DB::table('event_details')->where('id', 1)->first();

        if (!$event) {
            return redirect()->back()->with('event_error', 'Event not found.');
        }
        return view('RSVP & Comment.rsvp', compact('rsvps', 'event', 'comments'));

    }

    /**
     * Store or update an RSVP in storage.
     */
    public function store(Request $request)
    {
        // Ubah total_guest jika konfirmasi adalah 'Tidak Hadir'
        if ($request->confirmation === 'no') {
            $request->merge(['total_guest' => 0]);
        }

        $confirmationValue = $request->confirmation === 'yes' ? 'Hadir' : 'Tidak Hadir';
        $request->merge(['confirmation' => $confirmationValue]);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'confirmation' => 'required|string',
            'total_guest' => [
                'required_if:confirmation,Hadir',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->confirmation === 'Hadir' && $value < 1) {
                        $fail('Jumlah tamu harus lebih dari 0 jika Anda hadir.');
                    }
                }
            ],
            'event_id' => 'required|exists:event_details,id',
        ]);

        // Cek apakah nomor telepon sudah ada
        $existingRsvp = Rsvp::where('phone_number', $request->phone_number)
                            ->where('event_id', $request->event_id)
                            ->first();

        if ($existingRsvp) {
            // Simpan data baru ke session jika user setuju mengedit
            session([
                'new_data' => $request->all(),
                'existing_rsvp' => $existingRsvp,
                'phone_exists' => true,
                'message' => 'Nomor telepon sudah terdaftar. Apakah Anda ingin memperbarui data lama?',
            ]);

            return redirect()->route('rsvp.index');
        }

        // Jika nomor telepon belum ada, simpan data baru
        $newRsvp = Rsvp::create($request->all());
        session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
        // Store rsvp_id in session
        session(['rsvp_id' => $newRsvp->id]);

        // Redirect to the RSVP view with a success message
        return redirect()->route('rsvp.index')->with('success', 'RSVP berhasil dikirim!');
    }

    public function confirmUpdate()
    {
        $newData = session('new_data');
        $existingRsvp = session('existing_rsvp');

        if ($newData && $existingRsvp) {
            $existingRsvp->update($newData);
            session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
            return redirect()->route('rsvp.index')->with('success', 'Data berhasil diperbarui!');
        }

        return redirect()->route('rsvp.index')->with('error', 'Terjadi kesalahan dalam memperbarui data.');
    }

    public function cancelUpdate()
    {
        session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
        return redirect()->route('rsvp.index');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find RSVP by ID
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        return response()->json($rsvp, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find RSVP by ID
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        // Delete RSVP
        $rsvp->delete();
        return response()->json(['message' => 'RSVP deleted successfully'], 200);
    }
}
