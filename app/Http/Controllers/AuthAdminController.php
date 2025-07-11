<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_akun_admin' => 'required',
            'password_akun_admin' => 'required',
        ]);

        $admin = Admin::where('username_akun_admin', $request->username_akun_admin)->first();

        if ($admin && Hash::check($request->password_akun_admin, $admin->password_akun_admin)) {
            session(['admin_id' => $admin->id]);
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah.');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username_akun_admin' => 'required|unique:admins,username_akun_admin',
            'password_akun_admin' => 'required|confirmed',
            'nama_lengkap_admin' => 'required',
            'tanggal_lahir_admin' => 'required|date',
            'tempat_lahir_admin' => 'required',
            'no_anggota' => 'required',
            'no_handphone_admin' => 'required',
        ]);

        Admin::create([
            'username_akun_admin' => $request->username_akun_admin,
            'password_akun_admin' => Hash::make($request->password_akun_admin),
            'nama_lengkap_admin' => $request->nama_lengkap_admin,
            'tanggal_lahir_admin' => $request->tanggal_lahir_admin,
            'tempat_lahir_admin' => $request->tempat_lahir_admin,
            'no_anggota' => $request->no_anggota,
            'no_handphone_admin' => $request->no_handphone_admin,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login!');
    }

    public function logout(Request $request)
    {
        // Hapus session admin_id
        $request->session()->forget('admin_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil.');
    }
}
