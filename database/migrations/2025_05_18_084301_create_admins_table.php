<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username_akun_admin', 255)->unique();
            $table->string('password_akun_admin', 255);
            $table->string('nama_lengkap_admin', 255);
            $table->string('tanggal_lahir_admin', 255);
            $table->string('tempat_lahir_admin', 255);
            $table->string('no_anggota', 255);
            $table->string('no_handphone_admin', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
