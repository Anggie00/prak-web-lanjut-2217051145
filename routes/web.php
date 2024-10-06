<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'profile']); 
Route::get('/profile/{nama}/{kelas}/{npm}',[ProfileController::class, 'profile']); 