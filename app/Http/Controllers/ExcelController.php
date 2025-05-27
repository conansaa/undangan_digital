<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Comments;
use App\Exports\GuestExport;
use App\Imports\GuestImport;
use App\Models\EventDetails;
use Illuminate\Http\Request;
use App\Models\EventOwnerNew;
use App\Exports\CommentExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GuestAndCommentExport;

class ExcelController extends Controller
{
    // Export data tamu ke Excel
    public function export(Request $request, $format)
    {
        $userId = Auth::id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        if (!$eventOwner) {
            return redirect()->back()->with('error', 'Pemilik acara tidak ditemukan!');
        }

        // $eventDetailsIds = $eventOwner->event()->pluck('id');
        // $data = Rsvp::whereIn('event_id', $eventDetailsIds)->get(); // Hanya data milik user yang login
        $eventDetails = EventDetails::whereIn('id', $eventOwner->event()->pluck('id'))->first(); // Ambil event pertama
        $data = Rsvp::whereIn('event_id', $eventOwner->event()->pluck('id'))->get();
        
        // Ambil nama pemilik acara dan buat nama file
        $ownerName = str_replace(' ', '_', $eventOwner->user->name); // Ganti spasi dengan underscore
        $timestamp = now()->setTimezone('Asia/Jakarta')->format('Y-m-d_H-i-s');
        $fileName = "Daftar_Tamu_{$ownerName}_{$timestamp}";

        if ($format === 'excel') {
            return Excel::download(new GuestExport($data), "{$fileName}.xlsx");
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('exports.guest_pdf', [
                'eventDetails' => $eventDetails, 
                'data' => $data
            ]);
            return $pdf->download("{$fileName}.pdf");
        }

        return redirect()->back()->with('error', 'Format tidak didukung!');
    }

    // Import data tamu dari Excel
    public function import(Request $request)
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        $eventDetailsIds = $eventOwner->event()->first()?->id;
        Excel::import(new GuestImport($eventDetailsIds), $request->file('file'));

        return redirect()->route('rsvpclient')->with('success', 'Data RSVP berhasil diimport.');
    }

    public function exportComments(Request $request, $format)
    {
        $userId = Auth::id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        $eventDetails = EventDetails::whereIn('id', $eventOwner->event()->pluck('id'))->first();
        $comments = Comments::whereHas('rsvp', function ($query) use ($eventDetailsIds) {
            $query->where('event_id', $eventDetailsIds);
        })->with('rsvp')->get(); 

        $ownerName = str_replace(' ', '_', $eventOwner->user->name); // Ganti spasi dengan underscore
        $timestamp = now()->setTimezone('Asia/Jakarta')->format('Y-m-d_H-i-s');
        $fileName = "Daftar_Ucapan_{$ownerName}_{$timestamp}";

        if ($format === 'excel') {
            return Excel::download(new CommentExport($comments), "{$fileName}.xlsx");
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('exports.comment_pdf', [
                'data' => $comments,
                'eventDetails' => $eventDetails
            ]);
            return $pdf->download("{$fileName}.pdf");
        }

        return redirect()->back()->with('error', 'Format tidak didukung!');
    }

    public function exportTamuUcapan($format)
    {
        $userId = Auth::id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        
        if (!$eventOwner) {
            return redirect()->back()->with('error', 'Pemilik acara tidak ditemukan!');
        }

        // Ambil data tamu (RSVP)
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        $eventDetails = EventDetails::whereIn('id', $eventOwner->event()->pluck('id'))->first();
        // $rsvpData = Rsvp::whereIn('event_id', $eventDetailsIds)->get();
        $rsvpData = Rsvp::whereIn('event_id', $eventDetailsIds)
        ->with('comments') // Tetap ambil komentar dalam relasi jika masih digunakan di tampilan PDF
        ->get();
        
        // Ambil data ucapan
        $commentData = Comments::whereHas('rsvp', function ($query) use ($eventDetailsIds) {
            $query->where('event_id', $eventDetailsIds);
        })->with('rsvp')->get();

        // Nama file export
        $ownerName = str_replace(' ', '_', $eventOwner->user->name);
        $timestamp = now()->setTimezone('Asia/Jakarta')->format('Y-m-d_H-i-s');
        $fileName = "Daftar_Tamu_Ucapan_{$ownerName}_{$timestamp}";

        if ($format === 'excel') {
            return Excel::download(new GuestAndCommentExport($rsvpData, $commentData), "{$fileName}.xlsx");
        } elseif ($format === 'pdf') {
            $pdf = Pdf::loadView('exports.guest_and_comment_pdf', [
                'eventDetails' => $eventDetails,
                'rsvpData' => $rsvpData,
                'commentData' => $commentData
            ]);
            return $pdf->download("{$fileName}.pdf");
        }

        return redirect()->back()->with('error', 'Format tidak didukung!');
    }

    public function show() 
    {
        $userId = Auth::id();
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        $rsvpData = Rsvp::whereIn('event_id', $eventDetailsIds)->get();
        
        $eventDetails = EventDetails::whereIn('id', $eventOwner->event()->pluck('id'))->first(); // Ambil event pertama
        $data = Rsvp::whereIn('event_id', $eventOwner->event()->pluck('id'))->get();
        
        return view('exports.guest_pdf', compact('eventDetails', 'data'));
    }

}
