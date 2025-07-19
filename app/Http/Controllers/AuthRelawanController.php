<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRelawanController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama_lengkap_pengguna'     => 'required|string|max:255',
            'username_akun_pengguna'    => 'required|string|unique:penggunas',
            'password_akun_pengguna'    => 'required|string|min:6',
        ]);

        $user = Pengguna::create([
            'nama_lengkap_pengguna'     => $request->nama_lengkap_pengguna,
            'username_akun_pengguna'    => $request->username_akun_pengguna,
            'password_akun_pengguna'    => Hash::make($request->password_akun_pengguna),
        ]);

        return response()->json(['message' => 'User registered successfully!']);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_akun_pengguna'    => 'required',
            'password_akun_pengguna'    => 'required',
        ]);

        $credentials = [
            'username_akun_pengguna' => $request->username_akun_pengguna,
            'password' => $request->password_akun_pengguna,
        ];

        if (!Auth::guard('pengguna')->attempt($credentials)) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        $user = Pengguna::where('username_akun_pengguna', $request->username_akun_pengguna)->first();
        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token'   => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}
