<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-400 text-black flex flex-col font-semibold">
            <div class="p-4 text-center text-xl font-bold border-b border-white-500">
                <div class="flex items-center space-x-2">
                     <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-20 h-20 rounded-full mx-auto mt-10">
                </div>
                <div class="mb-7 mt-5">
                    Admin
                </div>
            </div>
            <nav class="flex-grow mt-4">
                <ul>
                    <li>
                        <a href="/Home" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            <i class="fas fa-home-alt mr-2"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/publikasi" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            <i class="fas fa-file-alt mr-2"></i>
                            Publikasi Bencana
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300 items-center">
                            <!-- Ikon Exit -->
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Keluar
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-white text-center text-sm">
                &copy; 2025 Astacala Resque
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow p-6">
            <h1 class="text-3xl font-bold mb-4 text-red-600 pt-10">Data Bencana</h1>
            <div class="overflow-x-auto">
                <div>
                    <a href="{{ route('berita.create') }}">Tambah Data</a>
                </div>
                <table class="min-w-full table-auto border-collapse">
                    <!-- Tabel Header -->
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="px-4 py-2 border text-left">Judul Singkat Nama Bencana</th>
                            <th class="px-4 py-2 border text-left">Lokasi Bencana</th>
                            <th class="px-4 py-2 border text-left">Titik Lokasi Bencana</th>
                            <th class="px-4 py-2 border text-left">Skala Bencana</th>
                            <th class="px-4 py-2 border text-left">Deskripsi Bencana</th>
                            <th class="px-4 py-2 border text-left">Foto Bencana</th>
                            <th class="px-4 py-2 border text-left">Dibuat Oleh Admin</th>
                            <th class="px-4 py-2 border text-left">Aksi</th>
                        </tr>
                    </thead>

                    <!-- Tabel Body -->
                    <tbody>
                        @foreach ($data as $row)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $row->pblk_judul_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->pblk_lokasi_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->pblk_titik_kordinat_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->pblk_skala_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->deskripsi_umum }}</td>
                                <td>
                                    @if ($row->pblk_foto_bencana)
                                        <img src="{{ asset('storage/' . $row->pblk_foto_bencana) }}" width="100">
                                    @else
                                        <span>Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">{{ $row->dibuat_oleh_admin_id }}</td>
                                <td>
                                    <a href="{{ route('berita.edit', $row->id) }}"
                                        class="px-4 py-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 w-24 inline-block">Edit</a>
                                    <form action="{{ route('berita.destroy', $row->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <form action="{{ route('berita.publish', $row->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-success btn-sm">Publish</button>
                                    </form>
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
