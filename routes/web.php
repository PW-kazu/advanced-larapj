<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('fill', [BookController::class,'fillBook']);
Route::get('create', [BookController::class,'createBook']);
Route::get('insert', [BookController::class,'insertBook']);
?>