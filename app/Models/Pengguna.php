<?php

// app/Models/Pengguna.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'penggunas'; // nama tabel di database

    protected $fillable = [
        'username_akun_pengguna',
        'password_akun_pengguna',
        'nama_lengkap_pengguna',
        'tanggal_lahir_pengguna',
        'tempat_lahir_pengguna',
        'no_handphone_pengguna',
        // Tambahkan kolom lain jika ada
    ];

    public function pelaporans()
    {
        return $this->hasMany(Pelaporan::class, 'pengguna_id');
    }
}
