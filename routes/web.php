<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleSheetsController;

Route::get('/', [CommentController::class, 'index']);

Route::resource('comments', CommentController::class);
