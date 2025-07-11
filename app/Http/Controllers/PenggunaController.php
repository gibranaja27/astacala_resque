<?php

// app/Http/Controllers/PenggunaController.php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function controllerpengguna()
    {
        $data_pengguna = Pengguna::all();
        return view('data_pengguna', compact('data_pengguna'));
    }

    public function hapus($id) {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect('/Datapengguna')->with('Success', 'Data Pengguna Berhasil Dihapus');
    }
    public function ubahpenggun($id) {
        $pengguna = Pengguna::find($id);
        return view('ubah_pengguna', compact(['pengguna']));
    }
    public function ubahpeng($id, Request $request) {
        $pengguna = Pengguna::find($id);
        $pengguna->update($request->except(['_token','submit']));
        return redirect('/Datapengguna');
    }
}
