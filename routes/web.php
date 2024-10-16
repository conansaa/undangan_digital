<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\GoogleSheetsController;

// Route::get('/cover', [WeddingController::class, 'showCover']);

Route::get('/invitation', [InvitationController::class, 'cover']);
Route::get('/invitation/detail', [InvitationController::class, 'detail'])->name('invitation.detail');
Route::post('/invitation/detail', [InvitationController::class, 'storeComment']);