<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'adresse',
        'statut',
        'personnel_id',

    ];

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }
    public function personnel(): BelongsTo
    {
        return $this->BelongsTo(Personnel::class);
    }
}
