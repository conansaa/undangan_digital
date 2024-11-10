<?php

namespace App\Http\Controllers;

use App\Models\EventDetails;
use App\Models\EventOwnerDetails;
use App\Models\Gifts;
use App\Models\Timelines;
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
        $eventResepsi = DB::table('event_details')->where('id', 1)->first();
        $eventAkad = DB::table('event_details')->where('id', 2)->first();

        $eventBride = DB::table('event_owner_details')->where('id', 1)->first();
        $eventGroom = DB::table('event_owner_details')->where('id', 2)->first();

        $giftBarang = DB::table('gifts')->where('id', 1)->first();
        $giftTf = DB::table('gifts')->where('id', 2)->first();

        $timelines = DB::table('timelines')->get();

        $gallery = DB::table('gallery')->get();


        if (!$eventAkad) {
            return redirect()->back()->with('event_error', 'Event not found.');
        }
        if (!$eventResepsi) {
            return redirect()->back()->with('event_error', 'Event not found.');
        }
        return view('RSVP_Comment.rsvp', compact(
            'eventAkad',
            'eventResepsi',
            'eventBride',
            'eventGroom', 
            'rsvps',
            'gallery',
            'giftBarang',
            'giftTf',
            'timelines',
            'comments'
        ));

    }

    public function views()
    {
        $rsvps = Rsvp::all();
        return view('admin.rsvp.rsvp', compact('rsvps'));
    }
    public function invitation()
    {
        $eventResepsi = DB::table('event_details')->where('id', 1)->first();
        $eventAkad = DB::table('event_details')->where('id', 2)->first();
        return view('RSVP_Comment.tema2', compact(
            'eventAkad',
            'eventResepsi'
        ));
    }

    public function create()
    {
        $eventDetails = EventDetails::all(); 
        return view('admin.rsvp.create', compact('eventDetails')); // Sesuaikan dengan nama view kamu
    }

    public function make($id)
    {
        $eventDetails = EventDetails::find($id); 
        return view('admin.rsvp.create', compact('eventDetails')); // Sesuaikan dengan nama view kamu
    }

    public function storedata(Request $request)
    {
        // Ensure confirmation is "yes" or "no" before insertion
        $confirmationValue = $request->confirmation === 'yes' ? 'yes' : 'no';
        $request->merge(['confirmation' => $confirmationValue]);

        // Update total_guest if confirmation is "no"
        if ($confirmationValue === 'no') {
            $request->merge(['total_guest' => 0]);
        }

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'confirmation' => 'required|in:yes,no',
            'total_guest' => [
                'required_if:confirmation,yes',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->confirmation === 'yes' && $value < 1) {
                        $fail('Jumlah tamu harus lebih dari 0 jika Anda hadir.');
                    }
                }
            ],
            'event_id' => 'required|exists:event_details,id',
        ]);

        // Check if the phone number already exists
        $existingRsvp = Rsvp::where('phone_number', $request->phone_number)
                            ->where('event_id', $request->event_id)
                            ->first();

        if ($existingRsvp) {
            session([
                'new_data' => $request->all(),
                'existing_rsvp' => $existingRsvp,
                'phone_exists' => true,
                'message' => 'Nomor telepon sudah terdaftar. Apakah Anda ingin memperbarui data lama?',
            ]);

            return redirect()->route('rsvp.index');
        }

        // Store new data if phone number is not in use
        $newRsvp = Rsvp::create($request->all());
        session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
        session(['rsvp_id' => $newRsvp->id]);

        return redirect('/rsvps')->with('success', 'RSVP berhasil disimpan!');
    }

    public function edit($id)
    {
        // Ambil data timeline berdasarkan id
        $rsvp = Rsvp::findOrFail($id);
        
        // Ambil semua event details untuk dropdown event_id
        $events = EventDetails::all();

        // Kirim data ke view
        return view('admin.rsvp.edit', compact('rsvp', 'events'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'event_id' => 'required|exists:event_details,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string',
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
        ]);

        $rsvp = Rsvp::findOrFail($id);

        $rsvp->event_id = $request->event_id;
        $rsvp->name = $request->name;
        $rsvp->phone_number = $request->phone_number;
        $rsvp->confirmation = $request->confirmation;
        $rsvp->total_guest = $request->total_guest;

        $rsvp->save();
        return redirect('/rsvps')->with('success', 'Reservasi berhasil diperbarui.');

    }

    /**
     * Store or update an RSVP in storage.
     */
    public function store(Request $request)
    {
        if ($request->confirmation === 'no') {
            $request->merge(['total_guest' => 0]);
        }

        $confirmationValue = $request->confirmation === 'yes' ? 'Hadir' : 'Tidak Hadir';
        $request->merge(['confirmation' => $confirmationValue]);

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

        $existingRsvp = Rsvp::where('phone_number', $request->phone_number)
                            ->where('event_id', $request->event_id)
                            ->first();

        if ($existingRsvp) {
            session([
                'new_data' => $request->all(),
                'existing_rsvp' => $existingRsvp,
                'phone_exists' => true,
                'message' => 'Nomor telepon sudah terdaftar. Apakah Anda ingin memperbarui data lama?',
            ]);

            return redirect()->route('rsvp.index');
        }

        $newRsvp = Rsvp::create($request->all());
        session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
        session(['rsvp_id' => $newRsvp->id, 'success' => true]);

        return redirect()->route('rsvp.index');
    }

    public function confirmUpdate(Request $request)
    {
        $newData = session('new_data');
        $existingRsvp = session('existing_rsvp');
        $confirmation = $request->input('confirmation', $newData['confirmation']);

        if ($confirmation === 'yes') {
            $confirmation = 'Hadir';
        } elseif ($confirmation === 'no') {
            $confirmation = 'Tidak Hadir';
        }

        if ($newData && $existingRsvp) {
            $updatedData = [
                'name' => $request->input('name', $newData['name']),
                'phone_number' => $newData['phone_number'], 
                'confirmation' => $confirmation,
                'total_guest' => $request->input('total_guest', $newData['total_guest']),
                'event_id' => $newData['event_id'], 
            ];

            $existingRsvp->update($updatedData);

            session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);

            return redirect()->route('rsvp.index', ['#rsvp'])->with('success', 'Data berhasil diperbarui!');
        }

        return redirect()->route('rsvp.index')->with('error', 'Terjadi kesalahan dalam memperbarui data.');
    }


    public function cancelUpdate()
    {
        session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
        return redirect()->route('rsvp.index', ['#rsvp']);
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
        return redirect('/rsvps')->with('success', 'Data Berhasil Dihapus!!');
    }
}
