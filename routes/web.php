<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\AdminController;

Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');

Route::get('/index', [AdminController::class, 'showDashboard']);
// Route::get('/admin/data', [AdminController::class, 'getAllData']);
Route::get('/genders', [AdminController::class, 'showGenders']);
Route::get('/owners', [AdminController::class, 'showEventOwners']);
Route::get('/event-types', [AdminController::class, 'showEventTypes']);
Route::get('/events', [AdminController::class, 'showEvents']);
Route::get('/event-reports', [AdminController::class, 'showEventReports']);
Route::get('/timelines', [AdminController::class, 'showTimelines']);
Route::get('/rsvps', [AdminController::class, 'showRsvps']);
Route::get('/comments', [AdminController::class, 'showComments']);
Route::get('/gifts', [AdminController::class, 'showGifts']);
Route::get('/galleries', [AdminController::class, 'showGalleries']);


