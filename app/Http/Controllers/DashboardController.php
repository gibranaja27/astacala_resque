<?php

namespace App\Http\Controllers;

use App\Models\Pelaporan;
use App\Models\Admin;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelaporan = Pelaporan::count();
        $jumlahAdmin = Admin::count();
        $jumlahPengguna = Pengguna::count();

        return view('dashboard', compact('jumlahPelaporan', 'jumlahAdmin', 'jumlahPengguna'));
    }
}
