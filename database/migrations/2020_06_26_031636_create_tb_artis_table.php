<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbArtisTable extends Migration
{

    public function up()
    {
        Schema::create('tb_artis', function (Blueprint $table) {
            $table->increments('artis_id');
            $table->string('nama_artis');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_artis');
    }
}
