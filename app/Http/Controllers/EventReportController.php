<?php

namespace App\Http\Controllers;

use App\Models\EventDetails;
use App\Models\EventReports;
use App\Models\EventTypeRef;
use Illuminate\Http\Request;
use App\Models\EventReportDetails;

class EventReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data event report
        $eventReports = EventReports::with('eventDetails')->get();
        // dd($eventReports);
        $eventDetails = EventDetails::with('eventReports')->get();
        return view('admin.eventreport.eventreport', compact('eventReports', 'eventDetails'));
    }

    public function create()
    {
        $eventTypes = EventTypeRef::all(); // Ambil data gender dari tabel referensi
        return view('admin.eventreport.create', compact('eventTypes')); // Sesuaikan dengan nama view kamu
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input untuk event report
        $request->validate([
            'event_type_id' => 'required|integer|exists:event_type_ref,id',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|digits:4',
            'counter' => 'required|integer',
            'progress_total' => 'required|integer',
            'finish_total' => 'required|integer',
        ]);

        // Menyimpan data event report baru
        $eventReport = EventReports::create($request->all());

        // Jika ada detail laporan acara (event_report_details)
        // if ($request->has('event_report_details')) {
        //     foreach ($request->event_report_details as $detail) {
        //         // Validate input untuk detail laporan acara
        //         $request->validate([
        //             'event_id' => 'required|integer|exists:event_details,id',
        //         ]);

        //         // Menyimpan detail laporan acara
        //         EventReportDetails::create([
        //             'event_id' => $detail['event_id'],
        //             'event_report_id' => $eventReport->id,
        //         ]);
        //     }
        // }

        return redirect('/event-reports')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Menemukan event report berdasarkan ID
        $eventReport = EventReports::with('details')->find($id);

        if (!$eventReport) {
            return response()->json(['message' => 'Event report not found'], 404);
        }

        return response()->json($eventReport, 200);
    }

    public function markAsFinished($id)
    {
        // Cari event berdasarkan ID
        $event = EventDetails::findOrFail($id);

        // Temukan laporan event yang sesuai
        $eventReport = EventReports::where('event_id', $event->id)->first();

        if ($eventReport) {
            // Pastikan progres tidak kurang dari nol
            if ($eventReport->progress_total > 0) {
                $eventReport->progress_total -= 1;
            }

            // Tambahkan ke kolom selesai
            $eventReport->finish_total += 1;

            // Simpan perubahan
            $eventReport->save();

            return response()->json(['success' => true, 'message' => 'Event marked as finished.']);
        }

        return response()->json(['success' => false, 'message' => 'Event report not found.']);
    }

    public function finishEvent($eventId)
    {
        try {
            // Debugging: Log the event ID to see if it's correct
            \Log::info('Finish event request received for event ID: ' . $eventId);

            $eventReport = EventReports::findOrFail($eventId);
            $eventReport->update(['status' => 'finished']);

            return response()->json([
                'success' => true,
                'message' => 'Event has been marked as finished!'
            ]);
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Error finishing event: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error marking event as finished: ' . $e->getMessage()
            ], 500);
        }
    }


    public function edit($id)
    {
        $eventReport = EventReports::findOrFail($id);
        $eventTypes = EventTypeRef::all(); // Assuming you have a gender reference table
        return view('admin.eventreport.edit', compact('eventReport', 'eventTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Menemukan event report berdasarkan ID
        $eventReport = EventReports::find($id);

        if (!$eventReport) {
            return response()->json(['message' => 'Event report not found'], 404);
        }

        // Validate input untuk event report
        $request->validate([
            'event_type_id' => 'sometimes|required|integer|exists:event_type_ref,id',
            'month' => 'sometimes|required|integer|min:1|max:12',
            'year' => 'sometimes|required|integer|digits:4',
            'counter' => 'sometimes|required|integer',
        ]);

        // Update data event report
        $eventReport->update($request->all());

        // Jika ada detail laporan acara (event_report_details)
        // if ($request->has('event_report_details')) {
        //     foreach ($request->event_report_details as $detail) {
        //         // Validate input untuk detail laporan acara
        //         $request->validate([
        //             'event_id' => 'required|integer|exists:event_details,id',
        //         ]);

        //         // Update atau buat ulang event report detail
        //         EventReportDetails::updateOrCreate(
        //             ['event_id' => $detail['event_id'], 'event_report_id' => $eventReport->id],
        //             ['event_id' => $detail['event_id']]
        //         );
        //     }
        // }

        return redirect('/event-reports')->with('success', 'Data pemilik acara berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menemukan event report berdasarkan ID
        $eventReport = EventReports::find($id);

        if (!$eventReport) {
            return response()->json(['message' => 'Event report not found'], 404);
        }

        // Hapus detail laporan terkait
        // EventReportDetails::where('event_report_id', $eventReport->id)->delete();

        // Hapus data event report
        $eventReport->delete();
        return redirect('/event-reports')->with('success', 'Data Berhasil Dihapus!!');
    }
}
