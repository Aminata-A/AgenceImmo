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
}
