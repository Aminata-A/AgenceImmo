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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('auteur');
            $table->text('contenu');
            $table->timestamps();
            $table->unsignedBigInteger('bien_id');
            $table->foreign('bien_id')->references('id')->on('biens');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropForeign('commentaires_bien_id_foreign');
            $table->dropColumn('bien_id');
        });
        Schema::dropIfExists('commentaires');
    }
};
