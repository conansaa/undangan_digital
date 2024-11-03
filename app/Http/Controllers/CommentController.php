<?php
namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rsvp_id' => 'required|integer|exists:rsvp,id',
            'comment' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $comment = Comments::create($request->all());

        return response()->json([
            'comment' => $comment->comment,
            'rsvp_name' => $comment->rsvp->name 
        ], 201);
    }

    public function views()
    {
        $comments = Comments::all();
        return view('admin.comment.comment', compact('comments'));
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
        return redirect('/comments')->with('success', 'Data Berhasil Dihapus!!');
    }
}
