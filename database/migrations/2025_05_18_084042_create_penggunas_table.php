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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('username_akun_pengguna', 255)->unique();
            $table->string('password_akun_pengguna', 255);
            $table->string('nama_lengkap_pengguna', 255);
            $table->string('tanggal_lahir_pengguna', 255);
            $table->string('tempat_lahir_pengguna');
            $table->string('no_handphone_pengguna', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
