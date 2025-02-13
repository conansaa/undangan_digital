<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Exports\GuestExport;
use App\Imports\GuestImport;
use Illuminate\Http\Request;
use App\Models\EventOwnerNew;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    // Export data tamu ke Excel
    public function export()
    {
        $userId = auth()->id(); // Ambil ID user yang sedang login
        $eventOwner = EventOwnerNew::where('user_id', $userId)->first();
        $eventDetailsIds = $eventOwner->event()->pluck('id');
        $data = Rsvp::where('event_id', $eventDetailsIds)->get(); // Hanya data milik user yang login

        return Excel::download(new GuestExport($data), 'rsvp.xlsx');
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
}
