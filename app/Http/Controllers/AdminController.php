<?php

namespace App\Http\Controllers;

use App\Models\GenderRef;
use App\Models\EventReports;
use App\Models\EventTypeRef;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $eventReportCount = EventReports::select('counter')->get();
        $eventTypeCount = EventTypeRef::count();
        return view('admin.dashboard', compact('eventReportCount', 'eventTypeCount')); 
    }

    public function showGenders()
    {
        $genders = GenderRef::all();
        return view('admin.genderref.genderlist', compact('genders'));
    }
}
