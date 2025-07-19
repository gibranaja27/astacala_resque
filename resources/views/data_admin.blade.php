<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-48 bg-gray-400 text-black flex flex-col font-semibold">
            <div class="p-4 text-center text-xl font-bold border-b border-white-500">
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil"
                        class="w-20 h-20 rounded-full mx-auto mt-10">
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
            <h1 class="text-4xl font-bold text-center font-sansz mt-5">Data Admin</h1>
            <div class="overflow-x-auto mt-16">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="border px-4 py-2">Username Admin</th>
                            <th class="border px-4 py-2">Nama Lengkap</th>
                            <th class="border px-4 py-2">Tanggal Lahir</th>
                            <th class="border px-4 py-2">Tempat Lahir</th>
                            <th class="border px-4 py-2">No Handphone</th>
                            <th class="border px-4 py-2">No Anggota</th>
                            <th class="border px-4 py-2">Password Admin</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_admin as $admi)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $admi->username_akun_admin }}</td>
                                <td class="border px-4 py-2">{{ $admi->nama_lengkap_admin }}</td>
                                <td class="border px-4 py-2">{{ $admi->tanggal_lahir_admin }}</td>
                                <td class="border px-4 py-2">{{ $admi->tempat_lahir_admin }}</td>
                                <td class="border px-4 py-2">{{ $admi->no_handphone_admin }}</td>
                                <td class="border px-4 py-2">{{ $admi->no_anggota }}</td>
                                <td class="border px-4 py-2">{{ $admi->password_akun_admin }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <div class="flex flex-col items-center space-y-2">
                                        <a href="/Admin/{{ $admi->id }}/ubahadmin" onclick="return confirmUpdate()"
                                            class="px-4 py-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 inline-block">
                                            Update
                                        </a>
                                        <form action="{{ url('/hapus_admin/' . $admi->id) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirmDelete()"
                                                class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 inline-block">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
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
            return confirm("Apakah Anda yakin ingin mengedit data admin ini?");
        }

        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus data admin ini?");
        }
    </script>
</body>

</html>
