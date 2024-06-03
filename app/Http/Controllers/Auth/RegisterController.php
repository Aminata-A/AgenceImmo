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
    // Validate user input
    $validatedData = $request->validate([
        'nom' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:personnels'],
        'mot_de_passe' => ['required', 'string', 'min:8'], // Add password confirmation
    ]);

    // Create new personnel record
    $personnel = Personnel::create($validatedData);

    // Authenticate the user (if desired)
    // auth()->login($personnel); // Uncomment this line if automatic login is needed

    // Redirect to appropriate location (e.g., success page)
    return redirect('/')->with('success', 'Votre inscription a été effectuée avec succès!');
}



}