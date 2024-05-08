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
        Schema::table('pfe', function (Blueprint $table) {
            $table->foreign('soutenance_id')->references('id')->on('soutenance')->onDelete('set null');
        });

        Schema::table('soutenance', function (Blueprint $table) {
            $table->foreign('pfe_id')->references('id')->on('pfe')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pfe', function (Blueprint $table) {
            $table->dropForeign(['soutenance_id']);
        });

        Schema::table('soutenance', function (Blueprint $table) {
            $table->dropForeign(['pfe_id']);
        });
    }
};
