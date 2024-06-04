<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Auth\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [BienController::class, 'accueil'])->name('accueil');
Route::get('/biens', [BienController::class, 'biens'])->name('biens');
Route::get('/biens/{id}', [BienController::class, 'detail'])->name('detail')->where('id', '[0-9]');

Route::get('biens/ajouter', [BienController::class, 'ajout'])->name('ajout');
Route::post('biens/sauvegarder', [BienController::class, 'sauvegarde'])->name('sauvegarde');


Route::get('biens/modifier/{id}', [BienController::class, 'modifier'])->name('modification')->where('id', '[0-9]');
Route::post('/biens/{id}/traiter', [BienController::class, 'traiter'])->name('biens.traiter');

Route::get('biens/supprimer/{id}', [BienController::class, 'supprimer'])->name('suppression')->where('id', '[0-9]');

Route::post('biens/{bien_id}/commentaires', [CommentaireController::class, 'insertion'])->name('insertion');


Route::get("/inscrire", [RegisterController::class, 'creer'])->name('inscrire');
Route::post("/inscrire", [RegisterController::class, 'enregistrer'])->name('enregistrement');

Route::get('/login', [LoginController::class, 'connecter'])->name('login');
Route::post('/login', [LoginController::class, 'inserer'])->name('inserer');

Route::post('/logout', [LogoutController::class, 'deconnecter'])->name('logout');