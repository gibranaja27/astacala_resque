<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'penggunas';

    protected $fillable = [
        'username_akun_pengguna',
        'password_akun_pengguna',
        'nama_lengkap_pengguna',
        'tanggal_lahir_pengguna',
        'tempat_lahir_pengguna',
        'no_handphone_pengguna',
    ];

    protected $hidden = [
        'password_akun_pengguna'
    ];

    // ⬅️ tambahkan ini agar Sanctum tahu password field mana yang dipakai
    public function getAuthPassword()
    {
        return $this->password_akun_pengguna;
    }

    public function pelaporans()
    {
        return $this->hasMany(Pelaporan::class, 'pelapor_pengguna_id');
    }
}