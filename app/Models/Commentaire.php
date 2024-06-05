<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    // Les attributs qui sont assignables en masse
    protected $fillable = [
        'auteur',
        'contenu',
        'bien_id'
    ];

    // Définition de la relation "un commentaire appartient à un bien"
    public function bien(): BelongsTo
    {
        return $this->belongsTo(Bien::class);
    }
}
