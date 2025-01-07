<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\RSVPController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\EventCardController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\EventOwnerController;
use App\Http\Controllers\MediaAssetController;
use App\Http\Controllers\EventReportController;
use App\Http\Controllers\ThemeCategoryController;
use App\Http\Controllers\EventReportDetailController;

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
//cover
Route::get('/invitation/{name}', [RsvpController::class, 'invitation'])->name('rsvp.invitation');

//Shinta
Route::get('/shinta-irfan/to/{name}', [RsvpController::class, 'index'])->name('rsvp.index');
Route::post('/shinta-irfan/store/{name}', [RsvpController::class, 'store'])->name('rsvp.store');
Route::get('/shinta-irfan/{id}', [RsvpController::class, 'show'])->name('rsvp.show');
Route::post('/shinta-irfan/confirm-update/{name}', [RsvpController::class, 'confirmUpdate'])->name('rsvp.confirmUpdate');
Route::post('/shinta-irfan/cancel-update/{name}', [RsvpController::class, 'cancelUpdate'])->name('rsvp.cancelUpdate');
Route::post('/clear-modal-session', function () {
    session()->forget('show_modal');
    return response()->json(['success' => true]);
});

//Carol
Route::get('/caroline-hezron/to/{name}', [RsvpController::class, 'caroline'])->name('caroline.index');


