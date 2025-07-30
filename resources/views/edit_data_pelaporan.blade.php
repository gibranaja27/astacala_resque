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
        <div class="w-48 bg-white text-black flex flex-col h-screen border-r shadow-md font-semibold"
            x-data="{ openPublikasi: false }">
            <!-- Logo & Profil -->
            <div class="p-4 text-center border-b">
                <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-16 h-16 mx-auto">
                <p class="mt-2 text-sm">Admin</p>
            </div>

            <!-- Nav -->
            <nav class="flex-grow">
                <ul class="mt-6 space-y-1">
                    <!-- Home -->
                    <li>
                        <a href="/Home" class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                            <i class="fas fa-home-alt mr-2"></i>
                            <span>Menu Utama</span>
                        </a>
                    </li>

                    <!-- Publikasi -->
                    <li>
                        <button @click="openPublikasi = !openPublikasi"
                            class="flex justify-between items-center w-full px-4 py-3 hover:bg-gray-100 transition">
                            <div class="flex items-center">
                                <i class="fas fa-database mr-2"></i>
                                <span>Publikasi</span>
                            </div>
                            <i :class="openPublikasi ? 'fas fa-chevron-up' : 'fas fa-chevron-down'"></i>
                        </button>

                        <!-- Dropdown -->
                        <ul x-show="openPublikasi" x-transition class="ml-8 mt-1 space-y-1">
                            <li>
                                <a href="/publikasi" class="block px-4 py-2 text-sm hover:bg-gray-100 rounded">
                                    - Publikasi Berita
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100 rounded">
                                    - Forum Diskusi
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Logout -->
                    <li>
                        <a href="{{ route('logout') }}"
                            class="flex items-center px-4 py-3 hover:bg-gray-100 transition">
                            <i class="fas fa-sign-out-alt mr-2"></i>
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
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Edit Pelaporan</h1>

            <form action="{{ route('pelaporan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label>Nama Tim</label>
                    <input type="text" name="nama_team_pelapor" value="{{ $data->nama_team_pelapor }}"
                        class="w-full p-2 border">
                </div>

                <div class="mb-4">
                    <label>Jumlah Personel</label>
                    <input type="number" name="jumlah_personel" value="{{ $data->jumlah_personel }}"
                        class="w-full p-2 border">
                </div>

                <div class="mb-4">
                    <label>No Handphone</label>
                    <input type="text" name="no_handphone" value="{{ $data->no_handphone }}"
                        class="w-full p-2 border">
                </div>

                <div class="mb-4">
                    <label>Informasi Singkat</label>
                    <input type="text" name="informasi_singkat_bencana"
                        value="{{ $data->informasi_singkat_bencana }}" class="w-full p-2 border">
                </div>

                <div class="mb-4">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi_bencana" value="{{ $data->lokasi_bencana }}"
                        class="w-full p-2 border">
                </div>

                <div class="mb-4">
                    <label>Koordinat</label>
                    <input type="text" name="titik_kordinat_lokasi_bencana"
                        value="{{ $data->titik_kordinat_lokasi_bencana }}" class="w-full p-2 border">
                </div>

                <div class="mb-4">
                    <label>Skala Bencana</label>
                    <select name="skala_bencana" class="w-full p-2 border">
                        <option value="kecil" {{ $data->skala_bencana == 'kecil' ? 'selected' : '' }}>Kecil</option>
                        <option value="sedang" {{ $data->skala_bencana == 'sedang' ? 'selected' : '' }}>Sedang</option>
                        <option value="besar" {{ $data->skala_bencana == 'besar' ? 'selected' : '' }}>Besar</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label>Jumlah Korban</label>
                    <input type="number" name="jumlah_korban" value="{{ $data->jumlah_korban }}"
                        class="w-full p-2 border">
                </div>

                <div class="mb-4">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi_terkait_data_lainya" class="w-full p-2 border">{{ $data->deskripsi_terkait_data_lainya }}</textarea>
                </div>

                <div class="mb-4">
                    <label>Foto Lokasi</label>
                    @if ($data->foto_lokasi_bencana)
                        <img src="{{ asset('storage/' . $data->foto_lokasi_bencana) }}" width="100">
                    @endif
                    <input type="file" name="foto_lokasi_bencana" class="w-full">
                </div>

                <div class="mb-4">
                    <label>Bukti Surat Tugas</label>
                    @if ($data->bukti_surat_perintah_tugas)
                        <a href="{{ asset('storage/' . $data->bukti_surat_perintah_tugas) }}" target="_blank">Lihat
                            File</a>
                    @endif
                    <input type="file" name="bukti_surat_perintah_tugas" class="w-full">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2">Simpan</button>
            </form>
        </div>

    </div>
</body>

</html>
