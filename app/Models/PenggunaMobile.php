<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenggunaMobile extends Model
{
    protected $table = 'penggunas';
    protected $fillable = [
        'username_akun_pengguna',
        'password_akun_pengguna',
        'nama_lengkap_pengguna',
        'tanggal_lahir_pengguna',
        'tempat_lahir_pengguna',
        'no_handphone_pengguna',
    ];
    public $timestamps = false; // kalau tabel tidak punya created_at & updated_at
}
