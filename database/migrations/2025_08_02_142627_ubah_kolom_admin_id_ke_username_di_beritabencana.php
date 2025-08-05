<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UbahKolomAdminIdKeUsernameDiBeritabencana extends Migration
{
    public function up()
    {
        Schema::table('beritabencana', function (Blueprint $table) {
            $table->dropForeign(['dibuat_oleh_admin_id']); // jika pakai foreign
            $table->dropColumn('dibuat_oleh_admin_id');
            $table->string('dibuat_oleh_admin_username')->nullable();
        });
    }

    public function down()
    {
        Schema::table('beritabencana', function (Blueprint $table) {
            $table->dropColumn('dibuat_oleh_admin_username');
            $table->unsignedBigInteger('dibuat_oleh_admin_id')->nullable();

            // Jika ada foreign key
            // $table->foreign('dibuat_oleh_admin_id')->references('id')->on('admins');
        });
    }
}
