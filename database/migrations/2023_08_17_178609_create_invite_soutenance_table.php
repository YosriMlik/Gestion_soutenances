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
        Schema::create('invite_soutenance', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('soutenance_id');
            $table->foreign('soutenance_id')
                  ->references('id')
                  ->on('soutenance')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('invite_id');
            $table->foreign('invite_id')
                  ->references('id')
                  ->on('invite')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invite_soutenance');
    }
};
