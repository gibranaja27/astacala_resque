<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Admin;
use App\Models\Pengguna;
use App\Models\BeritaBencana;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // fungsi yang digunakan halaman dashboard untuk membaca  dan ditampilkan dihamana dashboard
    public function index()
    {
        $jumlahPelaporan = Pelaporan::count();
        $jumlahAdmin = Admin::count();
        $jumlahPengguna = Pengguna::count();
        $data_pelaporan = Pelaporan::with('pengguna')
            ->whereIn('status_verifikasi', ['DITERIMA', 'DITOLAK'])
            ->take(10)
            ->get();

        // Ambil data berita bencana yang sudah dipublish
        $data_berita_bencana = BeritaBencana::where('is_published', 1)
            ->take(10)
            ->get();

        return view('dashboard', compact('jumlahPelaporan', 'jumlahAdmin', 'jumlahPengguna', 'data_pelaporan', 'data_berita_bencana'));
    }

    public function semuaPelaporan()
    {
        // Ambil semua data DITERIMA / DITOLAK
        $data_pelaporan = Pelaporan::with('pengguna')
            ->whereIn('status_verifikasi', ['DITERIMA', 'DITOLAK'])
            ->get();

        return view('pelaporan_semua', compact('data_pelaporan'));
    }

    public function semuaPublikasi()
    {
        // Ambil semua data DITERIMA / DITOLAK
        $data_publikasi = BeritaBencana::where('is_published', 1)
            ->get();

        return view('publikasi_semua', compact('data_publikasi'));
    }
}
