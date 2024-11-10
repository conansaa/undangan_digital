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
    public function index($name)
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
            'comments',
            'name'
        ));

    }

    public function views()
    {
        $rsvps = Rsvp::all();
        return view('admin.rsvp.rsvp', compact('rsvps'));
    }
    public function viewclient()
    {
        $rsvps = Rsvp::all();
        return view('client.rsvpclient', compact('rsvps'));
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

    public function createtamu()
    {
        $eventDetails = EventDetails::first(); 
        return view('client.createtamu', compact('eventDetails')); 
    }
    public function storetamu(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15', 
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
        'phone_number' => '',
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
        $phoneNumber = $existingRsvp->phone_number;

        session([
            'new_data' => $request->all(),
            'existing_rsvp' => $existingRsvp,
            'name_exists' => true,
            'phone_number' => $existingRsvp->phone_number,
            'message' => 'Nama sudah terdaftar. Apakah Anda ingin memperbarui data lama?',
        ]);

        return redirect()->route('rsvp.index', ['name' => $name]);
    }

    $newRsvp = Rsvp::create($request->all());
    $existingRsvp->saveLog('Created RSVP');
    session()->forget(['new_data', 'existing_rsvp', 'name_exists', 'phone_number', 'message']);
    session(['rsvp_id' => $newRsvp->id, 'success' => true]);

    return redirect()->route('rsvp.index', ['name' => $name]);
}



public function confirmUpdate(Request $request, $name)
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

        // Update the existing RSVP data
        $existingRsvp->update($updatedData);

        // Log the action in log_rsvp
        $existingRsvp->saveLog('Updated RSVP');

        session()->forget(['new_data', 'existing_rsvp', 'name_exists', 'message']);
        return redirect()->route('rsvp.index', ['name' => $name, '#rsvp'])->with('success', 'Data berhasil diperbarui!');
    }

    return redirect()->route('rsvp.index', ['name' => $name])->with('error', 'Terjadi kesalahan dalam memperbarui data.');
}


    public function cancelUpdate($name)
    {
        session()->forget(['new_data', 'existing_rsvp', 'name_exists', 'message']);
        return redirect()->route('rsvp.index', ['name' => $name], ['#rsvp']);
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
