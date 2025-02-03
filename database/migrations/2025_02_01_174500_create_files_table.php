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
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id_berkas');
            $table->text('file_berkas');
            $table->enum('tipe_berkas', ['0', '1', '2', '3']);
            $table->string('nama_berkas', 150);
            $table->text('url_berkas');
            $table->date('tanggal_acara');
            $table->unsignedBigInteger('proker_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('proker_id')->references('id')->on('prokers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};