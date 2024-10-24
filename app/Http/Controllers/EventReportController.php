<?php

namespace App\Http\Controllers;

use App\Models\EventReports;
use App\Models\EventReportDetails;
use App\Models\EventTypeRef;
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
