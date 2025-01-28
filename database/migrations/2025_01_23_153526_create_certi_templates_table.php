<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertiTemplatesTable extends Migration
{
    public function up()
    {
        Schema::create('certi_templates', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('file_template');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certi_templates');
    }
}
