<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('no_certi')->unique();
            $table->string('nama');
            $table->string('kategori_sebagai');
            $table->string('nama_kegiatan');
            $table->string('tema_kegiatan');
            $table->foreignId('template_id')->constrained('certi_templates')->onDelete('cascade');
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
