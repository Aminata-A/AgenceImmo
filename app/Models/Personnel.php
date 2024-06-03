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

    protected $table = 'personnels'; // Assurez-vous que ce nom correspond à votre table

    protected $fillable = [
        'nom',
        'email',
        'mot_de_passe', // Remplacez par le nom de votre champ de mot de passe
    ];

    protected $hidden = [
        'mot_de_passe', // Remplacez par le nom de votre champ de mot de passe
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Méthode pour obtenir le mot de passe
    public function getAuthPassword()
    {
        return $this->mot_de_passe; // Remplacez par le nom de votre champ de mot de passe
    }

    public function biens(): HasMany
    {
        return $this->hasMany(Bien::class);
    }
   
}
