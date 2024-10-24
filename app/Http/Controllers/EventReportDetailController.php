<?php

namespace App\Http\Controllers;

use App\Models\EventDetails;
use App\Models\EventReports;
use Illuminate\Http\Request;
use App\Models\EventReportDetails;

class EventReportDetailController extends Controller
{
    public function index()
    {
        // $reportdetails = EventReportDetails::all();
        // $eventDetails = EventDetails::all();
        $reportDetails = EventReportDetails::with(['eventDetails', 'eventReports'])->get();

        return view('admin.eventreportdetail.eventreportdetail', compact('reportDetails'));
    }
}
