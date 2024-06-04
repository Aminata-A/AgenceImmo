<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bien extends Model
{
    use HasFactory;

    // Les attributs qui sont assignables en masse
    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'adresse',
        'statut',
        'personnel_id',
    ];

    // Définition de la relation "un bien a plusieurs commentaires"
    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    // Définition de la relation "un bien appartient à un personnel"
    public function personnel(): BelongsTo
    {
        return $this->belongsTo(Personnel::class);
    }
}
