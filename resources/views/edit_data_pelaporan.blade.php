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
            <h1 class="text-3xl font-bold mb-4 text-red-600 pt-10">Edit Data Pelaporan</h1>
            <div class="flex items-center justify-center min-h-screen bg-gray-100">
                <div class="w-full max-w-4xl p-6 bg-white rounded-lg shadow-lg">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-6">Form Update Data</h2>
                    <form action="#" method="POST" class="space-y-4">
                        <!-- Nama Team Relawan -->
                        <div>
                            <label for="team_name" class="block text-sm font-medium text-gray-700">Nama Team
                                Relawan</label>
                            <input type="text" id="team_name" name="team_name"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan nama tim relawan">
                        </div>

                        <!-- Jumlah Personel -->
                        <div>
                            <label for="personnel_count" class="block text-sm font-medium text-gray-700">Jumlah
                                Personel</label>
                            <input type="number" id="personnel_count" name="personnel_count"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan jumlah personel">
                        </div>

                        <!-- No Telepon -->
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">No Telepon</label>
                            <input type="tel" id="phone_number" name="phone_number"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan no telepon">
                        </div>

                        <!-- Informasi Singkat Nama Bencana -->
                        <div>
                            <label for="disaster_info" class="block text-sm font-medium text-gray-700">Informasi Singkat
                                Nama Bencana</label>
                            <input type="text" id="disaster_info" name="disaster_info"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan informasi singkat bencana">
                        </div>

                        <!-- Lokasi Bencana -->
                        <div>
                            <label for="disaster_location" class="block text-sm font-medium text-gray-700">Lokasi
                                Bencana</label>
                            <input type="text" id="disaster_location" name="disaster_location"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan lokasi bencana">
                        </div>

                        <!-- Foto Lokasi Bencana -->
                        <div>
                            <label for="disaster_photo" class="block text-sm font-medium text-gray-700">Foto Lokasi
                                Bencana</label>
                            <input type="file" id="disaster_photo" name="disaster_photo"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Titik Lokasi Bencana -->
                        <div>
                            <label for="disaster_coordinates" class="block text-sm font-medium text-gray-700">Titik
                                Lokasi Bencana</label>
                            <input type="text" id="disaster_coordinates" name="disaster_coordinates"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Contoh: -7.12345, 112.67890">
                        </div>

                        <!-- Kondisi Lokasi Bencana -->
                        <div>
                            <label for="disaster_condition" class="block text-sm font-medium text-gray-700">Kondisi
                                Lokasi Bencana</label>
                            <select id="disaster_condition" name="disaster_condition"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <option value="Parah">Parah</option>
                                <option value="Sedang">Sedang</option>
                                <option value="Ringan">Ringan</option>
                            </select>
                        </div>

                        <!-- Jumlah Korban -->
                        <div>
                            <label for="victim_count" class="block text-sm font-medium text-gray-700">Jumlah
                                Korban</label>
                            <input type="text" id="victim_count" name="victim_count"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan jumlah korban">
                        </div>

                        <!-- Deskripsi Terkait Data Lainnya -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Terkait
                                Data Lainnya</label>
                            <textarea id="description" name="description" rows="4"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan deskripsi terkait data lainnya"></textarea>
                        </div>

                        <!-- Tombol Update -->
                        <div class="text-right">
                            <button type="submit"
                                class="px-6 py-2 bg-red-500 text-white rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</body>

</html>
