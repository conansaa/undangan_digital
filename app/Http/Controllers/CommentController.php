<?php
namespace App\Http\Controllers;

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
        $comments = Comments::all();
        return response()->json($comments, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'rsvp_id' => 'required|integer|exists:rsvp,id', // Validasi rsvp_id harus ada di tabel rsvp
            'comment' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Menyimpan data komentar baru
        $comment = Comments::create($request->all());
        return response()->json($comment, 201);
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

    /**
     * Update the specified resource in storage.
     */
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
        return response()->json($comment, 200);
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
        return response()->json(['message' => 'Comment deleted successfully'], 200);
    }
}
