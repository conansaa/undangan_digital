<?php

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
Route::get('/event', [AdminController::class, 'showEvents']);
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::get('/event/delete/{id}', [EventController::class, 'destroy'])->name('event.delete');

// Route::get('/event-types', [AdminController::class, 'showEventTypes']);
Route::get('/event-type', [EventTypeController::class, 'index'])->name('eventtype.index');
Route::get('/event-type/create', [EventTypeController::class, 'create'])->name('eventtype.create');
Route::post('/event-type/create', [EventTypeController::class, 'store'])->name('eventtype.store');
Route::get('/event-types/edit/{id}', [EventTypeController::class, 'edit'])->name('eventtype.edit');
Route::put('/event-types/edit/{id}', [EventTypeController::class, 'update'])->name('eventtype.update');
Route::delete('/event-type/{id}', [EventTypeController::class, 'destroy'])->name('eventtype.destroy');


// Route::get('/event-reports', [AdminController::class, 'showEventReports']);
Route::get('/event-reports', [EventReportController::class, 'index'])->name('eventreport.index');
Route::get('/eventreport/create', [EventReportController::class, 'create'])->name('eventreport.create');
Route::post('/event-reports', [EventReportController::class, 'store'])->name('eventreport.store');
Route::get('/eventreport/edit/{id}', [EventReportController::class, 'edit'])->name('eventreport.edit');
Route::put('/eventreport/{id}', [EventReportController::class, 'update'])->name('eventreport.update');
Route::delete('/eventreport/{id}', [EventReportController::class, 'destroy'])->name('eventreport.destroy');

Route::get('/event-reports-detail', [AdminController::class, 'showEventReportDetails']);

Route::get('/timelines', [AdminController::class, 'showTimelines']);

Route::get('/rsvps', [AdminController::class, 'showRsvps']);

Route::get('/comments', [AdminController::class, 'showComments']);

Route::get('/gifts', [AdminController::class, 'showGifts']);

Route::get('/sections', [AdminController::class, 'showSections']);

Route::get('/galleries', [AdminController::class, 'showGalleries']);


