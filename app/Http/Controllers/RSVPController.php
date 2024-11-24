<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Gifts;
use App\Models\LogRsvp;
use App\Models\Comments;
use App\Models\Timelines;
use App\Models\EventCards;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\EventOwnerDetails;
use Illuminate\Support\Facades\DB;

class RsvpController extends Controller
{
    public function index($name)
{
    // Retrieve RSVP data with comments, ordered by name
    $rsvps = Rsvp::with('comments')->orderBy('name')->get();
    $comments = Comments::with('rsvp')->get();

    // Fetch event and other related details
    $eventResepsi = DB::table('event_details')->find(1);
    $eventAkad = DB::table('event_details')->find(2);
    $eventBride = DB::table('event_owner_details')->find(1);
    $eventGroom = DB::table('event_owner_details')->find(2);
    $giftBarang = DB::table('gifts')->find(1);
    $giftTf = DB::table('gifts')->find(2);
    $timelines = DB::table('timelines')->get();
    $gallery = DB::table('gallery')->get();

    // Retrieve existing RSVP record and phone number
    $existingRsvp = Rsvp::where('name', $name)->first();
    $phoneNumber = optional($existingRsvp)->phone_number;
    if ($existingRsvp) {
        session()->flash('existing_rsvp', $existingRsvp);
    }

    // Redirect if either of the event details is missing
    if (!$eventAkad || !$eventResepsi) {
        return redirect()->back()->with('event_error', 'Event not found.');
    }

    // Fetch old data from the log for the provided name
    $oldData = LogRsvp::where('name', $name)->get();

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
        'comments',
        'name',
        'phoneNumber',
        'oldData'
    ));
}



    public function views()
    {
        $rsvps = Rsvp::all();
        return view('admin.rsvp.rsvp', compact('rsvps'));
    }
    public function viewclient()
    {
        $totalGuests = Rsvp::where('confirmation', 'Hadir')->sum('total_guest');
        // $totalQuota = EventDetails::where('id', 1)->value('quota') ?? 0;
        $totalQuota = EventCards::where('id', 1)->value('quota') ?? 0;

        $sort = request('sort', 'name'); 
        $order = request('order', 'asc');

        if ($sort === 'confirmation') {
            $rsvps = Rsvp::orderByRaw("
                FIELD(confirmation, 'Hadir', 'Tidak Hadir', '') " . ($order == 'asc' ? "ASC" : "DESC") . ",
                confirmation IS NULL " . ($order == 'asc' ? "ASC" : "DESC")
            )->get();
        } else {
            $rsvps = Rsvp::orderBy($sort, $order)->get();
        }

        return view('client.rsvpclient', compact('totalGuests', 'totalQuota', 'rsvps', 'sort', 'order'));
    }

    public function invitation($name)
    {
        $eventResepsi = DB::table('event_details')->where('id', 1)->first();
        $eventAkad = DB::table('event_details')->where('id', 2)->first();
        
        // Pass the name to the view
        return view('RSVP_Comment.tema2', compact('eventAkad', 'eventResepsi', 'name'));
    }


    public function create()
    {
        $eventDetails = EventDetails::all(); 
        return view('admin.rsvp.create', compact('eventDetails')); 
    }

    public function make($id)
    {
        $eventDetails = EventDetails::find($id); 
        return view('admin.rsvp.create', compact('eventDetails')); // Sesuaikan dengan nama view kamu
    }

    public function storeModal(Request $request, $event_id)
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
            'confirmation' => 'nullable|in:yes,no',
            'total_guest' => [
                'required_if:confirmation,yes',
                'integer',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->confirmation === 'yes' && $value < 1) {
                        $fail('Jumlah tamu harus lebih dari 0 jika Anda hadir.');
                    }
                }
            ],
            // 'event_id' => 'required|exists:event_details,id',
        ]);

        // Check if the phone number already exists
        $existingRsvp = Rsvp::where('phone_number', $request->phone_number)
                            ->where('event_id', $event_id)
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
        $newRsvp = new Rsvp();
        $newRsvp->event_id = $event_id;
        $newRsvp->name = $request->name;
        $newRsvp->phone_number = $request->phone_number;
        $newRsvp->confirmation = $request->confirmation;
        $newRsvp->total_guest = $request->total_guest;

        $newRsvp->save();
        session()->forget(['new_data', 'existing_rsvp', 'phone_exists', 'message']);
        session(['rsvp_id' => $newRsvp->id]);

        return redirect()->route('event.show', ['id' => $event_id])->with('success', 'Rsvp berhasil ditambahkan!');
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

    public function createtamu()
    {
        $eventDetails = EventDetails::first(); 
        return view('client.createtamu', compact('eventDetails')); 
    }
    public function storetamu(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|digits_between:12,15', 
            'event_id' => 'required|exists:event_details,id',
        ]);

        $existingRsvp = Rsvp::where('name', $validatedData['name'])
                            ->where('event_id', $validatedData['event_id'])
                            ->first();

        if ($existingRsvp) {
            return redirect()->back()->withErrors([
                'name' => 'Nama tidak boleh sama, mohon berikan pembeda yang unik.'
            ]);
        }

        Rsvp::create($validatedData);

        // if (!empty($validatedData['phone_number'])) {
        //     $phone_number = preg_replace('/\D/', '', $validatedData['phone_number']); // Hapus karakter non-numeric
        //     $name = $validatedData['name'];
        //     $message = urlencode("Hello $name, thank you for RSVPing! here's the link http://127.0.0.1:8000/invitation/$name");
        //     $whatsapp_link = "https://wa.me/$phone_number?text=$message";

        //     return redirect($whatsapp_link);
        // }

        return redirect('rsvpclient')->with('success', 'Nama tamu berhasil disimpan.');
    }
    public function destroytamu($id)
    {
        // Find RSVP by ID
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        // Delete RSVP
        $rsvp->delete();
        return redirect('/rsvpclient')->with('success', 'Data Berhasil Dihapus!!');
    }

     public function store(Request $request, $name)
    {
        if ($request->confirmation === 'no') {
            $request->merge(['total_guest' => 0]);
        }

        $confirmationValue = $request->confirmation === 'yes' ? 'Hadir' : 'Tidak Hadir';
        $request->merge(['confirmation' => $confirmationValue]);

        $request->validate([
            'phone_number' => 'required',
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

        $existingRsvp = Rsvp::where('name', $request->name)
                            ->where('event_id', $request->event_id)
                            ->first();
                            if ($existingRsvp) {
                                if ($existingRsvp->confirmation !== null && $existingRsvp->total_guest !== null) {
                                    
                                    $dataChanged = (
                                        $existingRsvp->confirmation !== $request->confirmation ||
                                        $existingRsvp->total_guest != $request->total_guest ||
                                        $existingRsvp->phone_number !== $request->phone_number
                                    );
                            
                                    if ($dataChanged) {
                                        session([
                                            'new_data' => $request->all(),
                                            'existing_rsvp' => $existingRsvp,
                                            'name_exists' => true,
                                            'phone_number' => $existingRsvp->phone_number,
                                            'message' => 'Nama sudah terdaftar dengan data konfirmasi yang berbeda, lihat history data?',
                                        ]);
                            
                                        return redirect()->route('rsvp.index', ['name' => $name]);
                                    }
                            
                                    $existingRsvp->update([
                                        'confirmation' => $request->confirmation ?? $existingRsvp->confirmation,
                                        'total_guest' => $request->total_guest ?? $existingRsvp->total_guest,
                                        'phone_number' => $request->phone_number,
                                    ]);
                            
                                    $existingRsvp->saveLog('Same Data');
                                    
                                    return redirect()->route('rsvp.index', ['name' => $name]);
                            
                                } else {
                                    $existingRsvp->update([
                                        'confirmation' => $request->confirmation,
                                        'total_guest' => $request->total_guest,
                                        'phone_number' => $request->phone_number,
                                    ]);
                            
                                    $existingRsvp->saveLog('Updated RSVP');
                                    
                                    return redirect()->route('rsvp.index', ['name' => $name]);
                                }
                            
                            } else {
                                $newRsvp = Rsvp::create([
                                    'name' => $request->name,
                                    'phone_number' => $request->phone_number,
                                    'confirmation' => $request->confirmation,
                                    'total_guest' => $request->total_guest,
                                ]);
                            
                                $newRsvp->saveLog('Created RSVP');
                            
                                return redirect()->route('rsvp.index', ['name' => $name]);
                            }
        $newRsvp = Rsvp::create($request->all());

        session()->forget(['new_data', 'existing_rsvp', 'name_exists', 'phone_number', 'message']);
        session(['rsvp_id' => $newRsvp->id, 'success' => true]);

        return redirect()->route('rsvp.index', ['name' => $name]);
    }
    public function confirmUpdate(Request $request, $name)
    {
        $newData = session('new_data');
        $existingRsvp = Rsvp::where('name', $request->name)->first();
        $confirmation = $request->input('confirmation', $newData['confirmation']);

        if ($request->confirmation === 'no') {
            $request->merge(['total_guest' => 0]);
        }
        if ($confirmation === 'yes') {
            $confirmation = 'Hadir';
        } elseif ($confirmation === 'no') {
            $confirmation = 'Tidak Hadir';
        }
        
        if ($newData && $existingRsvp) {
            $updatedData = [
                'name' => $request->input('name'),
                'phone_number' => $newData['phone_number'],
                'confirmation' => $confirmation,
                'total_guest' => $request->input('total_guest', $newData['total_guest']),
                'event_id' => $newData['event_id'],
            ];

            $existingRsvp->update($updatedData);

            $existingRsvp->saveLog('Updated');

            session()->forget(['new_data', 'existing_rsvp', 'name_exists', 'message']);
            return redirect()->route('rsvp.index', ['name' => $name . '#rsvp'])->with('success', 'Data berhasil diperbarui!');
        }

        return redirect()->route('rsvp.index', ['name' => $name])->with('error', 'Terjadi kesalahan dalam memperbarui data.');
    }


    public function cancelUpdate($name)
    {
        session()->forget(['new_data', 'existing_rsvp', 'name_exists', 'message']);

        return redirect()->route('rsvp.index', ['name' => $name])->withFragment('rsvp');
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rsvp = Rsvp::find($id);

        if (!$rsvp) {
            return response()->json(['message' => 'RSVP not found'], 404);
        }

        return response()->json($rsvp, 200);
    }
    public function incrementSendingTrack($id)
    {
        // Cari RSVP berdasarkan ID
        $rsvp = RSVP::findOrFail($id);

        // Tambahkan nilai sending_track
        $rsvp->sending_track = $rsvp->sending_track + 1;
        $rsvp->save();

        return redirect()->back();
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
        return redirect()->route('event.show', ['id' => $rsvp->event_id])->with('success', 'Data berhasil dihapus.');
    }
}
