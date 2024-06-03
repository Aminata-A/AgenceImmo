<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function accueil()
    {
        $biens = Bien::all();
        return view('biens.accueil', compact('biens'));
    }

    public function detail($id)
    {
        $bien = Bien::findOrFail($id);
        return view('biens.detail', compact('bien'));
    }

    public function ajout()
    {
        return view('biens.ajout');
    }
    public function sauvegarde(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required',
            'image' => 'required|url',
            'description' => 'required',
            'adresse' =>'required',
            'statut' => 'required|boolean',
            'personnel_id' => 'required|integer'
        ]);

        Bien::create($request->all());

        return redirect('/');
    }
}
