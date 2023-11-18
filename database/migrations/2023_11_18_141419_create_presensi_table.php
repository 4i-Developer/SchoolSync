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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_kelas')->unsigned();
            $table->time('time')->default(DB::raw('CURRENT_TIME'));
            $table->string('status')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_kelas')->references('id')->on('kelas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('presensi');
    }
};
