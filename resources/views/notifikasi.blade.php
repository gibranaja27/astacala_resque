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

        <div class="flex-1 p-10">
            <h1 class="text-2xl font-bold text-red-700 mb-8">Notifikasi Pelaporan Bencana</h1>

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
