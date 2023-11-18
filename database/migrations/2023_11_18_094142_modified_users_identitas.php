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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile')->nullable()->after('email');
            $table->string('kelas')->nullable()->default(null)->after('profile');
            $table->string('nik')->nullable()->default(null)->after('kelas');
            $table->string('nis')->nullable()->default(null)->after('nik');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile', 'kelas', 'nik', 'nis']);
        });
    }
};
