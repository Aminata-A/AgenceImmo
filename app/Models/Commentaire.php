<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'auteur',
        'contenu',
        'bien_id'
    ];

    public function bien(): BelongsTo
    {
        return $this->BelongsTo(Bien::class);
    }
}
