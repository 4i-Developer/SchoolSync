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
        Schema::table('presensi', function (Blueprint $table) {
            $table->enum('status', ['1', '2'])->change();
        });
    }

    public function down()
    {
        Schema::table('presensi', function (Blueprint $table) {
            $table->string('status')->change();
        });
    }
};
