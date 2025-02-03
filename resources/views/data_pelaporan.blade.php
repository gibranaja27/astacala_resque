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
            <h1 class="text-3xl font-bold mb-4 text-red-600 pt-10">Data Pelaporan</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                  <!-- Tabel Header -->
                  <thead class="bg-gray-200 text-gray-600">
                    <tr>
                      <th class="px-4 py-2 border text-left">NO</th>
                      <th class="px-4 py-2 border text-left">Nama Team Relawan</th>
                      <th class="px-4 py-2 border text-left">Jumlah Personel</th>
                      <th class="px-4 py-2 border text-left">No Telepon</th>
                      <th class="px-4 py-2 border text-left">Informasi Singkat Nama Bencana</th>
                      <th class="px-4 py-2 border text-left">Lokasi Bencana</th>
                      <th class="px-4 py-2 border text-left">Foto Lokasi Bencana</th>
                      <th class="px-4 py-2 border text-left">Titik Lokasi Bencana</th>
                      <th class="px-4 py-2 border text-left">Kondisi Lokasi Bencana</th>
                      <th class="px-4 py-2 border text-left">Jumlah Korban</th>
                      <th class="px-4 py-2 border text-left">Deskripsi Terkait Data Lainnya</th>
                      <th class="px-4 py-2 border text-left">Aksi</th> <!-- Kolom Aksi -->
                    </tr>
                  </thead>
              
                  <!-- Tabel Body -->
                  <tbody>
                    <tr class="hover:bg-gray-100">
                      <td class="px-4 py-2 border">1</td>
                      <td class="px-4 py-2 border">Tim A</td>
                      <td class="px-4 py-2 border">20</td>
                      <td class="px-4 py-2 border">081234567890</td>
                      <td class="px-4 py-2 border">Banjir Bandang</td>
                      <td class="px-4 py-2 border">Desa ABC</td>
                      <td class="px-4 py-2 border">
                        <img src="path_to_image.jpg" alt="Foto Lokasi" class="w-16 h-16 object-cover rounded-md">
                      </td>
                      <td class="px-4 py-2 border">-7.12345, 112.67890</td>
                      <td class="px-4 py-2 border">Parah</td>
                      <td class="px-4 py-2 border">15</td>
                      <td class="px-4 py-2 border">Bencana alam ini menyebabkan banyak kerusakan di desa ABC, termasuk rumah dan infrastruktur.</td>
                      <td class="px-4 py-2 border text-center"> <!-- Kolom Aksi -->
                        <button class="px-4 py-2 mb-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-24">Upload</button>
                        <button class="px-4 py-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 w-24">
                            <a href="/edit_Pelaporan">Update</a>
                        </button>
                        <button class="px-4 py-2 mb-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 w-24">Delete</button>
                      </td>
                    </tr>
              
                    <tr class="hover:bg-gray-100">
                      <td class="px-4 py-2 border">2</td>
                      <td class="px-4 py-2 border">Tim B</td>
                      <td class="px-4 py-2 border">15</td>
                      <td class="px-4 py-2 border">082345678901</td>
                      <td class="px-4 py-2 border">Gempa Bumi</td>
                      <td class="px-4 py-2 border">Kota XYZ</td>
                      <td class="px-4 py-2 border">
                        <img src="path_to_image.jpg" alt="Foto Lokasi" class="w-16 h-16 object-cover rounded-md">
                      </td>
                      <td class="px-4 py-2 border">-8.23456, 112.34567</td>
                      <td class="px-4 py-2 border">Parah</td>
                      <td class="px-4 py-2 border">30</td>
                      <td class="px-4 py-2 border">Gempa bumi ini merusak banyak bangunan di kota XYZ dan menyebabkan banyak korban jiwa.</td>
                      <td class="px-4 py-2 border text-center">
                        <button class="px-4 py-2 pb-2 mb-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 w-24">Upload</button>
                        <button class="px-4 py-2 pb-2 mb-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50 w-24">
                            <a href="/edit_Pelaporan">Update</a>
                        </button>
                        <button class="px-4 py-2 pb-2 mb-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 w-24">Delete</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              

        </div>
    </div>
</body>

</html>
