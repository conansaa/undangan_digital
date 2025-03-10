<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use App\Exports\GuestExport;
use App\Imports\GuestImport;
use Illuminate\Http\Request;
use App\Models\EventOwnerNew;
use App\Exports\CommentExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    // Export data tamu ke Excel
    public function export(Request $request, $format)
    {
        $userId = auth()->id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        if (!$eventOwner) {
            return redirect()->back()->with('error', 'Pemilik acara tidak ditemukan!');
        }

        $eventDetailsIds = $eventOwner->event()->pluck('id');
        $data = Rsvp::whereIn('event_id', $eventDetailsIds)->get(); // Hanya data milik user yang login
        
        // Ambil nama pemilik acara dan buat nama file
        $ownerName = str_replace(' ', '_', $eventOwner->user->name); // Ganti spasi dengan underscore
        $timestamp = now()->setTimezone('Asia/Jakarta')->format('Y-m-d_H-i');
        $fileName = "Daftar_Tamu_{$ownerName}_{$timestamp}";

        if ($format === 'excel') {
            return Excel::download(new GuestExport($data), "{$fileName}.xlsx");
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('exports.guest_pdf', ['data' => $data]);
            return $pdf->download("{$fileName}.pdf");
        }

        return redirect()->back()->with('error', 'Format tidak didukung!');
    }

    // Import data tamu dari Excel
    public function import(Request $request)
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        $eventDetailsIds = $eventOwner->event()->first()?->id;
        Excel::import(new GuestImport($eventDetailsIds), $request->file('file'));

        return redirect()->route('rsvpclient')->with('success', 'Data RSVP berhasil diimport.');
    }

    public function exportComments(Request $request, $format)
    {
        $userId = auth()->id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        $comments = Comments::whereHas('rsvp', function ($query) use ($eventDetailsIds) {
            $query->where('event_id', $eventDetailsIds);
        })->with('rsvp')->get(); 

        $ownerName = str_replace(' ', '_', $eventOwner->user->name); // Ganti spasi dengan underscore
        $timestamp = now()->setTimezone('Asia/Jakarta')->format('Y-m-d_H-i');
        $fileName = "Daftar_Ucapan_{$ownerName}_{$timestamp}";

        if ($format === 'excel') {
            return Excel::download(new CommentExport($comments), "{$fileName}.xlsx");
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('exports.comment_pdf', ['data' => $comments]);
            return $pdf->download("{$fileName}.pdf");
        }

        return redirect()->back()->with('error', 'Format tidak didukung!');
    }
}
