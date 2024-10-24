<?php

use App\Http\Controllers\EventReportDetailController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventOwnerController;
use App\Http\Controllers\EventReportController;

Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');

Route::get('/index', [AdminController::class, 'showDashboard']);
// Route::get('/admin/data', [AdminController::class, 'getAllData']);
Route::get('/genders', [AdminController::class, 'showGenders']);

Route::get('/owners', [EventOwnerController::class, 'index']);
Route::get('/owner/create', [EventOwnerController::class, 'create']);
Route::post('/owner/create', [EventOwnerController::class, 'store']);
Route::get('/owners/delete/{id}', [EventOwnerController::class, 'destroy']);
Route::get('/owners/edit/{id}', [EventOwnerController::class, 'edit']);
Route::put('/owners/edit/{id}', [EventOwnerController::class, 'update']);
// Route::post('/owners', [EventOwnerController::class, 'store']);

// Route::get('/event', [EventController::class, 'index'])->name('event.index');
Route::get('/event', [EventController::class, 'index']);
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::put('/event/edit/{id}', [EventController::class, 'update'])->name('event.update');
Route::get('/event/delete/{id}', [EventController::class, 'destroy'])->name('event.delete');

// Route::get('/event-types', [AdminController::class, 'showEventTypes']);
Route::get('/event-type', [EventTypeController::class, 'index'])->name('eventtype.index');
Route::get('/event-type/create', [EventTypeController::class, 'create'])->name('eventtype.create');
Route::post('/event-type/create', [EventTypeController::class, 'store'])->name('eventtype.store');
Route::get('/event-types/edit/{id}', [EventTypeController::class, 'edit'])->name('eventtype.edit');
Route::put('/event-types/edit/{id}', [EventTypeController::class, 'update'])->name('eventtype.update');
Route::get('/event-type/delete/{id}', [EventTypeController::class, 'destroy'])->name('eventtype.destroy');


// Route::get('/event-reports', [AdminController::class, 'showEventReports']);
Route::get('/event-reports', [EventReportController::class, 'index'])->name('eventreport.index');
Route::get('/eventreport/create', [EventReportController::class, 'create'])->name('eventreport.create');
Route::post('/eventreport/create', [EventReportController::class, 'store'])->name('eventreport.store');
Route::get('/eventreport/edit/{id}', [EventReportController::class, 'edit'])->name('eventreport.edit');
Route::put('/eventreport/edit/{id}', [EventReportController::class, 'update'])->name('eventreport.update');
Route::get('/eventreport/delete/{id}', [EventReportController::class, 'destroy'])->name('eventreport.destroy');

Route::get('/event-reports-detail', [EventReportDetailController::class, 'index']);

Route::get('/timelines', [TimelineController::class, 'index']);
Route::get('/timeline/create', [TimelineController::class, 'create'])->name('timeline.create');
Route::post('/timeline/create', [TimelineController::class, 'store']);
Route::get('/timeline/edit/{id}', [TimelineController::class, 'edit'])->name('timeline.edit');
Route::put('/timeline/edit/{id}', [TimelineController::class, 'update'])->name('timeline.update');
Route::get('/timeline/delete/{id}', [TimelineController::class, 'destroy'])->name('timeline.destroy');

Route::get('/rsvps', [AdminController::class, 'showRsvps']);

Route::get('/comments', [AdminController::class, 'showComments']);

Route::get('/gifts', [AdminController::class, 'showGifts']);

Route::get('/sections', [AdminController::class, 'showSections']);
Route::get('/section/create', [SectionController::class, 'create'])->name('section.create');
Route::post('/section/create', [SectionController::class, 'store'])->name('section.store');
Route::get('/section/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
Route::put('/section/edit/{id}', [SectionController::class, 'update'])->name('section.update');
Route::get('/section/delete/{id}', [SectionController::class, 'destroy'])->name('section.destroy');

Route::get('/galleries', [AdminController::class, 'showGalleries']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
