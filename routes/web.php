<?php

use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\RSVPController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventOwnerController;
use App\Http\Controllers\EventReportController;
use App\Http\Controllers\EventReportDetailController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
Route::get('/rsvp/{id}', [RsvpController::class, 'show'])->name('rsvp.show');
Route::post('/rsvp/confirm-update', [RsvpController::class, 'confirmUpdate'])->name('rsvp.confirmUpdate');
Route::post('/rsvp/cancel-update', [RsvpController::class, 'cancelUpdate'])->name('rsvp.cancelUpdate');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');

Route::get('/dashboard', [AdminController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/genders', [AdminController::class, 'showGenders']);

    // Routes untuk Event Owner
    Route::get('/themes', [ThemeController::class, 'index']);
    Route::get('/themes/create', [ThemeController::class, 'create']);
    Route::post('/themes/create', [ThemeController::class, 'store']);
    Route::get('/themes/delete/{id}', [ThemeController::class, 'destroy']);
    Route::get('/themes/edit/{id}', [ThemeController::class, 'edit']);
    Route::put('/themes/edit/{id}', [ThemeController::class, 'update']);

    // Routes untuk Event Owner
    Route::get('/owners', [EventOwnerController::class, 'index']);
    Route::get('/owner/create', [EventOwnerController::class, 'create']);
    Route::post('/owner/create', [EventOwnerController::class, 'store']);
    Route::get('/owners/delete/{id}', [EventOwnerController::class, 'destroy']);
    Route::get('/owners/edit/{id}', [EventOwnerController::class, 'edit']);
    Route::put('/owners/edit/{id}', [EventOwnerController::class, 'update']);

    // Routes untuk Event
    Route::get('/event', [EventController::class, 'index']);
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/edit/{id}', [EventController::class, 'update'])->name('event.update');
    Route::get('/event/delete/{id}', [EventController::class, 'destroy'])->name('event.delete');

    // Routes untuk Event Type
    Route::get('/event-type', [EventTypeController::class, 'index'])->name('eventtype.index');
    Route::get('/event-type/create', [EventTypeController::class, 'create'])->name('eventtype.create');
    Route::post('/event-type/create', [EventTypeController::class, 'store'])->name('eventtype.store');
    Route::get('/event-types/edit/{id}', [EventTypeController::class, 'edit'])->name('eventtype.edit');
    Route::put('/event-types/edit/{id}', [EventTypeController::class, 'update'])->name('eventtype.update');
    Route::get('/event-type/delete/{id}', [EventTypeController::class, 'destroy'])->name('eventtype.destroy');

    // Routes untuk Event Reports
    Route::get('/event-reports', [EventReportController::class, 'index'])->name('eventreport.index');
    Route::get('/eventreport/create', [EventReportController::class, 'create'])->name('eventreport.create');
    Route::post('/eventreport/create', [EventReportController::class, 'store'])->name('eventreport.store');
    Route::get('/eventreport/edit/{id}', [EventReportController::class, 'edit'])->name('eventreport.edit');
    Route::put('/eventreport/edit/{id}', [EventReportController::class, 'update'])->name('eventreport.update');
    Route::get('/eventreport/delete/{id}', [EventReportController::class, 'destroy'])->name('eventreport.destroy');

    Route::get('/event-reports-detail', [EventReportDetailController::class, 'index']);

    // Routes untuk Timeline
    Route::get('/timelines', [TimelineController::class, 'index']);
    Route::get('/timeline/create', [TimelineController::class, 'create'])->name('timeline.create');
    Route::post('/timeline/create', [TimelineController::class, 'store']);
    Route::get('/timeline/edit/{id}', [TimelineController::class, 'edit'])->name('timeline.edit');
    Route::put('/timeline/edit/{id}', [TimelineController::class, 'update'])->name('timeline.update');
    Route::get('/timeline/delete/{id}', [TimelineController::class, 'destroy'])->name('timeline.destroy');

    // Routes untuk RSVP
    Route::get('/rsvps', [RsvpController::class, 'views']);
    Route::get('/rsvps/create', [RsvpController::class, 'create'])->name('rsvps.create');
    Route::post('/rsvps/create', [RsvpController::class, 'storedata'])->name('rsvps.storedata');
    Route::get('/rsvps/edit/{id}', [RsvpController::class, 'edit'])->name('rsvps.edit');
    Route::put('/rsvps/edit/{id}', [RsvpController::class, 'update'])->name('rsvps.update');
    Route::get('/rsvps/delete/{id}', [RsvpController::class, 'destroy'])->name('rsvps.destroy');

    // Routes untuk Comment
    Route::get('/comments', [CommentController::class, 'views']);
    // Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.create');
    // Route::post('/comment/create', [CommentController::class, 'storedata'])->name('comment.storedata');
    // Route::get('/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
    // Route::put('/comment/edit/{id}', [CommentController::class, 'update'])->name('comment.update');
    // Route::get('/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    // Routes untuk Gift
    Route::get('/gifts', [GiftController::class, 'index']);
    Route::get('/gift/create', [GiftController::class, 'create'])->name('gift.create');
    Route::post('/gift/create', [GiftController::class, 'store'])->name('gift.store');
    Route::get('/gift/edit/{id}', [GiftController::class, 'edit'])->name('gift.edit');
    Route::put('/gift/edit/{id}', [GiftController::class, 'update'])->name('gift.update');
    Route::get('/gift/delete/{id}', [GiftController::class, 'destroy'])->name('gift.destroy');

    // Routes untuk Section
    Route::get('/sections', [SectionController::class, 'index']);
    Route::get('/section/create', [SectionController::class, 'create'])->name('section.create');
    Route::post('/section/create', [SectionController::class, 'store'])->name('section.store');
    Route::get('/section/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
    Route::put('/section/edit/{id}', [SectionController::class, 'update'])->name('section.update');
    Route::get('/section/delete/{id}', [SectionController::class, 'destroy'])->name('section.destroy');

    // Routes untuk Gallery
    Route::get('/galleries', [GalleryController::class, 'index']);
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/create', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/edit/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Routes untuk User
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

require __DIR__.'/auth.php';
