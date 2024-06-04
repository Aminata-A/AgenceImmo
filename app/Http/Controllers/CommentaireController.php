<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    // Méthode pour insérer un nouveau commentaire pour un bien spécifique
    public function insertion(Request $request, $bien_id)
    {
        // Valide les données du formulaire de commentaire
        $validatedData = $request->validate([
            'auteur' => 'required',
            'contenu' => 'required',
        ]);

        // Ajoute l'ID du bien au tableau de données validées
        $validatedData['bien_id'] = $bien_id;

        // Crée un nouveau commentaire avec les données validées
        Commentaire::create($validatedData);

        // Redirige vers la page de détails du bien
        return redirect('biens/' . $bien_id);
    }
}
