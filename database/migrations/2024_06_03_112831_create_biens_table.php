<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Création de la table 'biens'
        Schema::create('biens', function (Blueprint $table) {
            // Ajoute une colonne 'id' auto-incrémentée pour la clé primaire
            $table->id();
            
            // Ajoute une colonne 'nom' de type chaîne pour le nom du bien
            $table->string('nom');
            
            // Ajoute une colonne 'categorie' de type chaîne pour la catégorie du bien
            $table->string('categorie');
            
            // Ajoute une colonne 'description' de type texte pour la description détaillée du bien
            $table->text('description');
            
            // Ajoute une colonne 'adresse' de type chaîne pour l'adresse de localisation du bien
            $table->string('adresse');
            
            // Ajoute une colonne 'image' de type chaîne pour stocker le chemin de l'image illustrative du bien
            $table->string('image');
            
            // Ajoute une colonne 'statut' de type booléen pour indiquer si le bien est occupé ou non, avec une valeur par défaut de false (non occupé)
            $table->boolean('statut')->default(false);
            
            // Ajoute des colonnes 'created_at' et 'updated_at' pour les timestamps de création et de mise à jour
            $table->timestamps();
            
            // Ajoute une colonne 'personnel_id' de type entier non signé pour la clé étrangère
            $table->unsignedBigInteger('personnel_id');
            
            // Définit 'personnel_id' comme clé étrangère, liée à la colonne 'id' de la table 'personnels'
            $table->foreign('personnel_id')->references('id')->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprime la contrainte de clé étrangère 'biens_personnel_id_foreign' avant de supprimer la colonne 'personnel_id'
        Schema::table('biens', function (Blueprint $table) {
            $table->dropForeign('biens_personnel_id_foreign');
            $table->dropColumn('personnel_id');
        });
        
        // Supprime la table 'biens' si elle existe
        Schema::dropIfExists('biens');
    }
};
