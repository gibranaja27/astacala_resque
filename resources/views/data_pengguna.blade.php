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
        <div class="w-44 bg-gray-400 text-black flex flex-col font-semibold">
            <div class="p-4 text-center text-xl font-bold border-b border-white-500">
                <div class="flex items-center space-x-2">
                    <!-- Ikon Profil Font Awesome -->
                    <i class="fas fa-user-circle text-7xl text-gray-600 ml-10 mt-10"></i>
                </div>
                <div class="mb-7 mt-5">
                    Admin
                </div>
            </div>
            <nav class="flex-grow mt-4">
                <ul>
                    <li>
                        <a href="/Home" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/Pelaporan" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            Data Pelaporan
                        </a>
                    </li>
                    <li>
                        <a href="#data-pelaporan"
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
        <div class="flex-grow p-6">
            <h1 class="text-3xl font-bold mb-4 text-red-600 pt-10">Data Admin</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <!-- Tabel Header -->
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="px-4 py-2 border text-left">Photo Profile</th>
                            <th class="px-4 py-2 border text-left">Username Pengguna</th>
                            <th class="px-4 py-2 border text-left">Nama Lengkap</th>
                            <th class="px-4 py-2 border text-left">Tanggal Lahir</th>
                            <th class="px-4 py-2 border text-left">Tempat Lahir</th>
                            <th class="px-4 py-2 border text-left">No Handphone</th>
                            <th class="px-4 py-2 border text-left">Password Admin</th>
                            <th class="px-4 py-2 border text-left">Aksi</th> <!-- Kolom Aksi -->
                        </tr>
                    </thead>

                    <!-- Tabel Body -->
                    <tbody>
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border">
                                <img src="path_to_image.jpg" alt="Foto Lokasi"
                                    class="w-16 h-16 object-cover rounded-md">
                            </td>
                            <td class="px-4 py-2 border">mikailsilalahi</td>
                            <td class="px-4 py-2 border">Muhammad Mikail Gabril</td>
                            <td class="px-4 py-2 border">04/05/2004</td>
                            <td class="px-4 py-2 border">Jakarta</td>
                            <td class="px-4 py-2 border">087428244743</td>
                            <td class="px-4 py-2 border">mikail123</td>
                            <td class="px-4 py-2 border text-center"> <!-- Kolom Aksi -->
                                <button
                                    class="px-4 py-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 w-24">
                                    <a href="/edit_Pelaporan">Update</a>
                                </button>
                                <button
                                    class="px-4 py-2 mb-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 w-24">Delete</button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border">
                                <img src="path_to_image.jpg" alt="Foto Lokasi"
                                    class="w-16 h-16 object-cover rounded-md">
                            </td>
                            <td class="px-4 py-2 border">mikailsilalahi</td>
                            <td class="px-4 py-2 border">Muhammad Mikail Gabril</td>
                            <td class="px-4 py-2 border">04/05/2004</td>
                            <td class="px-4 py-2 border">Jakarta</td>
                            <td class="px-4 py-2 border">087428244743</td>
                            <td class="px-4 py-2 border">mikail123</td>
                            <td class="px-4 py-2 border text-center"> <!-- Kolom Aksi -->
                                <button
                                    class="px-4 py-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 w-24">
                                    <a href="/edit_Pelaporan">Update</a>
                                </button>
                                <button
                                    class="px-4 py-2 mb-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 w-24">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
</body>

</html>
