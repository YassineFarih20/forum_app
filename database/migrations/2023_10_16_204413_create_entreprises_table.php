<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->text('adresse')->nullable();
            $table->unsignedBigInteger('filiere_id'); // Ajoutez le champ filiere_id
    
            $table->timestamps();
    
            $table->foreign('filiere_id')->references('id')->on('filieres'); // Clé étrangère vers la table filieres
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
