<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    @php
        use App\Models\Pelaporan;
        $jumlah_notifikasi = Pelaporan::where('status_notifikasi', false)->count();
    @endphp

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
                            class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Keluar
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

            <h1 class="text-3xl font-bold text-gray-800">Welcome to the dashboard admin :)</h1>

            <div class="grid grid-cols-3 gap-4 mt-14">
                <div class="bg-cyan-500 text-white rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="text-5xl">1</div>
                        <div class="ml-4">
                            <h2 class="text-lg">Data Pelaporan</h2>
                            <a href="/pelaporan" class="hover:underline">More Info ></a>
                        </div>
                    </div>
                </div>
                <div class="bg-red-500 text-white rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="text-5xl">3</div>
                        <div class="ml-4">
                            <h2 class="text-lg">Admin</h2>
                            <a href="/Dataadmin" class="hover:underline">More Info ></a>
                        </div>
                    </div>
                </div>
                <div class="bg-green-500 text-white rounded-lg p-6">
                    <div class="flex items-center">
                        <div class="text-5xl">1</div>
                        <div class="ml-4">
                            <h2 class="text-lg">Pengguna</h2>
                            <a href="/Datapengguna" class="hover:underline">More Info ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
