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
        return view('admin.index', compact('eventReportCount', 'eventTypeCount')); 
    }

    public function showEventOwners()
    {
        $eventOwner = EventOwnerDetails::all();
        return view('admin.eventowner.eventowner', compact('eventOwner')); 
    }

    public function showEvents()
    {
        $eventDetail = EventDetails::all();
        return view('admin.eventdetail.eventdetail', compact('eventDetail')); 
    }

    public function showEventReportDetails()
    {
        $eventReportDetails = EventReportDetails::all();
        return view('admin.eventreportdetail.eventreportdetail', compact('eventReportDetails'));
    }

    public function showGenders()
    {
        // Ambil data dari tabel gender_ref
        $genders = GenderRef::all();
        // Kirimkan data ke view
        return view('admin.genderref.genderlist', compact('genders'));
    }

    public function showTimelines()
    {
        $timelines = Timelines::all();
        return view('admin.timeline.timeline', compact('timelines')); 
    }

    public function showRsvps()
    {
        $rsvps = Rsvp::all();
        return view('admin.rsvp.rsvp', compact('rsvps')); 
    }

    public function showComments()
    {
        $comments = Comments::all();
        return view('admin.comment.comment', compact('comments')); 
    }

    public function showGifts()
    {
        $gifts = Gifts::all();
        return view('admin.gift.gift', compact('gifts')); 
    }

    public function showSections()
    {
        $sections = SectionRef::all();
        return view('admin.section.section', compact('sections')); 
    }

    public function showGalleries()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.gallery', compact('galleries')); 
    }
}
