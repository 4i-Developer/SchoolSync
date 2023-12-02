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
        // Drop foreign key constraint
        Schema::table('presensi', function (Blueprint $table) {
            $table->dropForeign(['id_kelas']);
        });

        // Drop the column
        Schema::table('presensi', function (Blueprint $table) {
            $table->dropColumn('id_kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Re-add the column
        Schema::table('presensi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_kelas')->nullable();
        });

        // Re-add foreign key constraint (if necessary, modify this based on your foreign key configuration)
        Schema::table('presensi', function (Blueprint $table) {
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('set null');
        });
    }
};
