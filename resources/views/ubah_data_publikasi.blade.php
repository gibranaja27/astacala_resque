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
        <div class="w-48 bg-gray-400 text-black flex flex-col font-semibold">
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
        <form action="{{ route('berita.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label>Judul Bencana:</label>
                <input type="text" name="pblk_judul_bencana" value="{{ $data->pblk_judul_bencana }}" required>
            </div>

            <div>
                <label>Lokasi Bencana:</label>
                <input type="text" name="pblk_lokasi_bencana" value="{{ $data->pblk_lokasi_bencana }}" required>
            </div>

            <div>
                <label>Titik Koordinat:</label>
                <input type="text" name="pblk_titik_kordinat_bencana"
                    value="{{ $data->pblk_titik_kordinat_bencana }}" required>
            </div>

            <div>
                <label>Skala Bencana:</label>
                <select name="pblk_skala_bencana" required>
                    <option value="kecil" {{ $data->pblk_skala_bencana == 'kecil' ? 'selected' : '' }}>Kecil</option>
                    <option value="sedang" {{ $data->pblk_skala_bencana == 'sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="besar" {{ $data->pblk_skala_bencana == 'besar' ? 'selected' : '' }}>Besar</option>
                </select>
            </div>

            <div>
                <label>Deskripsi Umum:</label>
                <textarea name="deskripsi_umum" required>{{ $data->deskripsi_umum }}</textarea>
            </div>

            <div>
                <label>Dibuat Oleh Admin ID:</label>
                <input type="number" name="dibuat_oleh_admin_id" value="{{ $data->dibuat_oleh_admin_id }}" required>
            </div>

            <div>
                <label>Foto Bencana:</label>
                @if ($data->pblk_foto_bencana)
                    <img src="{{ asset('storage/' . $data->pblk_foto_bencana) }}" width="100">
                @endif
                <input type="file" name="pblk_foto_bencana">
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>
