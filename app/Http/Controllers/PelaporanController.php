<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use Illuminate\Support\Facades\Auth;
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

    public function getWeatherByCoordinate(Request $request)
    {
        $lat = $request->lat;
        $lon = $request->lon;

        if (!$lat || !$lon) {
            return response()->json([
                'success' => false,
                'message' => 'Koordinat tidak valid!'
            ], 400);
        }

        // API KEY OPEN WEATHER MAP
        $apiKey = env('OPENWEATHER_API_KEY');

        $url = "https://api.openweathermap.org/data/2.5/weather?lat={$lat}&lon={$lon}&appid={$apiKey}&units=metric";

        $weather = file_get_contents($url);
        $weatherData = json_decode($weather);

        return response()->json([
            'success' => true,
            'data' => [
                'temp' => $weatherData->main->temp,
                'condition' => $weatherData->weather[0]->main,
                'description' => $weatherData->weather[0]->description,
                'humidity' => $weatherData->main->humidity,
                'wind' => $weatherData->wind->speed,
                'icon' => $weatherData->weather[0]->icon,
            ]
        ]);
    }


    public function store(Request $request)
    {
        $user = auth('sanctum')->user();

        // Validasi input
        $validated = $request->validate([
            'nama_team_pelapor' => 'required|string|max:255',
            'jumlah_personel' => 'required|integer',
            'informasi_singkat_bencana' => 'required|string',
            'lokasi_bencana' => 'required|string|max:255',
            'titik_kordinat_lokasi_bencana' => 'required|string',
            'skala_bencana' => 'required|string|max:100',
            'jumlah_korban' => 'required|integer',
            'deskripsi_terkait_data_lainya' => 'nullable|string',

            // File
            'foto_lokasi_bencana' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bukti_surat_perintah_tugas' => 'nullable|mimes:pdf|max:5120',
        ]);

        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto_lokasi_bencana')) {
            $fotoPath = $request->file('foto_lokasi_bencana')->store('foto_bencana', 'public');
        }

        // Upload bukti surat tugas jika ada
        $buktiPath = null;
        if ($request->hasFile('bukti_surat_perintah_tugas')) {
            $buktiPath = $request->file('bukti_surat_perintah_tugas')->store('surat_tugas', 'public');
        }

        // Simpan ke database
        $pelaporan = Pelaporan::create([
            'nama_team_pelapor' => $validated['nama_team_pelapor'],
            'jumlah_personel' => $validated['jumlah_personel'],
            'informasi_singkat_bencana' => $validated['informasi_singkat_bencana'],
            'lokasi_bencana' => $validated['lokasi_bencana'],
            'foto_lokasi_bencana' => $fotoPath,
            'titik_kordinat_lokasi_bencana' => $validated['titik_kordinat_lokasi_bencana'],
            'skala_bencana' => $validated['skala_bencana'],
            'jumlah_korban' => $validated['jumlah_korban'],
            'bukti_surat_perintah_tugas' => $buktiPath,
            'deskripsi_terkait_data_lainya' => $validated['deskripsi_terkait_data_lainya'] ?? null,
            'pelapor_pengguna_id' => $user->id,
        ]);

        return response()->json([
            'message' => 'Pelaporan berhasil disimpan',
            'data' => $pelaporan
        ], 201);
    }

    // Tampilkan halaman notifikasi data pelaporan
    public function menampilkanNotifikasiPelaporanMasuk()
    {
        $data = Pelaporan::where('is_notifikasi_web', true) // ambil hanya yang aktif
            ->orderBy('created_at', 'desc')
            ->get();
        // Ubah semua notifikasi yang belum dibaca (status_notifikasi = false) jadi sudah dibaca (true)
        Pelaporan::where('status_notifikasi', false)
            ->update(['status_notifikasi' => true]);

        return view('notifikasi', compact('data'));
    }

    public function hapusNotifikasi($id)
    {
        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->is_notifikasi_web = false; // sembunyikan dari halaman notifikasi
        $pelaporan->save();

        return redirect()->back()->with('success', 'Notifikasi berhasil dihapus dari tampilan.');
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
    // fungsi ini untuk melakukan pengiriman verifikasi notifikasi ke mobile
    public function memberikanNotifikasiVerifikasi(Request $request, $id)
    {
        $status = $request->query('status'); // ambil dari query string ?status=DITERIMA

        if (!in_array($status, ['DITERIMA', 'DITOLAK'])) {
            return redirect()->route('pelaporan.index')
                ->with('error', 'Status verifikasi tidak valid.');
        }

        $pelaporan = Pelaporan::findOrFail($id);
        $pelaporan->status_verifikasi = $status;
        $pelaporan->save();

        return redirect()->route('pelaporan.index')->with('success', 'Status verifikasi diperbarui.');
    }

    // Menampilkan notifikasi verifikasi (dipanggil dari mobile)
    public function getVerifikasi($pengguna_id)
    {
        $data = Pelaporan::where('pelapor_pengguna_id', $pengguna_id)
            ->whereIn('status_verifikasi', ['DITERIMA', 'DITOLAK'])
            ->latest()
            ->get(['id', 'informasi_singkat_bencana', 'status_verifikasi', 'sudah_dibaca']);

        return response()->json($data);
    }

    // Tandai semua notifikasi milik pengguna sudah dibaca
    public function markAsRead($pengguna_id)
    {
        Pelaporan::where('pelapor_pengguna_id', $pengguna_id)
            ->whereIn('status_verifikasi', ['DITERIMA', 'DITOLAK'])
            ->update(['sudah_dibaca' => true]);

        return response()->json(['message' => 'Notifikasi ditandai sudah dibaca.']);
    }


    // // Ambil data pelaporan yang sudah DITERIMA untuk ditampilkan di halaman utama mobile
    // public function getPelaporanDiterima()
    // {
    //     $data = Pelaporan::where('status_verifikasi', 'DITERIMA')
    //         ->latest()
    //         ->get([
    //             'id',
    //             'informasi_singkat_bencana',
    //             'lokasi_bencana',
    //             'titik_kordinat_lokasi_bencana'
    //         ]);

    //     return response()->json($data);
    // }

    // // kirim detail data pelaporan
    // public function shows($id)
    // {
    //     $pelaporan = Pelaporan::find($id);

    //     if (!$pelaporan) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Data tidak ditemukan'
    //         ], 404);
    //     }

    //     return response()->json([
    //         'success' => true,
    //         'data' => [
    //             'nama_team_pelapor' => $pelaporan->nama_team_pelapor,
    //             'jumlah_personel' => $pelaporan->jumlah_personel,
    //             'informasi_singkat_bencana' => $pelaporan->informasi_singkat_bencana,
    //             'lokasi_bencana' => $pelaporan->lokasi_bencana,
    //             'titik_kordinat_lokasi_bencana' => $pelaporan->titik_kordinat_lokasi_bencana,
    //             'skala_bencana' => $pelaporan->skala_bencana,
    //             'jumlah_korban' => $pelaporan->jumlah_korban,
    //             'deskripsi_terkait_data_lainya' => $pelaporan->deskripsi_terkait_data_lainya,

    //         ]
    //     ]);
    // }

    // // Fungsi untuk mengirim data pelaporan yang sudah diverifikasi DITERIMA
    // public function getBeritaTerkini()
    // {
    //     $data = Pelaporan::where('status_verifikasi', 'DITERIMA')
    //         ->latest()
    //         ->get([
    //             'id',
    //             'informasi_singkat_bencana',
    //             'lokasi_bencana',
    //             'skala_bencana',
    //             'foto_lokasi_bencana',
    //             'updated_at'
    //         ]);

    //     return response()->json($data);
    // }

    public function getDiterima()
    {
        $pelaporans = Pelaporan::where('status_verifikasi', 'DITERIMA')
            ->orderBy('updated_at', 'desc')
            ->get(['id', 'informasi_singkat_bencana', 'lokasi_bencana', 'skala_bencana', 'foto_lokasi_bencana', 'updated_at', 'titik_kordinat_lokasi_bencana', 'deskripsi_terkait_data_lainya', 'jumlah_korban']);

        if ($pelaporans->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Belum ada pelaporan yang diterima.',
                'data' => []
            ], 200);
        }

        // Tambahkan URL gambar penuh
        $pelaporans->transform(function ($item) {
            if ($item->foto_lokasi_bencana) {
                $item->foto_lokasi_bencana = url('storage/' . ltrim(str_replace('storage/', '', $item->foto_lokasi_bencana), '/'));
            }
            return $item;
        });

        return response()->json([
            'status' => true,
            'message' => 'Berhasil mengambil data pelaporan diterima.',
            'data' => $pelaporans
        ], 200);
    }
}
