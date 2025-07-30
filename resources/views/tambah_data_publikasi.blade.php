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
                        <a href="/Home" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
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

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Judul Singkat Bencana:</label><br>
            <input type="text" name="pblk_judul_bencana"><br><br>

            <label>Lokasi Bencana:</label><br>
            <input type="text" name="pblk_lokasi_bencana"><br><br>

            <label>Titik Lokasi:</label><br>
            <input type="text" name="pblk_titik_kordinat_bencana"><br><br>

            <label>Skala Bencana:</label><br>
            <select name="pblk_skala_bencana" required>
                <option value="">-- Pilih Skala --</option>
                <option value="kecil">Kecil</option>
                <option value="sedang">Sedang</option>
                <option value="besar">Besar</option>
            </select><br><br>

            <label>Deskripsi Bencana:</label><br>
            <textarea name="deskripsi_umum"></textarea><br><br>

            <label>Upload Foto:</label><br>
            <input type="file" name="pblk_foto_bencana"><br><br>

            <label>Dibuat oleh Admin ID:</label><br>
            <input type="number" name="dibuat_oleh_admin_id"><br><br>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>

</html>
