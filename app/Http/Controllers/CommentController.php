<?php
namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Models\EventOwnerNew;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data komentar
        $comments = Comments::orderBy('created_at', 'desc')->get();
        return view('rsvp', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $name)
{
    // Find the RSVP entry by name
    $rsvp = Rsvp::where('name', $name)->first();

    if (!$rsvp) {
        return response()->json(['error' => 'RSVP not found for this name.'], 404);
    }

    // Validate the comment
    $validator = Validator::make($request->all(), [
        'comment' => 'required|string|max:500',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Create the comment using the RSVP ID
    $comment = Comments::create([
        'rsvp_id' => $rsvp->id,
        'comment' => $request->comment,
    ]);

    return response()->json([
        'id' => $comment->id,
        'comment' => $comment->comment,
        'rsvp_name' => $rsvp->name
    ], 201);
}



    public function views()
    {
        $comments = Comments::all();
        return view('admin.comment.comment', compact('comments'));
    }
    public function viewcomment(Request $request)
    {
        $userId = Auth::id(); // ID user yang login
        // dd($userId);

        // Ambil event owner berdasarkan user yang login
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        // dd($eventOwner);

        if (!$eventOwner) {
            return redirect()->route('info')->withErrors('Event Owner tidak ditemukan.');
        }

        // Ambil ID event yang dimiliki oleh user
        // $eventDetailsIds = $eventOwner->event()->pluck('id');
        $eventDetails = $eventOwner->event()->orderBy('created_at', 'desc')->get(); // urutkan event dari yang terbaru
        $eventDetailsIds = $eventDetails->pluck('id');
        if ($eventDetailsIds->isEmpty()) {
            return redirect()->route('info')->withErrors('Tidak ada event yang ditemukan untuk Event Owner ini.');
        }
        // dd($eventDetailsIds);
        $selectedEventId = $request->get('event_id', $eventDetailsIds->first());

        $rsvpIds = Rsvp::where('event_id', $selectedEventId)->pluck('id');
        // dd($rsvpIds);
        
        $sort = $request->get('sort', 'created_at'); 
        $order = $request->get('order', 'asc'); 

        // $comments = Comments::whereHas('rsvp', function ($query) use ($eventDetailsIds) {
        //     $query->where('event_id', $eventDetailsIds);
        // })->with('rsvp')->get(); 
        $comments = Comments::whereHas('rsvp', function ($query) use ($selectedEventId) {
            $query->where('event_id', $selectedEventId);
        })
        ->with('rsvp')
        ->orderBy($sort, $order)
        ->get();

        return view('client.commentclient', compact('comments', 'eventDetails', 'selectedEventId'));
    }




    public function create()
    {
        $rsvps = Rsvp::all(); 
        return view('admin.comment.create', compact('rsvps')); // Sesuaikan dengan nama view kamu
    }

    public function storedata(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'rsvp_id' => 'required|integer|exists:rsvp,id', // Validasi rsvp_id harus ada di tabel rsvp
            'comment' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menyimpan data komentar baru
        Comments::create($request->all());

        return redirect('/comments')->with('success', 'Komentar berhasil dikirim!');
    }

    public function edit($id)
    {
        $comment = Comments::findOrFail($id);
        $rsvps = Rsvp::all();
        return view('admin.comment.edit', compact('comment','rsvps'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan komentar berdasarkan ID
        $comment = Comments::find($id);

        // Jika data tidak ditemukan, kembalikan 404
        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json($comment, 200);
    }

    public function update(Request $request, $id)
    {
        // Menemukan komentar berdasarkan ID
        $comment = Comments::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        // Validasi input
        $validator = Validator::make($request->all(), [
            'rsvp_id' => 'sometimes|required|integer|exists:rsvp,id',
            'comment' => 'sometimes|required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Update data komentar
        $comment->update($request->all());
        return redirect('/comments')->with('success', 'Komentar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan komentar berdasarkan ID
        $comment = Comments::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        // Hapus data komentar
        $comment->delete();
        return redirect()->route('event.show', ['id' => $comment->event_id])->with('success', 'Data berhasil dihapus.');
    }
    public function destroycomment($id)
    {
        // Find the comment by ID
        $comment = Comments::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        // Delete the comment
        $comment->delete();
        
        // Redirect back with success message
        return redirect()->route('commentclient.viewcomment')->with('success', 'Data Berhasil Dihapus!!');
    }
    public function hapus($id, $name)
    {
        // Cari komentar berdasarkan ID
        $comment = Comments::find($id);

        if (!$comment) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        if ($comment->rsvp->name !== $name) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Hapus komentar
        $comment->delete();

        // Redirect ke halaman RSVP dengan pesan sukses
        return redirect()->route('rsvp.index', ['name' => $name,'#comment']) 
                        ->with('success', 'Data berhasil diperbarui!');
    }




}
