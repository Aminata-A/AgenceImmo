<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use Illuminate\Http\Request;

class BienController extends Controller
{
    // Méthode pour afficher la page d'accueil avec les 3 premiers biens
    public function accueil()
    {
        $biens = Bien::take(3)->get(); // Récupère les 3 premiers biens
        return view('biens.accueil', compact('biens')); // Retourne la vue 'accueil' avec les biens
    }

    // Méthode pour afficher la liste des biens avec pagination
    public function biens()
    {
        $biens = Bien::paginate(12); // Récupère les biens par lot de 12 pour la pagination
        return view('biens.biens', compact('biens')); // Retourne la vue 'biens' avec les biens paginés
    }

    // Méthode pour afficher les détails d'un bien spécifique avec ses commentaires
    public function detail($id)
    {
        $bien = Bien::findOrFail($id); // Trouve le bien par son ID ou renvoie une erreur 404
        $commentaires = Commentaire::where('bien_id', $id)->paginate(2); // Récupère les commentaires du bien avec pagination
        return view('biens.detail', compact('bien', 'commentaires')); // Retourne la vue 'detail' avec le bien et ses commentaires
    }

    // Méthode pour afficher le formulaire d'ajout d'un bien
    public function ajout()
    {
        return view('biens.ajout'); // Retourne la vue 'ajout' pour ajouter un bien
    }

    // Méthode pour sauvegarder un nouveau bien
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
        ]); // Valide les données du formulaire

        Bien::create($request->all()); // Crée un nouveau bien avec les données validées

        return redirect('/biens'); // Redirige vers la page d'accueil
    }

    // Méthode pour afficher le formulaire de modification d'un bien
    public function modifier($id)
    {
        $bien = Bien::findOrFail($id); // Trouve le bien par son ID ou renvoie une erreur 404
        return view('biens.modification', compact('bien')); // Retourne la vue 'modification' avec le bien
    }

    // Méthode pour traiter la mise à jour d'un bien
    public function traiter(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'categorie' => 'required',
            'image' => 'required|url',
            'description' => 'required',
            'adresse' => 'required',
            'statut' => 'required|boolean',
            'personnel_id' => 'required|integer'
        ]); // Valide les données du formulaire

        $bien = Bien::findOrFail($id); // Trouve le bien par son ID ou renvoie une erreur 404
        $bien->update($validatedData); // Met à jour le bien avec les données validées

        return redirect('/biens/' . $bien->id); // Redirige vers la page de détails du bien
    }

    // Méthode pour supprimer un bien
    public function supprimer($id)
    {
        $bien = Bien::findOrFail($id); // Trouve le bien par son ID ou renvoie une erreur 404
        $bien->delete(); // Supprime le bien
        return redirect('/'); // Redirige vers la page d'accueil
    }
}
