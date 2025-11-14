<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ubah Data Publikasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 flex h-screen">

    <!-- Sidebar -->
    <div class="w-60 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold fixed top-0 left-0"
        x-data="{ openPublikasi: false }">
        <!-- Logo & Profil -->
        <div class="p-4 text-center border-b">
            <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-16 h-16 mx-auto" />
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
                            <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 rounded">- Forum
                                Diskusi</a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li>
                    <a href="{{ route('logout') }}" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Footer -->
        <div class="p-4 border-t text-center text-xs text-gray-500">&copy; 2025 Astacala Rescue</div>
    </div>

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Main Content -->
    <div class="flex flex-grow items-center justify-center ml-60">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl text-center font-bold text-red-500 mb-6">Ubah Data Publikasi</h1>

            <form action="{{ route('berita.update', $data->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block mb-1 text-sm font-medium">Judul Bencana:</label>
                    <input type="text" name="pblk_judul_bencana" value="{{ $data->pblk_judul_bencana }}" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Lokasi Bencana:</label>
                    <input type="text" name="pblk_lokasi_bencana" value="{{ $data->pblk_lokasi_bencana }}" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Titik Koordinat:</label>
                    <input type="text" name="pblk_titik_kordinat_bencana"
                        value="{{ $data->pblk_titik_kordinat_bencana }}" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Skala Bencana:</label>
                    <select name="pblk_skala_bencana" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700">
                        <option value="kecil" {{ $data->pblk_skala_bencana == 'kecil' ? 'selected' : '' }}>Kecil
                        </option>
                        <option value="sedang" {{ $data->pblk_skala_bencana == 'sedang' ? 'selected' : '' }}>Sedang
                        </option>
                        <option value="besar" {{ $data->pblk_skala_bencana == 'besar' ? 'selected' : '' }}>Besar
                        </option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Deskripsi Umum:</label>
                    <textarea name="deskripsi_umum" required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" rows="4">{{ $data->deskripsi_umum }}</textarea>
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Dibuat Oleh Admin ID:</label>
                    <input type="number" name="dibuat_oleh_admin_id" value="{{ $data->dibuat_oleh_admin_id }}"
                        required
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Foto Bencana:</label>
                    @if ($data->pblk_foto_bencana)
                        <img src="{{ asset('storage/' . $data->pblk_foto_bencana) }}" alt="Foto Bencana"
                            class="mb-2 w-24 rounded" />
                    @endif
                    <input type="file" name="pblk_foto_bencana"
                        class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                               file:rounded file:border-0
                               file:text-sm file:font-semibold
                               file:bg-red-700 file:text-white
                               hover:file:bg-red-600
                               focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                        class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-600 transition">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
