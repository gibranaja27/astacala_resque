<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Publikasi Bencana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <!-- Sidebar -->
        <div class="w-48 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold"
            x-data="{ openPublikasi: false }">
            <!-- Logo & Profil -->
            <div class="p-4 text-center border-b">
                <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-16 h-16 mx-auto">
                <p class="mt-2 text-sm">Admin</p>
            </div>

            <!-- Nav -->
            <nav class="flex-grow">
                <ul class="mt-6 space-y-1">
                    <!-- Home -->
                    <li>
                        <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                            <i class="fas fa-home-alt mr-2"></i>
                            <span>Menu Utama</span>
                        </a>
                    </li>

                    <!-- Publikasi -->
                    <li>
                        <button @click="openPublikasi = !openPublikasi"
                            class="flex justify-between items-center w-full px-4 py-3 hover:bg-gray-100 transition">
                            <div class="flex items-center">
                                <i class="fas fa-database mr-2"></i>
                                <span>Publikasi</span>
                            </div>
                            <i :class="openPublikasi ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                        </button>

                        <!-- Dropdown -->
                        <ul x-show="openPublikasi" x-transition class="ml-8 mt-1 space-y-1">
                            <li>
                                <a href="/publikasi" class="block px-4 py-2 text-sm hover:bg-gray-100 rounded">
                                    - Publikasi Berita
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 rounded">
                                    - Forum Diskusi
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Logout -->
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                            <i class="fas fa-sign-out-alt mr-2"></i>
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

        <!-- Alpine.js -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


        <!-- Main Content -->
        <div class="flex-grow p-6">
            <h1 class="text-4xl font-bold text-center font-sansz mt-5">Data Publikasi Bencana</h1>

            <!-- Tombol Tambah Data -->
            <div class="mb-4 mt-16">
                <a href="{{ route('berita.create') }}"
                    class="inline-flex items-center px-5 py-2 bg-red-700 text-white rounded hover:bg-red-900 transition duration-300">
                    <i class="fas fa-plus mr-2"></i> Tambah Data
                </a>
            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="px-4 py-2 border">Judul Singkat</th>
                            <th class="px-4 py-2 border">Lokasi</th>
                            <th class="px-4 py-2 border">Koordinat</th>
                            <th class="px-4 py-2 border">Skala</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Foto</th>
                            <th class="px-4 py-2 border">Dibuat Oleh</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $row->pblk_judul_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->pblk_lokasi_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->pblk_titik_kordinat_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->pblk_skala_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->deskripsi_umum }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($row->pblk_foto_bencana)
                                        <img src="{{ asset('storage/' . $row->pblk_foto_bencana) }}" width="100" />
                                    @else
                                        <span>Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">{{ $row->dibuat_oleh_admin_id }}</td>
                                <td class="px-4 py-2 border text-center">
                                    <div class="flex flex-col items-center space-y-2">
                                        <a href="{{ route('berita.edit', $row->id) }}"
                                            class="w-24 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('berita.destroy', $row->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="w-24 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                                        </form>
                                        <form action="{{ route('berita.publish', $row->id) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="w-24 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Publish</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
