<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\BeritaBencana;
use Illuminate\Support\Facades\Storage;

class BeritaBencanaController extends Controller
{
    // Tampilkan semua data
    public function membacaDataPublikasiBeritaBencana()
    {
        $data = BeritaBencana::all();
        return view('data_publikasi', compact('data'));
    }

    // Tampilkan form tambah data
    public function tambahDataPublikasiBeritaBencana()
    {
        return view('tambah_data_publikasi');
    }

    // Simpan data baru
    public function simpanTambahPublikasiDataBeritaBencana(Request $request)
    {
        $validated = $request->validate([
            'pblk_judul_bencana' => 'required',
            'pblk_lokasi_bencana' => 'required',
            'pblk_titik_kordinat_bencana' => 'required',
            'pblk_skala_bencana' => 'required',
            'deskripsi_umum' => 'required',
            'pblk_foto_bencana' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dibuat_oleh_admin_id' => 'required|integer',
        ]);

        if ($request->hasFile('pblk_foto_bencana')) {
            $path = $request->file('pblk_foto_bencana')->store('foto_bencana', 'public');
            $validated['pblk_foto_bencana'] = $path;
        }

        BeritaBencana::create($validated);

        return redirect()->route('berita.index')->with('success', 'Data berhasil ditambahkan');
    }

    // Tampilkan form edit
    public function editDataPublikasiBeritaBencana($id)
    {
        $data = DB::table('beritabencana')->where('id', $id)->first();
        return view('ubah_data_publikasi', compact('data'));
    }

    // Simpan perubahan data
    public function simpanEditDataPublikasiBeritaBencana(Request $request, $id)
    {
        $request->validate([
            'pblk_judul_bencana' => 'required',
            'pblk_lokasi_bencana' => 'required',
            'pblk_titik_kordinat_bencana' => 'required',
            'pblk_skala_bencana' => 'required',
            'deskripsi_umum' => 'required',
            'pblk_foto_bencana' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $dataUpdate = [
            'pblk_judul_bencana' => $request->pblk_judul_bencana,
            'pblk_lokasi_bencana' => $request->pblk_lokasi_bencana,
            'pblk_titik_kordinat_bencana' => $request->pblk_titik_kordinat_bencana,
            'pblk_skala_bencana' => $request->pblk_skala_bencana,
            'deskripsi_umum' => $request->deskripsi_umum,
            'dibuat_oleh_admin_id' => $request->dibuat_oleh_admin_id,
            'updated_at' => now(),
        ];

        // Jika ada file baru
        if ($request->hasFile('pblk_foto_bencana')) {
            $file = $request->file('pblk_foto_bencana');
            $path = $file->store('foto_bencana', 'public');
            $dataUpdate['pblk_foto_bencana'] = $path;
        }

        DB::table('beritabencana')->where('id', $id)->update($dataUpdate);

        return redirect('/publikasi')->with('success', 'Data berhasil diperbarui');
    }

    public function hapusDataPublikasiBeritaBencana($id)
    {
        $data = BeritaBencana::findOrFail($id);

        // Hapus file gambar jika ada
        if ($data->pblk_foto_bencana && file_exists(public_path('storage/' . $data->pblk_foto_bencana))) {
            unlink(public_path('storage/' . $data->pblk_foto_bencana));
        }

        $data->delete();

        return redirect()->route('berita.index')->with('success', 'Data berhasil dihapus.');
    }

    public function publishPublikasiBeritaBencana($id)
    {
        $berita = BeritaBencana::findOrFail($id);
        $berita->is_published = 1;
        $berita->save();
        return redirect()->route('berita.index')->with('success', 'Berita berhasil dipublish!');
    }
    public function apiPublishPublikasiBeritaBencana()
    {
        return BeritaBencana::where('is_published', true)->latest()->get();
    }
    public function getPublished()
    {
        $data = BeritaBencana::where('is_published', 1)->get();
        return response()->json($data);
    }

    public function show($id)
    {
        $berita = BeritaBencana::find($id);

        if (!$berita) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'judul' => $berita->pblk_judul_bencana,
                'lokasi' => $berita->pblk_lokasi_bencana,
                'koordinat' => $berita->pblk_titik_kordinat_bencana,
                'skala' => $berita->pblk_skala_bencana,
                'foto' => asset('storage/' . $berita->pblk_foto_bencana),
            ]
        ]);
    }
}
