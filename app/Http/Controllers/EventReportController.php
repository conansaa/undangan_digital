<?php

namespace App\Http\Controllers;

use App\Models\EventReports;
use App\Models\EventReportDetails;
use Illuminate\Http\Request;

class EventReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data event report
        $eventReports = EventReports::all();
        return view('admin.eventreport.eventreport', compact('eventReports'));
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
        ]);

        // Menyimpan data event report baru
        $eventReport = EventReports::create($request->all());

        // Jika ada detail laporan acara (event_report_details)
        if ($request->has('event_report_details')) {
            foreach ($request->event_report_details as $detail) {
                // Validate input untuk detail laporan acara
                $request->validate([
                    'event_id' => 'required|integer|exists:event_details,id',
                ]);

                // Menyimpan detail laporan acara
                EventReportDetails::create([
                    'event_id' => $detail['event_id'],
                    'event_report_id' => $eventReport->id,
                ]);
            }
        }

        return response()->json($eventReport->load('details'), 201); // Load relationship untuk menampilkan details juga
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
        if ($request->has('event_report_details')) {
            foreach ($request->event_report_details as $detail) {
                // Validate input untuk detail laporan acara
                $request->validate([
                    'event_id' => 'required|integer|exists:event_details,id',
                ]);

                // Update atau buat ulang event report detail
                EventReportDetails::updateOrCreate(
                    ['event_id' => $detail['event_id'], 'event_report_id' => $eventReport->id],
                    ['event_id' => $detail['event_id']]
                );
            }
        }

        return response()->json($eventReport->load('details'), 200); // Load details after update
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
        EventReportDetails::where('event_report_id', $eventReport->id)->delete();

        // Hapus data event report
        $eventReport->delete();
        return response()->json(['message' => 'Event report deleted successfully'], 200);
    }
}
