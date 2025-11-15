<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ubah Data Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex h-screen">

    <!-- Sidebar -->
    <!-- Sidebar -->
    <div class="w-60 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold fixed top-0 left-0"
        x-data="{ openPublikasi: false }">
        <!-- Logo & Profil -->
        <div class="p-4 text-center border-b">
            <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-28 h-28 mx-auto">
        </div>

        <!-- Nav -->
        <nav class="flex-grow">
            <ul class="mt-6 space-y-1">
                <!-- Home -->
                <li>
                    <a href="/dashboard" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                        <i class="fas fa-home-alt mr-2 text-3xl pr-5"></i>
                        <span>Menu Utama</span>
                    </a>
                </li>

                <!-- Logout -->
                <li>
                    <a href="{{ route('logout') }}" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                        <i class="fas fa-sign-out-alt mr-2 text-red-700 text-3xl pr-5"></i>
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
    <div class="flex flex-grow items-center justify-center ml-60">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl text-center font-bold text-red-500 mb-6">Ubah Data Admin</h1>
            <form action="/Admin/{{ $admin->id }}" method="POST" class="space-y-4">
                @method('put')
                @csrf

                <div>
                    <label class="block mb-1 text-sm font-medium">Username</label>
                    <input type="text" name="username_akun_admin" value="{{ $admin->username_akun_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap_admin" value="{{ $admin->nama_lengkap_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_admin" value="{{ $admin->tanggal_lahir_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_admin" value="{{ $admin->tempat_lahir_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">No Handphone</label>
                    <input type="text" name="no_handphone_admin" value="{{ $admin->no_handphone_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">No Anggota</label>
                    <input type="text" name="no_anggota" value="{{ $admin->no_anggota }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Password</label>
                    <input type="text" name="password_akun_admin" value="{{ $admin->password_akun_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-red-700" />
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
