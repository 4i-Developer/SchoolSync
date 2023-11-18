<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('berita_sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('id_user')->unsigned();
            $table->string('gambar')->nullable();
            $table->string('judul')->nullable();
            $table->longText('konten')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('berita_sekolah');
    }
};
