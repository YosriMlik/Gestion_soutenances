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
        Schema::create('etudiant', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("adresse");
            $table->unsignedBigInteger('specialite_id')->nullable(true);
            $table->foreign('specialite_id')
                  ->references('id')
                  ->on('specialite')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('soutenance_id')->nullable(true);
            $table->foreign('soutenance_id')
                  ->references('id')
                  ->on('soutenance')
                  ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant');
    }
};
