<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dearflip/dist/jquery.dearflip.min.css">
    <script src="https://cdn.jsdelivr.net/npm/dearflip/dist/jquery.dearflip.min.js"></script>
</head>

<body class="bg-gray-100">
    @php
        use App\Models\Pelaporan;
        $jumlah_notifikasi = Pelaporan::where('status_notifikasi', false)->count();
    @endphp

    <div class="flex h-screen">

        <!-- Sidebar -->
        <div class="w-60 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold fixed top-0 left-0"
            x-data="{ openPublikasi: false }">
            <!-- Logo & Profil -->
            <div class="p-4 text-center border-b">
                <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-28 h-28 mx-auto">
            </div>

            <!-- Nav -->
            <nav class="flex-grow">
                <ul class="mt-6 space-y-1">
                    <!-- Home -->
                    <li>
                        <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                            <i class="fas fa-home-alt mr-2 text-3xl pr-5"></i>
                            <span>Menu Utama</span>
                        </a>
                    </li>

                    <!-- Logout -->
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                            <i class="fas fa-sign-out-alt mr-2 text-red-700 text-3xl pr-5"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Footer -->
            <div class="p-4 border-t text-center text-xs text-gray-500">
                &copy; 2025 Astacala Rescue
            </div>
        </div>

        <!-- Alpine.js CDN (untuk dropdown) -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


        <!-- Main Content -->
        <div class="flex-grow p-6 ml-60">
            <div class="flex justify-end mb-4">
                <!-- Tombol Notifikasi -->
                <a href="{{ route('pelaporan.notifikasi') }}"
                    class="relative inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    <i class="fas fa-bell mr-2"></i> Notifikasi
                    @if ($jumlah_notifikasi > 0)
                        <span
                            class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-yellow-500 rounded-full">
                            {{ $jumlah_notifikasi }}
                        </span>
                    @endif
                </a>
                <!-- Tombol Profil -->
                <a href="{{ route('profil.admin') }}"
                    class="inline-flex items-center px-8 py-2 ml-5 bg-gray-600 text-white rounded hover:bg-gray-700">
                    <i class="fas fa-user mr-2"></i> Profil
                </a>
            </div>

            <div class="grid grid-cols-3 gap-4 mt-14">
                <div class="bg-cyan-500 text-white rounded-lg p-6 shadow-xl">
                    <div class="flex items-center">
                        <div class="text-5xl">{{ $jumlahPelaporan }}</div>
                        <div class="ml-4">
                            <h2 class="text-lg">Data Pelaporan</h2>
                            <a href="/pelaporan" class="hover:underline">More Info ></a>
                        </div>
                    </div>
                </div>
                <div class="bg-red-500 text-white rounded-lg p-6 shadow-xl">
                    <div class="flex items-center">
                        <div class="text-5xl">{{ $jumlahAdmin }}</div>
                        <div class="ml-4">
                            <h2 class="text-lg">Admin</h2>
                            <a href="/Dataadmin" class="hover:underline">More Info ></a>
                        </div>
                    </div>
                </div>
                <div class="bg-green-500 text-white rounded-lg p-6 shadow-xl">
                    <div class="flex items-center">
                        <div class="text-5xl">{{ $jumlahPengguna }}</div>
                        <div class="ml-4">
                            <h2 class="text-lg">Pengguna</h2>
                            <a href="/Datapengguna" class="hover:underline">More Info ></a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- membaca data table pelaporans --}}
            <div class="mt-28">
                <h1 class="text-3xl font-semibold text-gray-600 text-center">Data Pelaporan Terverifikasi & Terpublikasi
                </h1>
            </div>

            <div class="overflow-x-auto rounded-xl shadow-lg mt-12">
                <table
                    class="min-w-full bg-white border border-gray-200 text-sm text-center rounded-xl overflow-hidden">
                    <thead class="bg-gradient-to-r from-red-700 to-red-700 text-white">
                        <tr>
                            <th class="px-4 py-3 border">Username Pelapor</th>
                            <th class="px-4 py-3 border">Nama Tim</th>
                            <th class="px-4 py-3 border">Jumlah Personel</th>
                            <th class="px-4 py-3 border">No HP</th>
                            <th class="px-4 py-3 border">Informasi Singkat</th>
                            <th class="px-4 py-3 border">Lokasi</th>
                            <th class="px-4 py-3 border">Koordinat</th>
                            <th class="px-4 py-3 border">Skala</th>
                            <th class="px-4 py-3 border">Jumlah Korban</th>
                            <th class="px-4 py-3 border">Deskripsi</th>
                            <th class="px-4 py-3 border">Foto Lokasi</th>
                            <th class="px-4 py-3 border">Bukti Tugas</th>
                            <th class="px-4 py-3 border">Status Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($data_pelaporan as $pelaporan)
                            <tr class="hover:bg-red-50 transition">
                                <td class="border px-4 py-2 font-medium text-gray-700">
                                    {{ $pelaporan->pengguna->username_akun_pengguna ?? 'Tidak ada username' }}
                                </td>
                                <td class="border px-4 py-2">{{ $pelaporan->nama_team_pelapor }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->jumlah_personel }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->no_handphone }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->informasi_singkat_bencana }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->lokasi_bencana }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->titik_kordinat_lokasi_bencana }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->skala_bencana }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->jumlah_korban }}</td>
                                <td class="border px-4 py-2">{{ $pelaporan->deskripsi_terkait_data_lainya }}</td>
                                <td class="border px-4 py-2">
                                    @if ($pelaporan->foto_lokasi_bencana)
                                        <img src="{{ asset('storage/' . $pelaporan->foto_lokasi_bencana) }}"
                                            alt="Foto Lokasi"
                                            class="w-20 h-20 object-cover rounded-lg shadow-md border">
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    @if ($pelaporan->bukti_surat_perintah_tugas)
                                        <a href="{{ asset('storage/' . $pelaporan->bukti_surat_perintah_tugas) }}"
                                            target="_blank"
                                            class="text-gray-600 hover:text-gray-900 underline font-medium">
                                            Lihat File
                                        </a>
                                    @else
                                        <span class="text-gray-500 italic">Tidak ada file</span>
                                    @endif
                                </td>
                                <td
                                    class="border px-4 py-2 font-semibold
    {{ $pelaporan->status_verifikasi === 'DITERIMA' ? 'text-green-600' : ($pelaporan->status_verifikasi === 'DITOLAK' ? 'text-red-600' : 'text-gray-600') }}">
                                    {{ $pelaporan->status_verifikasi }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex justify-start mt-8">
                <a href="{{ route('pelaporan.terverifikasi') }}"
                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Lihat Secukupnya.
                </a>
            </div>
        </div>

    </div>
</body>

</html>
