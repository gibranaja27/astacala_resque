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
    <div class="w-48 bg-gray-400 text-black flex flex-col font-semibold">
        <div class="p-4 text-center text-xl font-bold border-b border-white-500">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil"
                    class="w-20 h-20 rounded-full mx-auto mt-10">
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
        <div class="p-4 border-t border-white text-center text-sm">&copy; 2025 Astacala Resque</div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-grow items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h1 class="text-2xl font-bold text-orange-500 mb-6">Ubah Data Admin</h1>
            <form action="/Admin/{{ $admin->id }}" method="POST" class="space-y-4">
                @method('put')
                @csrf

                <div>
                    <label class="block mb-1 text-sm font-medium">Username</label>
                    <input type="text" name="username_akun_admin" value="{{ $admin->username_akun_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-400" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap_admin" value="{{ $admin->nama_lengkap_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-400" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_admin" value="{{ $admin->tanggal_lahir_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-400" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_admin" value="{{ $admin->tempat_lahir_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-400" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">No Handphone</label>
                    <input type="text" name="no_handphone_admin" value="{{ $admin->no_handphone_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-400" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">No Anggota</label>
                    <input type="text" name="no_anggota" value="{{ $admin->no_anggota }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-400" />
                </div>

                <div>
                    <label class="block mb-1 text-sm font-medium">Password</label>
                    <input type="text" name="password_akun_admin" value="{{ $admin->password_akun_admin }}"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-orange-400" />
                </div>

                <div>
                    <button type="submit"
                        class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600 transition">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
