<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;


Route::get('/popular', [MovieController::class, 'index']);
Route::get('/movie/{id}', [MovieController::class, 'show'])->name('movie.detail');