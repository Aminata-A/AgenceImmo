<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function insertion(Request $request, $bien_id){

        $valide = $request->validate([
            'auteur' => 'required',
            'contenu' => 'required',
        ]);

        $valide['bien_id'] = $bien_id;
        Commentaire::create($valide);
        return redirect('/biens/' . $bien_id);
    }
}
