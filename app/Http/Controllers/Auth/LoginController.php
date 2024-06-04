<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Personnel;
use \App\Models\User;


class LoginController extends Controller
{
    public function connecter()
    {
        return view('auth.connexion');
    }

    public function inserer(Request $request)
    {
        // Valider les données du formulaire
        $credentials = $request->validate([
            'email' => 'required|email',
            'mot_de_passe' => 'required|string|min:8',
        ]);

        // Mapper le champ de mot de passe personnalisé
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('mot_de_passe')
        ];

        // Tentative d'authentification
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        // Rediriger avec une erreur si l'authentification échoue
        return back()->withErrors([
            'email' => 'Email invalide !',
        ])->onlyInput('email');
    }
}
