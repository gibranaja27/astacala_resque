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
        <div class="w-60 bg-gray-400 text-black flex flex-col font-semibold">
            <div class="p-4 text-center text-xl font-bold border-b border-white-500">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil"
                        class="w-20 h-20 rounded-full mx-auto mt-10" />
                </div>
                <div class="mb-7 mt-5">Admin</div>
            </div>
            <nav class="flex-grow mt-4">
                <ul>
                    <li>
                        <a href="/Home" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            <i class="fas fa-home-alt mr-2"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="/publikasi" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            <i class="fas fa-file-alt mr-2"></i> Publikasi Bencana
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-white text-center text-sm">
                &copy; 2025 Astacala Rescue
            </div>
        </div>

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
