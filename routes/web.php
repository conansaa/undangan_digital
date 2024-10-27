<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CommentController1;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventOwnerController;
use App\Http\Controllers\EventReportController;
use App\Http\Controllers\EventReportDetailController;

Route::get('/rsvp', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/rsvp', [RsvpController::class, 'store'])->name('rsvp.store');
Route::get('/rsvp/{id}', [RsvpController::class, 'show'])->name('rsvp.show');
Route::post('/rsvp/confirm-update', [RsvpController::class, 'confirmUpdate'])->name('rsvp.confirmUpdate');
Route::post('/rsvp/cancel-update', [RsvpController::class, 'cancelUpdate'])->name('rsvp.cancelUpdate');

Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');

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
Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.create');
Route::post('/comment/create', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
Route::put('/comment/edit/{id}', [CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::get('/gifts', [GiftController::class, 'index']);
Route::get('/gift/create', [GiftController::class, 'create'])->name('gift.create');
Route::post('/gift/create', [GiftController::class, 'store'])->name('gift.store');
Route::get('/gift/edit/{id}', [GiftController::class, 'edit'])->name('gift.edit');
Route::put('/gift/edit/{id}', [GiftController::class, 'update'])->name('gift.update');
Route::get('/gift/delete/{id}', [GiftController::class, 'destroy'])->name('gift.destroy');

Route::get('/sections', [AdminController::class, 'showSections']);
Route::get('/section/create', [SectionController::class, 'create'])->name('section.create');
Route::post('/section/create', [SectionController::class, 'store'])->name('section.store');
Route::get('/section/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
Route::put('/section/edit/{id}', [SectionController::class, 'update'])->name('section.update');
Route::get('/section/delete/{id}', [SectionController::class, 'destroy'])->name('section.destroy');

Route::get('/galleries', [GalleryController::class, 'index']);
Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
Route::post('/gallery/create', [GalleryController::class, 'store'])->name('gallery.store');
Route::get('/gallery/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
Route::put('/gallery/edit/{id}', [GalleryController::class, 'update'])->name('gallery.update');
Route::get('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

Route::get('/users', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
