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
        Schema::table('documentations', function (Blueprint $table) {
            $table->unsignedBigInteger('proker_id');
            $table->foreign('proker_id')->references('id')->on('prokers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documentations', function (Blueprint $table) {
            $table->dropForeign(['proker_id']);
            $table->dropColumn(['proker_id']);
        });
    }
};
