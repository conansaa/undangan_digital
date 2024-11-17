<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\SectionRef;
use App\Models\User;
use App\Models\Comments;
use App\Models\Timelines;
use App\Models\EventDetails;
use App\Models\EventTypeRef;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data event
        $events = EventDetails::with('user', 'eventType')->get();
        // $users = User::select('name')->get();
        // $eventTypes = EventTypeRef::select('nama')->get();
        return view('admin.eventdetail.eventdetail', compact('events'));
    }

    public function create()
    {
        $users = User::all();
        $eventTypes = EventTypeRef::all();
        return view('admin.eventdetail.create', compact('users', 'eventTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id', // Validasi user_id berdasarkan tabel users
            'event_name' => 'required|string|max:255',
            'event_type_id' => 'required|integer|exists:event_type_ref,id', // Validasi event_type_id
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'full_location' => 'required|string|max:255',
            'quota' => 'required|integer',
        ]);

        // Menyimpan data event baru
        EventDetails::create($validatedData);
        return redirect('/event')->with('success', 'Tipe acara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan event berdasarkan ID
        $event = EventDetails::find($id);
        $eventTypes = EventTypeRef::all();
        $comments = Comments::all();
        $sections = SectionRef::all();

        // Jika data tidak ditemukan, kembalikan 404
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return view('admin.eventdetail.detail', compact('event', 'eventTypes', 'comments', 'sections'));
    }

    // public function storeRsvp(Request $request, $event_id)
    // {
    //     dd($request->all());
    //     $request->validate([
    //         'name' => 'required|max:100',
    //         'phone_number' => 'required',
    //         'confirmation' => 'in:yes,no',
    //         'total_guest' => [
    //             'required_if:confirmation,yes',
    //             'integer',
    //             function ($attribute, $value, $fail) use ($request) {
    //                 if ($request->confirmation === 'yes' && $value < 1) {
    //                     $fail('Jumlah tamu harus lebih dari 0 jika Anda hadir.');
    //                 }
    //             }
    //         ],
    //     ]);

    //     $existingRsvp = Rsvp::where('phone_number', $request->phone_number)
    //                         ->where('event_id', $request->event_id)
    //                         ->first();

    //     if ($existingRsvp) {
    //         session([
    //             'new_data' => $request->all(),
    //             'existing_rsvp' => $existingRsvp,
    //             'phone_exists' => true,
    //             'message' => 'Nomor telepon sudah terdaftar. Apakah Anda ingin memperbarui data lama?',
    //         ]);

    //         return redirect()->route('rsvp.index');
    //     }

    //     // Store new data if phone number is not in use
    //     $newRsvp = Rsvp::create($request->all());
    //     session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
    //     session(['rsvp_id' => $newRsvp->id]);

    //     return redirect()->route('event.show', ['id' => $event_id])->with('success', 'Rsvp berhasil ditambahkan!');
    // }

    public function showTgl()
    {
        // Fetch the akad and resepsi events from the database
        $akadEvent = EventDetails::find(2);
        $resepsiEvent = EventDetails::find(1);

        // Pass them to the view
        return view('RSVP_Comment.rsvp', compact('akadEvent', 'resepsiEvent'));
    }
    

    public function edit($id)
    {
        // Mengambil data event berdasarkan ID
        $event = EventDetails::findOrFail($id);
        
        // Mengambil data pengguna dan tipe event untuk dropdown
        $users = User::all();
        $eventTypes = EventTypeRef::all();

        // Menampilkan halaman edit dengan data yang diambil
        return view('admin.eventdetail.edit', compact('event', 'users', 'eventTypes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Menemukan event berdasarkan ID
        $event = EventDetails::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // Validate input
        $validatedData = $request->validate([
            'user_id' => 'sometimes|required|integer|exists:users,id',
            'event_name' => 'sometimes|required|string|max:255',
            'event_type_id' => 'sometimes|required|integer|exists:event_type_ref,id',
            'event_date' => 'sometimes|required|date',
            'event_time' => 'sometimes|required|date_format:H:i',
            'location' => 'sometimes|required|string|max:255',
            'full_location' => 'sometimes|required|string|max:255',
            'quota' => 'sometimes|required|integer',
        ]);

        // Update data event
        $event->update($validatedData);
        return redirect('/event')->with('success', 'Event berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan event berdasarkan ID
        $event = EventDetails::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        // Hapus data event
        $event->delete();
        return redirect('/event')->with('success', 'Data Berhasil Dihapus!!');
    }
}
