<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class BienController extends Controller
{
    public function accueil()
    {
        $biens = Bien::take(3)->get();
        return view('biens.accueil', compact('biens'));
    }    public function biens()
    {
        $biens = Bien::paginate(12);
        return view('biens.biens', compact('biens'));
    }

    public function detail($id)
    {
        $bien = Bien::findOrFail($id);
        $commentaires = Commentaire::where('bien_id', $id)->paginate(2);
        return view('biens.detail', compact('bien', 'commentaires'));
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
            'adresse' => 'required',
            'statut' => 'required|boolean',
            'personnel_id' => 'required|integer'
        ]);

        Bien::create($request->all());

        return redirect('/');
    }

    public function modifier($id)
    {
        $bien = Bien::findOrFail($id);
        return view('biens.modification', compact('bien'));
    }

    public function traiter(Request $request, $id)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required',
            'image' => 'required|url',
            'description' => 'required',
            'adresse' => 'required',
            'statut' => 'required|boolean',
            'personnel_id' => 'required|integer'
        ]);

        // Trouver l'enregistrement par ID
        $bien = Bien::findOrFail($id);

        // Mettre à jour l'enregistrement avec les données validées
        $bien->update($validatedData);

        // Rediriger avec un message de succès
        return redirect('/biens/' . $bien->id);
    }

    public function supprimer($id)
    {
        $bien = Bien::findOrFail($id);
        $bien->delete();
        return redirect('/');
    }
}