Route::post('/comment/{name}', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
Route::get('/comment/delete/{id}/{name}', [CommentController::class, 'hapus'])->name('comment.hapus');


//client
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/client', [ClientController::class, 'showDashboard'])
        ->name('client.dashboard');

    Route::get('/rsvpclient', [RsvpController::class, 'viewclient'])->name('rsvpclient');
    Route::get('/rsvpclient/createtamu', [RsvpController::class, 'createtamu'])->name('rsvpclient.createtamu');
    Route::post('/rsvpclient/createtamu', [RsvpController::class, 'storetamu'])->name('rsvpclient.storetamu');
    Route::get('/rsvpclient/increment-sending-track/{id}', [RSVPController::class, 'incrementSendingTrack'])->name('rsvp.incrementSendingTrack');
    Route::get('/rsvpclient/delete/{id}', [RsvpController::class, 'destroytamu'])->name('rsvpclient.destroytamu');

    Route::get('/commentclient', [CommentController::class, 'viewcomment'])->name('commentclient.viewcomment');
    Route::get('/commentclient/delete/{id}', [CommentController::class, 'destroycomment'])->name('commentclient.destroycomment');
});

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
    Route::get('/themes/create', [ThemeController::class, 'create'])->name('theme.create');
    Route::post('/themes/create', [ThemeController::class, 'store'])->name('theme.store');
    Route::get('/themes/delete/{id}', [ThemeController::class, 'destroy']);
    Route::get('/themes/edit/{id}', [ThemeController::class, 'edit']);
    Route::put('/themes/edit/{id}', [ThemeController::class, 'update']);

    Route::get('/categories', [ThemeCategoryController::class, 'index']);
    Route::post('/categories/create', [ThemeCategoryController::class, 'store'])->name('category.store');

    // Routes untuk Event Owner
    Route::get('/owners', [EventOwnerController::class, 'index']);
    Route::get('/owner/create', [EventOwnerController::class, 'create']);
    Route::post('/owner/create', [EventOwnerController::class, 'store'])->name('owner.store');
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
    Route::get('/details/{id}', [EventController::class, 'show'])->name('event.show');
    // Route::post('/details/{id}/timeline', [EventController::class, 'storeTimeline'])->name('event.storeTimeline');
    // Route::post('/details/{id}/rsvp', [EventController::class, 'storeRsvp'])->name('event.storeRsvp');
    // Route::post('/details/{id}/gift', [EventController::class, 'storeGift'])->name('event.storeGift');
    // Route::post('/details/{id}/gallery', [EventController::class, 'storeGallery'])->name('event.storeGallery');

    Route::post('/figure/store/{id}', [FigureController::class, 'storeModal'])->name('figure.storeModal');
    Route::get('/figure/edit/{id}', [FigureController::class, 'editModal'])->name('figure.edit');
    Route::put('/figure/update/{id}', [FigureController::class, 'update'])->name('figure.update');
    Route::get('/figure/delete/{id}', [FigureController::class, 'destroy'])->name('figure.destroy');

    Route::post('/card/store/{id}', [EventCardController::class, 'storeModal'])->name('card.storeModal');
    Route::get('/card/edit/{id}', [EventCardController::class, 'editModal'])->name('card.edit');
    Route::put('/card/update/{id}', [EventCardController::class, 'update'])->name('card.update');
    Route::get('/card/delete/{id}', [EventCardController::class, 'destroy'])->name('card.destroy');

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
    // Route yang diarahkan ke controller untuk menangani permintaan "Finish"
    Route::post('/event-reports/finish/{id}', [EventReportController::class, 'markAsFinished']);
    Route::post('/event-reports/finish/{eventId}', [EventReportController::class, 'finishEvent'])->withoutMiddleware('auth');



    Route::get('/event-reports-detail', [EventReportDetailController::class, 'index']);

    // Routes untuk Timeline
    Route::get('/timelines', [TimelineController::class, 'index'])->name('timelines.index');
    Route::get('/timeline/create', [TimelineController::class, 'create'])->name('timeline.create');
    Route::post('/timeline/store/{id}', [TimelineController::class, 'storeModal'])->name('timeline.storeModal');
    Route::get('/timeline/edit/{id}', [TimelineController::class, 'editModal'])->name('timeline.edit');
    Route::put('/timeline/update/{id}', [TimelineController::class, 'update'])->name('timeline.update');
    Route::get('/timeline/delete/{id}', [TimelineController::class, 'destroy'])->name('timeline.destroy');

    // Routes untuk Media Asset
    Route::post('/media/store/{id}', [MediaAssetController::class, 'storeModal'])->name('media.storeModal');
    Route::put('/media/update/{id}', [MediaAssetController::class, 'update'])->name('media.update');
    Route::get('/media/delete/{id}', [MediaAssetController::class, 'destroy'])->name('media.destroy');

    // Routes untuk RSVP
    Route::get('/rsvps', [RsvpController::class, 'views'])->name('rsvps.views');
    Route::get('/rsvps/create', [RsvpController::class, 'create'])->name('rsvps.create');
    Route::post('/rsvps/store/{id}', [RsvpController::class, 'storeModal'])->name('rsvps.storeRsvp');
    Route::get('/rsvps/create/{id}', [RsvpController::class, 'make'])->name('rsvps.make');
    Route::get('/rsvps/edit/{id}', [RsvpController::class, 'edit'])->name('rsvps.edit');
    Route::put('/rsvps/edit/{id}', [RsvpController::class, 'update'])->name('rsvps.update');
    Route::get('/rsvps/delete/{id}', [RsvpController::class, 'destroy'])->name('rsvps.destroy');

    // Routes untuk Comment
    Route::get('/comments', [CommentController::class, 'views']);
    // Route::get('/comment/create', [CommentController::class, 'create'])->name('comment.create');
    // Route::post('/comment/create', [CommentController::class, 'storedata'])->name('comment.storedata');
    // Route::get('/comment/edit/{id}', [CommentController::class, 'edit'])->name('comment.edit');
    // Route::put('/comment/edit/{id}', [CommentController::class, 'update'])->name('comment.update');
    Route::get('/comment/delete/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    // Routes untuk Gift
    Route::get('/gifts', [GiftController::class, 'index']);
    Route::get('/gift/create', [GiftController::class, 'create'])->name('gift.create');
    Route::post('/gift/store/{id}', [GiftController::class, 'storeModal'])->name('gift.storeGift');
    Route::get('/gift/edit/{id}', [GiftController::class, 'editModal'])->name('gift.edit');
    Route::put('/gift/update/{id}', [GiftController::class, 'update'])->name('gift.update');
    Route::get('/gift/delete/{id}', [GiftController::class, 'destroy'])->name('gift.destroy');

    // Routes untuk Section
    Route::get('/sections', [SectionController::class, 'index']);
    Route::get('/section/create', [SectionController::class, 'create'])->name('section.create');
    Route::post('/section/create', [SectionController::class, 'store'])->name('section.store');
    Route::get('/section/edit/{id}', [SectionController::class, 'edit'])->name('section.edit');
    Route::put('/section/edit/{id}', [SectionController::class, 'update'])->name('section.update');
    Route::get('/section/delete/{id}', [SectionController::class, 'destroy'])->name('section.destroy');

    // Routes untuk Gallery
    Route::get('/galleries', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store/{id}', [GalleryController::class, 'storeModal'])->name('gallery.storeGallery');
    Route::get('/gallery/edit/{id}', [GalleryController::class, 'editModal'])->name('gallery.edit');
    Route::put('/gallery/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::get('/gallery/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');

    // Routes untuk User
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

require __DIR__.'/auth.php';
