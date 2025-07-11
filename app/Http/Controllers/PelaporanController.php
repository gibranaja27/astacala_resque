<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelaporanController extends Controller
{
    // Tampilkan semua data pelaporan
    public function membacaDataPelaporan()
    {
        $data = Pelaporan::with('pengguna')->get();
        return view('data_pelaporan', compact('data'));
    }

    // Tambah data pelaporan baru (STORE)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_team_pelapor' => 'required',
            'jumlah_personel' => 'required|integer',
            'no_handphone' => 'required',
            'informasi_singkat_bencana' => 'required',
            'lokasi_bencana' => 'required',
            'titik_kordinat_lokasi_bencana' => 'required',
            'skala_bencana' => 'required',
            'jumlah_korban' => 'required|integer',
            'deskripsi_terkait_data_lainya' => 'required',
            'foto_lokasi_bencana' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'bukti_surat_perintah_tugas' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto_lokasi_bencana')) {
            $fotoLokasi = $request->file('foto_lokasi_bencana')->store('pelaporan', 'public');
            $validated['foto_lokasi_bencana'] = $fotoLokasi;
        }

        if ($request->hasFile('bukti_surat_perintah_tugas')) {
            $buktiSurat = $request->file('bukti_surat_perintah_tugas')->store('pelaporan', 'public');
            $validated['bukti_surat_perintah_tugas'] = $buktiSurat;
        }

        Pelaporan::create($validated);

        return response()->json(['message' => 'Pelaporan berhasil disimpan!'], 200);
    }

    // Tampilkan halaman notifikasi
    public function menampilkanNotifikasiPelaporanMasuk()
    {
        $data = Pelaporan::with('pengguna')
            ->orderBy('created_at', 'desc')
            ->get();

        Pelaporan::where('status_notifikasi', false)->update(['status_notifikasi' => true]);

        return view('notifikasi', compact('data'));
    }

    // Hapus data
    public function menghapusDataPelaporan($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);

        if ($pelaporan->foto_lokasi_bencana) {
            Storage::disk('public')->delete($pelaporan->foto_lokasi_bencana);
        }
        if ($pelaporan->bukti_surat_perintah_tugas) {
            Storage::disk('public')->delete($pelaporan->bukti_surat_perintah_tugas);
        }

        $pelaporan->delete();
        return redirect()->route('pelaporan.index')->with('success', 'Data berhasil dihapus');
    }

    public function memberikanNotifikasiVerifikasi(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:DITERIMA,DITOLAK',
        ]);

        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->status_verifikasi = $request->status;
        $pelaporan->save();

        return redirect()->route('pelaporan.index')->with('success', 'Status verifikasi diperbarui.');
    }
    public function getVerifikasi($pengguna_id)
    {
        $data = Pelaporan::where('pelapor_pengguna_id', $pengguna_id)
            ->whereIn('status_verifikasi', ['DITERIMA', 'DITOLAK'])
            ->latest()
            ->get(['id', 'informasi_singkat_bencana', 'status_verifikasi']);

        return response()->json($data);
    }
}
