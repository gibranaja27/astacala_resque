<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        $user = Pengguna::create([
            'username_akun_pengguna' => $request->username_akun_pengguna,
            'password_akun_pengguna' => bcrypt($request->password_akun_pengguna),
            'nama_lengkap_pengguna' => $request->nama_lengkap_pengguna,
            'tanggal_lahir_pengguna' => $request->tanggal_lahir_pengguna,
            'tempat_lahir_pengguna' => $request->tempat_lahir_pengguna,
            'no_handphone_pengguna' => $request->no_handphone_pengguna,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil',
            'data' => $user
        ], 201);
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'username_akun_pengguna' => 'required',
            'password_akun_pengguna' => 'required',
        ]);

        $pengguna = Pengguna::where('username_akun_pengguna', $request->username_akun_pengguna)->first();

        if (!$pengguna || !Hash::check($request->password_akun_pengguna, $pengguna->password_akun_pengguna)) {
            return response()->json(['message' => 'Login gagal, username atau password salah'], 401);
        }

        // Buat token dengan Sanctum
        $token = $pengguna->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => $pengguna
        ], 200);
    }

    // Logout
    public function logout(Request $request)
    {
        // Hapus token yang sedang dipakai
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil, token sudah dihapus'
        ], 200);
    }
}
