<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{
    public function creer()
    {
        return view('auth.inscription');
    }

    public function enregistrer(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:personnels',
            'mot_de_passe' => 'required|string|min:8',
        ]);

        // Créer un nouvel enregistrement
        Personnel::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
        ]);

        // Rediriger avec un message de succès
        return redirect(route('login'))->with('success', 'Inscription réussie');
    }



}