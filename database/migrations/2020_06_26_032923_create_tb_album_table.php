<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbAlbumTable extends Migration
{

    public function up()
    {
        Schema::create('tb_album', function (Blueprint $table) {
            $table->increments('album_id');
            $table->string('nama_album');
            $table->unsignedInteger('artis_id');
            $table->foreign('artis_id')->references('artis_id')->on('tb_artis');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_album');
    }
}
