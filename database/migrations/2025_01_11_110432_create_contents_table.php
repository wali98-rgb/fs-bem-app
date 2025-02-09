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
        Schema::create('contents', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('user_id')->constrained(); // Foreign key ke tabel
            $table->date('date'); // Kolom untuk menyimpan tanggal konten dibuat
            $table->text('content')->nullable(); // kolom untuk upload file konten
            $table->text('description'); // Kolom untuk menyimpan judul konten
            $table->string('media_url')->nullable(); // Kolom untuk menyimpan URL media (gambar/video)
            $table->enum('media_type', ['image', 'video','text'])->nullable(); // Kolom untuk menentukan jenis media (image atau video)
            $table->unsignedInteger('likes_count')->default(0); // Kolom untuk menyimpan jumlah likes
            $table->unsignedInteger('comments_count')->default(0); // Kolom untuk menyimpan jumlah komentar
            $table->enum('status',['approve', 'pending' ,'refuse'])->default('pending'); // Kolom untuk menentukan status konten (approve atau refuse)
            $table->timestamps(); // Kolom untuk menyimpan waktu pembuatan dan pembaruan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
