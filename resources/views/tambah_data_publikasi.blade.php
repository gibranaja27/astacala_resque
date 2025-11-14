<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Publikasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex h-screen">

    <!-- Sidebar -->
    <div class="w-60 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold fixed top-0 left-0" x-data="{ openPublikasi: false }">
        <div class="p-4 text-center border-b">
            <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-16 h-16 mx-auto">
            <p class="mt-2 text-sm">Admin</p>
        </div>

        <nav class="flex-grow">
            <ul class="mt-6 space-y-1">
                <li>
                    <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                        <i class="fas fa-home-alt mr-2"></i>
                        <span>Menu Utama</span>
                    </a>
                </li>
                <li>
                    <button @click="openPublikasi = !openPublikasi"
                        class="flex justify-between items-center w-full px-4 py-3 hover:bg-gray-100 transition">
                        <div class="flex items-center">
                            <i class="fas fa-database mr-2"></i>
                            <span>Publikasi</span>
                        </div>
                        <i :class="openPublikasi ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                    </button>
                    <ul x-show="openPublikasi" x-transition class="ml-8 mt-1 space-y-1">
                        <li><a href="/publikasi" class="block px-4 py-2 text-sm hover:bg-gray-100 rounded">- Publikasi Berita</a></li>
                        <li><a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 rounded">- Forum Diskusi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="p-4 border-t text-center text-xs text-gray-500">
            &copy; 2025 Astacala Rescue
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Main Content -->
    <div class="flex flex-grow items-center justify-center ml-60">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl text-center font-bold text-red-500 mb-6">Tambah Publikasi Bencana</h1>
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block mb-1 text-sm font-medium">Judul Singkat Bencana</label>
                    <input type="text" name="pblk_judul_bencana"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Lokasi Bencana</label>
                    <input type="text" name="pblk_lokasi_bencana"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Titik Lokasi (Koordinat)</label>
                    <input type="text" name="pblk_titik_kordinat_bencana"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Skala Bencana</label>
                    <select name="pblk_skala_bencana" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
                        <option value="">-- Pilih Skala --</option>
                        <option value="kecil">Kecil</option>
                        <option value="sedang">Sedang</option>
                        <option value="besar">Besar</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Deskripsi Bencana</label>
                    <textarea name="deskripsi_umum"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700"></textarea>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Upload Foto</label>
                    <input type="file" name="pblk_foto_bencana"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">ID Admin Pembuat</label>
                    <input type="number" name="dibuat_oleh_admin_id"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-600 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
