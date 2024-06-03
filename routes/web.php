<?php

use App\Http\Controllers\BienController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BienController::class, 'accueil'])->name('accueil');
Route::get('/biens/{id}', [BienController::class, 'detail'])->name('detail')->where('id', '[0-9]');

Route::get('biens/ajouter', [BienController::class, 'ajout'])->name('ajout');
Route::post('biens/sauvegarder', [BienController::class, 'sauvegarde'])->name('sauvegarde');