<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileAdminController extends Controller
{
    public function show(Request $request)
    {
        $adminId = session('admin_id');
        $admin = Admin::find($adminId);
        return view('profil_admin', compact('admin'));
    }

    public function edit(Request $request)
    {
        $adminId = session('admin_id');
        $admin = Admin::find($adminId);
        return view('edit_profil_admin', compact('admin'));
    }

    public function update(Request $request)
    {
        $adminId = session('admin_id');
        $admin = Admin::find($adminId);

        $request->validate([
            'username_akun_admin' => 'required',
            'nama_lengkap_admin' => 'required',
            'tanggal_lahir_admin' => 'required|date',
            'tempat_lahir_admin' => 'required',
            'no_anggota' => 'required',
            'no_handphone_admin' => 'required',
        ]);

        $admin->username_akun_admin = $request->username_akun_admin;
        $admin->nama_lengkap_admin = $request->nama_lengkap_admin;
        $admin->tanggal_lahir_admin = $request->tanggal_lahir_admin;
        $admin->tempat_lahir_admin = $request->tempat_lahir_admin;
        $admin->no_anggota = $request->no_anggota;
        $admin->no_handphone_admin = $request->no_handphone_admin;

        $admin->save();

        return redirect()->route('profil.admin')->with('success', 'Profil berhasil diperbarui.');
    }
}
