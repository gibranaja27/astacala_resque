<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Data Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
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
                        <a href="{{ route('logout') }}"
                            class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
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
        <div class="flex-grow p-6 ml-60">
            <h1 class="text-4xl font-bold text-center font-sansz mt-5">Data Pengguna</h1>
            <div class="overflow-x-auto mt-16">
                <table class="min-w-full bg-white border border-gray-300">
                    <!-- Tabel Header -->
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="px-4 py-2 border">Username Pengguna</th>
                            <th class="px-4 py-2 border">Nama Lengkap</th>
                            <th class="px-4 py-2 border">Tanggal Lahir</th>
                            <th class="px-4 py-2 border">Tempat Lahir</th>
                            <th class="px-4 py-2 border">No Handphone</th>
                            <th class="px-4 py-2 border">Password Pengguna</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>

                    <!-- Tabel Body -->
                    <tbody>
                        @foreach ($data_pengguna as $penggun)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">{{ $penggun->username_akun_pengguna }}</td>
                                <td class="px-4 py-2 border">{{ $penggun->nama_lengkap_pengguna }}</td>
                                <td class="px-4 py-2 border">{{ $penggun->tanggal_lahir_pengguna }}</td>
                                <td class="px-4 py-2 border">{{ $penggun->tempat_lahir_pengguna }}</td>
                                <td class="px-4 py-2 border">{{ $penggun->no_handphone_pengguna }}</td>
                                <td class="px-4 py-2 border">{{ $penggun->password_akun_pengguna }}</td>
                                <td class="px-4 py-2 border text-center flex flex-col items-center space-y-2">
                                    <a href="/Pengguna/{{ $penggun->id }}/ubahpenggun" onclick="return confirmUpdate()"
                                        class="px-4 py-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 inline-block">
                                        Update
                                    </a>
                                    <form action="{{ url('/hapus_pengguna/' . $penggun->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirmDelete()"
                                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmUpdate() {
            return confirm("Apakah Anda yakin ingin mengedit data pengguna ini?");
        }

        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data pengguna ini?");
        }
    </script>
</body>

</html>
