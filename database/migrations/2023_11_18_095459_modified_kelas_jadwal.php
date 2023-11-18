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
        Schema::table('kelas', function (Blueprint $table) {
            $table->string('senin1')->nullable()->after('id_guru');
            $table->string('senin2')->nullable()->after('senin1');
            $table->string('senin3')->nullable()->after('senin2');
            $table->string('senin4')->nullable()->after('senin3');
            $table->string('selasa1')->nullable()->after('senin4');
            $table->string('selasa2')->nullable()->after('selasa1');
            $table->string('selasa3')->nullable()->after('selasa2');
            $table->string('selasa4')->nullable()->after('selasa3');
            $table->string('rabu1')->nullable()->after('selasa4');
            $table->string('rabu2')->nullable()->after('rabu1');
            $table->string('rabu3')->nullable()->after('rabu2');
            $table->string('rabu4')->nullable()->after('rabu3');
            $table->string('kamis1')->nullable()->after('rabu4');
            $table->string('kamis2')->nullable()->after('kamis1');
            $table->string('kamis3')->nullable()->after('kamis2');
            $table->string('kamis4')->nullable()->after('kamis3');
            $table->string('jumat1')->nullable()->after('kamis4');
            $table->string('jumat2')->nullable()->after('jumat1');
            $table->string('jumat3')->nullable()->after('jumat2');
            $table->string('jumat4')->nullable()->after('jumat3');
        });
    }

    public function down()
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropColumn([
                'senin1', 'senin2', 'senin3', 'senin4',
                'selasa1', 'selasa2', 'selasa3', 'selasa4',
                'rabu1', 'rabu2', 'rabu3', 'rabu4',
                'kamis1', 'kamis2', 'kamis3', 'kamis4',
                'jumat1', 'jumat2', 'jumat3', 'jumat4'
            ]);
        });
    }
};
