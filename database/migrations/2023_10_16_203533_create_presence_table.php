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
        Schema::create('presence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stagiaire_id');
            $table->tinyInteger('etat_presence')->default(0);
            $table->timestamps();
    
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presence');
    }
};
