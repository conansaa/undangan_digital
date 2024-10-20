<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\User;
use App\Models\Gifts;
use App\Models\Gallery;
use App\Models\Comments;
use App\Models\GenderRef;
use App\Models\Timelines;
use App\Models\SectionRef;
use App\Models\EventDetails;
use App\Models\EventReports;
use App\Models\EventTypeRef;
use Illuminate\Http\Request;
use App\Models\EventOwnerDetails;
use App\Models\EventReportDetails;

class AdminController extends Controller
{
    public function getAllData()
    {
        // Mengambil semua data dari setiap tabel yang sudah ada
        $genders = GenderRef::all();
        $eventOwners = EventOwnerDetails::all();
        $eventTypes = EventTypeRef::all();
        $eventDetails = EventDetails::all();
        $eventReports = EventReports::all();
        $eventReportDetails = EventReportDetails::all();
        $timelines = Timelines::all();
        $rsvps = Rsvp::all();
        $comments = Comments::all();
        $gifts = Gifts::all();
        $galleries = Gallery::all();
        $sections = SectionRef::all();
        $users = User::all();

        // Kirim data ke view 'admin.index'
        return view('admin.index', compact(
        'genders', 'eventOwners', 'eventTypes', 'eventDetails', 'eventReports', 
        'eventReportDetails', 'timelines', 'rsvps', 'comments', 'gifts', 
        'galleries', 'sections', 'users'
        ));
    }

    public function showDashboard()
    {
        $eventReportCount = EventReports::select('counter')->get();
        $eventTypeCount = EventTypeRef::count();
        // Di sini kamu bisa mengambil data yang diperlukan untuk dashboard
        return view('admin.index', compact('eventReportCount', 'eventTypeCount')); // Pastikan untuk membuat file ini di views/admin/
    }

    public function showEventOwners()
    {
        $eventOwner = EventOwnerDetails::all();
        // Di sini kamu bisa mengambil data yang diperlukan untuk dashboard
        return view('admin.eventowner.eventowner', compact('eventOwner')); // Pastikan untuk membuat file ini di views/admin/
    }

    public function showEventReportDetails()
    {
    // Ambil data dari tabel event_report_details
    $eventReportDetails = EventReportDetails::all();

    // Kirimkan data ke view
    return view('admin.index', compact('eventReportDetails'));
    }

    public function showGenders()
    {
        // Ambil data dari tabel gender_ref
        $genders = GenderRef::all();
        // Kirimkan data ke view
        return view('admin.genderref.genderlist', compact('genders'));
    }
}
