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

// Route pour la page d'accueil
Route::get('/', [BienController::class, 'accueil'])->name('accueil');

// Route pour afficher la liste des biens
Route::get('/biens', [BienController::class, 'biens'])->name('biens');

// Route pour afficher les détails d'un bien spécifique, avec une contrainte sur l'id (doit être un chiffre)
Route::get('/biens/{id}', [BienController::class, 'detail'])->name('detail')->where('id', '[0-9]+');

// Route pour afficher le formulaire d'ajout d'un bien
Route::get('biens/ajouter', [BienController::class, 'ajout'])->name('ajout')->middleware('auth');

// Route pour sauvegarder un nouveau bien
Route::post('biens/sauvegarder', [BienController::class, 'sauvegarde'])->name('sauvegarde')->middleware('auth');

// Route pour afficher le formulaire de modification d'un bien spécifique, avec une contrainte sur l'id (doit être un chiffre)
Route::get('biens/modifier/{id}', [BienController::class, 'modifier'])->name('modification')->where('id', '[0-9]+')->middleware('auth');

// Route pour traiter la modification d'un bien spécifique
Route::post('/biens/{id}/traiter', [BienController::class, 'traiter'])->name('biens.traiter')->middleware('auth');

// Route pour supprimer un bien spécifique, avec une contrainte sur l'id (doit être un chiffre)
Route::get('biens/supprimer/{id}', [BienController::class, 'supprimer'])->name('suppression')->where('id', '[0-9]+')->middleware('auth');

// Route pour insérer un commentaire sur un bien spécifique
Route::post('biens/{bien_id}/commentaires', [CommentaireController::class, 'insertion'])->name('insertion');

// Routes pour l'inscription des utilisateurs
Route::get("/inscrire", [RegisterController::class, 'creer'])->name('inscrire');
Route::post("/inscrire", [RegisterController::class, 'enregistrer'])->name('enregistrement');

// Routes pour la connexion des utilisateurs
Route::get('/login', [LoginController::class, 'connecter'])->name('login');
Route::post('/login', [LoginController::class, 'inserer'])->name('inserer');

// Route pour la déconnexion des utilisateurs
Route::post('/logout', [LogoutController::class, 'deconnecter'])->name('logout');
