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
        // Création de la table 'commentaires'
        Schema::create('commentaires', function (Blueprint $table) {
            // Ajoute une colonne 'id' auto-incrémentée pour la clé primaire
            $table->id();
            
            // Ajoute une colonne 'auteur' de type chaîne pour le nom de l'auteur du commentaire
            $table->string('auteur');
            
            // Ajoute une colonne 'contenu' de type texte pour le contenu du commentaire
            $table->text('contenu');
            
            // Ajoute des colonnes 'created_at' et 'updated_at' pour les timestamps de création et de mise à jour
            $table->timestamps();
            
            // Ajoute une colonne 'bien_id' de type entier non signé pour la clé étrangère
            $table->unsignedBigInteger('bien_id');
            
            // Définit 'bien_id' comme clé étrangère, liée à la colonne 'id' de la table 'biens'
            $table->foreign('bien_id')->references('id')->on('biens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprime la contrainte de clé étrangère 'commentaires_bien_id_foreign' avant de supprimer la colonne 'bien_id'
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropForeign('commentaires_bien_id_foreign');
            $table->dropColumn('bien_id');
        });
        
        // Supprime la table 'commentaires' si elle existe
        Schema::dropIfExists('commentaires');
    }
};
