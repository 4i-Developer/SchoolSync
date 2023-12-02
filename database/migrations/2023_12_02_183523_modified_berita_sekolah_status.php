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
        Schema::table('berita_sekolah', function (Blueprint $table) {
            $table->enum('status', ['show', 'hide'])->default('show')->after('konten');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita_sekolah', function (Blueprint $table) {
            //
        });
    }
};
