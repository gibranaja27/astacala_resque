<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function show(Request $request)
    {
        // Ambil ID admin yang login
        $adminId = session('admin_id');

        // Ambil data admin
        $admin = Admin::find($adminId);

        // Kirim ke view profil
        return view('profil_admin', compact('admin'));
    }
}
