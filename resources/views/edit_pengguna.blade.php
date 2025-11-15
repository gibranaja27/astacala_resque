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
        <div class="w-60 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold fixed top-0 left-0"
            x-data="{ openPublikasi: false }">
            <!-- Logo & Profil -->
            <div class="p-4 text-center border-b">
                <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-28 h-28 mx-auto">
            </div>

            <!-- Sidebar -->
            <div class="w-60 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold fixed top-0 left-0"
                x-data="{ openPublikasi: false }">
                <!-- Logo & Profil -->
                <div class="p-4 text-center border-b">
                    <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil"
                        class="w-28 h-28 mx-auto">
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
                <h1 class="text-3xl font-bold mb-4 text-red-600 pt-10">Data Admin</h1>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <!-- Tabel Header -->
                        <thead class="bg-gray-200 text-gray-600">
                            <tr>
                                <th class="px-4 py-2 border text-left">Username Admin</th>
                                <th class="px-4 py-2 border text-left">Nama Lengkap</th>
                                <th class="px-4 py-2 border text-left">Tanggal Lahir</th>
                                <th class="px-4 py-2 border text-left">Tempat Lahir</th>
                                <th class="px-4 py-2 border text-left">No Handphone</th>
                                <th class="px-4 py-2 border text-left">No Aanggota</th>
                                <th class="px-4 py-2 border text-left">Password Admin</th>
                                <th class="px-4 py-2 border text-left">Aksi</th> <!-- Kolom Aksi -->
                            </tr>
                        </thead>

                        <!-- Tabel Body -->
                        <tbody>
                            @foreach ($data_admin as $admi)
                                <tr class="hover:bg-gray-100">
                                    <td class="px-4 py-2 border">{{ $admi->username_akun_admin }}</td>
                                    <td class="px-4 py-2 border">{{ $admi->nama_lengkap_admin }}</td>
                                    <td class="px-4 py-2 border">{{ $admi->tanggal_lahir_admin }}</td>
                                    <td class="px-4 py-2 border">{{ $admi->tempat_lahir_admin }}</td>
                                    <td class="px-4 py-2 border">{{ $admi->no_handphone_admin }}</td>
                                    <td class="px-4 py-2 border">{{ $admi->no_anggota }}</td>
                                    <td class="px-4 py-2 border">{{ $admi->password_akun_admin }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <a href="/edit_pengguna/{{ $admi->id }}" onclick="return confirmUpdate()"
                                            class="px-4 py-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 w-24 inline-block">Update</a>
                                        <form action="/hapus_pengguna/{{ $admi->id }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirmDelete()"
                                                class="px-4 py-2 mb-2 bg-red-500 text-white rounded hover:bg-red-600 w-24">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
</body>
<script>
    function confirmUpdate() {
        return confirm("Apakah Anda yakin ingin mengedit data pelaporan ini ?")
    }

    function confirmDelete() {
        return confirm("Apakah Anda Ingin Menghapus Data Pelaporan Ini ?")
    }
</script>

</html>
