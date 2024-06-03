<?php

use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BienController::class, 'accueil'])->name('accueil');