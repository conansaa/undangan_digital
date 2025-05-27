<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rsvp;
use App\Models\User;
use App\Models\Theme;
use App\Models\Figures;
use App\Models\Comments;
use App\Models\GenderRef;
use App\Models\Timelines;
use App\Models\BrideGroom;
use App\Models\SectionRef;
use App\Models\EventDetails;
use App\Models\EventReports;
use App\Models\EventTypeRef;
use Illuminate\Http\Request;
use App\Models\EventOwnerNew;
use App\Models\EventReportDetails;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data event
        
        $events = EventDetails::all();
        // return $events->eventOwner->user->name;
        // $users = User::select('name')->get();
        // $eventTypes = EventTypeRef::select('nama')->get();
        return view('admin.eventdetail.eventdetail', compact('events'));
    }

    public function create()
    {
        $users = User::all();
        $event = EventDetails::all();
        $owners = EventOwnerNew::all();
        $eventTypes = EventTypeRef::all();
        $themes = Theme::all();
        return view('admin.eventdetail.create', compact('users', 'event', 'owners', 'eventTypes', 'themes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'event_owner_id' => 'required|integer|exists:event_owner,id',
            'event_name' => 'required|string|max:255',
            'event_type_id' => 'required|integer|exists:event_type_ref,id', // Validasi event_type_id
            'event_date' => 'required|date',
            'event_time' => 'required|date_format:H:i',
            'theme_id' => 'required|integer|exists:themes,id',
        ]);

        // Menyimpan data event baru
        $eventDetail = EventDetails::create($validatedData);

        // Data untuk tabel event report
        $eventType = $eventDetail->eventType;
        $eventDate = Carbon::parse($eventDetail->event_date);
        $month = $eventDate->month;
        $year = $eventDate->year;

        // Cek apakah sudah ada laporan untuk tipe acara, bulan, dan tahun ini
        $eventReport = EventReports::where('event_type_id', $eventType->id)
            ->where('month', $month)
            ->where('year', $year)
            ->first();

        if ($eventReport) {
            // Update laporan yang sudah ada
            $eventReport->counter += 1;
            $eventReport->progress_total += 1; // Tambahkan event ke progres
            $eventReport->save();
        } else {
            // Buat laporan baru
            EventReports::create([
                'event_type_id' => $eventType->id,
                'month' => $month,
                'year' => $year,
                'counter' => 1,
                'progress_total' => 1,
                'finish_total' => 0,
            ]);
        }

        // Tambahkan data ke tabel event_report_details
        EventReportDetails::create([
            'event_report_id' => $eventReport->id,
            'event_id' => $eventDetail->id,
        ]);
        return redirect('/event')->with('success', 'Tipe acara berhasil ditambahkan');
    }

    // Untuk client
    public function createevent()
    {
        $theme = Theme::all();
        $type = EventTypeRef::all();
        $userId = Auth::id();
        $hasEvent = EventDetails::whereHas('eventOwner', function ($q) use ($userId) {
            $q->where('user_id', $userId);
        })->exists();
        return view('client.create_event', compact('theme', 'type', 'hasEvent'));
    }

    public function storeevent(Request $request)
    {
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_time' => 'required|string|max:50',
            'type' => 'required|integer',
            'event_location' => 'required|string|max:255',
            'theme_id' => 'required|integer'
        ]);

        $userId = Auth::id();

        // Cari event_owner_id berdasarkan user_id yang sedang login
        $eventOwner = EventOwnerNew::firstOrCreate(
            ['user_id' => $userId], // Kondisi pencarian
            // ['other_field' => 'default_value'] // Data default jika belum ada (sesuaikan dengan tabelmu)
        );
        if (!$eventOwner) {
            return response()->json([
                'success' => false,
                'message' => 'Event owner tidak ditemukan!',
            ], 404);
        }

        // $event = EventDetails::create([
        //     // 'user_id' => auth()->id(),
        //     'event_owner_id' => $eventOwner->id,
        //     'event_name' => $validated['event_name'],
        //     'event_date' => $validated['event_date'],
        //     'event_type_id' => $validated['type'],
        //     'event_time' => $validated['event_time'],
        //     'theme_id' => $validated['theme_id']
        // ]);
        $event = new EventDetails();
        $event->event_owner_id = $eventOwner->id;
        $event->event_name = $validated['event_name'];
        $event->event_date = $validated['event_date'];
        $event->event_time = $validated['event_time'];
        $event->event_type_id = $validated['type'];
        $event->theme_id = $validated['theme_id'];
        // $event->user_id = auth()->id(); // kalau perlu

        $event->save();

        return response()->json([
            'success' => true,
            'message' => 'Event berhasil dibuat!',
            'event_id' => $event->id
        ]);
    }

    public function step2()
    {
        $userId = Auth::id();
        $event = EventDetails::where('user_id', $userId)->first();

        // if (!$event || !$event->is_step1_completed) {
        //     return redirect()->route('client.dashboard')->with('error', 'Selesaikan tahap pertama terlebih dahulu.');
        // }

        return view('event.step2', compact('event'));
    }

    public function markAsFinished($id)
    {
        // Cari event detail
        $eventDetail = EventDetails::findOrFail($id);

        // Cari event report terkait
        $eventTypeId = $eventDetail->event_type_id;
        $eventDate = Carbon::parse($eventDetail->event_date);
        $month = $eventDate->month;
        $year = $eventDate->year;

        $eventReport = EventReports::where('event_type_id', $eventTypeId)
            ->where('month', $month)
            ->where('year', $year)
            ->first();

        if ($eventReport) {
            // Update progress dan finish
            if ($eventReport->progress_total > 0) {
                $eventReport->progress_total -= 1;
            }
            $eventReport->finish_total += 1;
            $eventReport->save();
        }

        // Tandai event selesai dengan flag di session atau di view
        session()->flash('finished_event_ids', array_merge(
            session()->get('finished_event_ids', []),
            [$eventDetail->id]
        ));

        return response()->json([
            'success' => true,
            'message' => 'Event marked as finished.',
        ]);
    }

    public function finishEvent($eventId)
    {
        // Cek apakah event dengan ID yang diberikan ada
        $eventDetail = EventDetails::findOrFail($eventId);
        
        // Cek apakah event sudah ada di session sebagai finished
        if (session('finished_event_ids') && in_array($eventId, session('finished_event_ids'))) {
            return response()->json(['success' => false, 'message' => 'Event sudah selesai']);
        }

        // Ambil event report yang terkait dengan event
        $eventReport = EventReports::where('event_type_id', $eventDetail->event_type_id)
            ->where('month', Carbon::parse($eventDetail->event_date)->month)
            ->where('year', Carbon::parse($eventDetail->event_date)->year)
            ->first();

        if ($eventReport) {
            // Update event report untuk mengurangi progress dan menambah selesai
            $eventReport->progress_total -= 1;
            $eventReport->finish_total += 1;
            $eventReport->save();
        }

        // Simpan ID event yang selesai ke session
        $finishedEventIds = session('finished_event_ids', []);
        $finishedEventIds[] = $eventId;
        session(['finished_event_ids' => $finishedEventIds]);

        return response()->json(['success' => true, 'message' => 'Event berhasil ditandai selesai']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan event berdasarkan ID
        $event = EventDetails::find($id);
        $eventTypes = EventTypeRef::all();
        // $rsvps = Rsvp::where('event_id', $id)->get();
        $comments = Comments::whereHas('rsvp', function ($query) use ($id) {
            $query->where('event_id', $id);
        })->with('rsvp')->get(); 
        // $comments = Comments::all();
        $sections = SectionRef::all();
        $genders = GenderRef::all();

        // Jika data tidak ditemukan, kembalikan 404
        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        return view('admin.eventdetail.detail', compact('event', 'eventTypes', 'comments', 'sections', 'genders'));
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
        $owners = EventOwnerNew::all();
        $themes = Theme::all();

        // Menampilkan halaman edit dengan data yang diambil
        return view('admin.eventdetail.edit', compact('event', 'users', 'eventTypes', 'owners', 'themes'));
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
