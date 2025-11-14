<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSudahDibacaToPelaporansTable extends Migration
{
    public function up()
    {
        Schema::table('pelaporans', function (Blueprint $table) {
            $table->boolean('sudah_dibaca')->default(false)->after('is_notifikasi_web');
        });
    }

    public function down()
    {
        Schema::table('pelaporans', function (Blueprint $table) {
            $table->dropColumn('sudah_dibaca');
        });
    }
}
