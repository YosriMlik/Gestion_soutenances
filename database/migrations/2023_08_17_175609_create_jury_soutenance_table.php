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
        Schema::create('jury_soutenance', function (Blueprint $table) {
            $table->id();
            $table->string("role");
            $table->timestamps();

            $table->unsignedBigInteger('soutenance_id');
            $table->foreign('soutenance_id')
                  ->references('id')
                  ->on('soutenance')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('jury_id');
            $table->foreign('jury_id')
                  ->references('id')
                  ->on('jury')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jury_soutenance');
    }
};
