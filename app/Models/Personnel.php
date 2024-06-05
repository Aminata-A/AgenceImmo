<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Personnel extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nom de la table associée au modèle
    protected $table = 'personnels';

    // Attributs assignables en masse
    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe', // Remplacez par le nom de votre champ de mot de passe
    ];

    // Attributs cachés pour les tableaux
    protected $hidden = [
        'mot_de_passe', // Remplacez par le nom de votre champ de mot de passe
        'remember_token',
    ];

    // Attributs et leurs types de casting
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Méthode pour obtenir le mot de passe
    public function getAuthPassword()
    {
        return $this->mot_de_passe; // Remplacez par le nom de votre champ de mot de passe
    }

    // Définition de la relation "un personnel a plusieurs biens"
    public function biens(): HasMany
    {
        return $this->hasMany(Bien::class);
    }
}
