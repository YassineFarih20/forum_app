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
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('matricule')->unique();
            $table->string('cin')->unique();
            $table->string('email')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->enum('sexe', ['F', 'H']);
            $table->date('dateNaissance');
            $table->string('telephone')->nullable();
            $table->string('filiere');
            $table->string('cv')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->default(0);
            // 0 : not activated || 1: activated || 2: attended
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaire');
    }
};
