<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Admin;

class AdminController extends Controller
{
    public function controlleradmin()
    {
        $data_admin = Admin::all();
        return view('data_admin', compact('data_admin'));
    }
    public function hapusadmin($id) {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect('/Dataadmin')->with('Success', 'Data Pengguna Berhasil Dihapus');
    }
    public function ubahadmin($id) {
        $admin = Admin::findOrFail($id);
        return view('ubah_admin', compact(['admin']));
    }
    public function ubahadmi($id, Request $request) {
        $admin = Admin::find($id);
        $admin->update($request->except(['_token','submit']));
        return redirect('/Dataadmin');
    }
}