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
        Schema::create('soutenance', function (Blueprint $table) {
            $table->id();
            $table->date("date");
            $table->time("heure");
            $table->unsignedBigInteger('specialite_id')->nullable(true);
            $table->foreign('specialite_id')
                  ->references('id')
                  ->on('specialite')
                  ->onDelete('cascade');
            $table->unsignedBigInteger('salle_id')->nullable(true);
            $table->foreign('salle_id')
                  ->references('id')
                  ->on('salle')
                  ->onDelete('set null');
            $table->unsignedBigInteger('pfe_id')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soutenance');
    }
};
