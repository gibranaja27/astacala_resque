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

        <div class="flex-1 p-10">
            <h1 class="text-2xl font-bold text-red-700 mb-8 flex justify-center">Notifikasi Pelaporan Bencana</h1>

            <div class="space-y-6">
                @foreach ($data as $item)
                    <div class="flex justify-between items-center border-b pb-4">
                        <div>
                            <h2 class="text-lg font-semibold capitalize">{{ $item->nama_team_pelapor }}</h2>
                            <p class="text-sm text-gray-600 font-bold">{{ $item->informasi_singkat_bencana }}</p>
                            <p class="text-sm">Lokasi: {{ $item->lokasi_bencana }}</p>
                            <p class="text-sm">Koordinat: {{ $item->titik_kordinat_lokasi_bencana }}</p>
                            <p class="text-xs text-gray-500">
                                Waktu: {{ $item->created_at ? $item->created_at->format('d M Y H:i') : '-' }}
                            </p>
                            <p class="text-xs text-red-600">
                                {{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}
                            </p>
                        </div>
                        <div class="flex flex-col items-center">
                            <i class="fas fa-bell text-red-700 text-3xl mb-2"></i>
                            <a href="#"
                                class="bg-red-700 text-white py-1 px-4 rounded hover:bg-red-800">Detail</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
