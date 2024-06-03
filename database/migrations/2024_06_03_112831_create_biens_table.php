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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('categorie');
            $table->text('description');
            $table->string('adresse');            
            $table->boolean('statut')->default(false);           
            $table->timestamps();
            
            $table->unsignedBigInteger('personnel_id');
            $table->foreign('personnel_id')->references('id')->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biens', function (Blueprint $table) {
            $table->dropForeign('biens_personnel_id_foreign');
            $table->dropColumn('personnel_id');
        });
        Schema::dropIfExists('biens');
    }
};
