<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
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
            <h1 class="text-4xl font-bold text-center font-sansz mt-5">Data Pelaporan</h1>

            <div class="overflow-x-auto mt-16">
                <table class="min-w-full bg-white border border-gray-300">
                    <!-- Tabel Header -->
                    <thead class="bg-gray-200 text-gray-600">
                        <tr>
                            <th class="px-4 py-2 border">Username Pengguna</th>
                            <th class="px-4 py-2 border">Nama Tim</th>
                            <th class="px-4 py-2 border">Jumlah Personel</th>
                            <th class="px-4 py-2 border">Informasi Singkat</th>
                            <th class="px-4 py-2 border">Lokasi</th>
                            <th class="px-4 py-2 border">Koordinat</th>
                            <th class="px-4 py-2 border">Skala</th>
                            <th class="px-4 py-2 border">Jumlah Korban</th>
                            <th class="px-4 py-2 border">Deskripsi</th>
                            <th class="px-4 py-2 border">Foto Lokasi Bencana</th>
                            <th class="px-4 py-2 border">Bukti Tugas</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>

                    <!-- Tabel Body -->
                    <tbody>
                        @foreach ($data as $row)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">
                                    {{ $row->pengguna->username_akun_pengguna ?? 'Tidak ada username' }}
                                </td>

                                <td class="px-4 py-2 border">{{ $row->nama_team_pelapor }}</td>
                                <td class="px-4 py-2 border">{{ $row->jumlah_personel }}</td>
                                <td class="px-4 py-2 border">{{ $row->informasi_singkat_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->lokasi_bencana }}</td>

                                <!-- Koordinat + Button Lihat Map -->
                                <td class="px-4 py-2 border text-center">
                                    {{ $row->titik_kordinat_lokasi_bencana }}
                                    <div>
                                        <button onclick="showMap('{{ $row->titik_kordinat_lokasi_bencana }}')"
                                            class="ml-2 text-blue-600 hover:text-blue-800">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>

                                <td class="px-4 py-2 border">{{ $row->skala_bencana }}</td>
                                <td class="px-4 py-2 border">{{ $row->jumlah_korban }}</td>
                                <td class="px-4 py-2 border">{{ $row->deskripsi_terkait_data_lainya }}</td>

                                <!-- Foto -->
                                <td class="px-4 py-2 border">
                                    @if ($row->foto_lokasi_bencana)
                                        <img src="{{ asset('storage/' . $row->foto_lokasi_bencana) }}"
                                            alt="Foto Lokasi" class="w-24 h-auto rounded shadow border">
                                    @else
                                        <span class="text-gray-500">Tidak ada foto</span>
                                    @endif
                                </td>

                                <!-- File -->
                                <td class="px-4 py-2 border">
                                    @if ($row->bukti_surat_perintah_tugas)
                                        <a href="{{ asset('storage/' . $row->bukti_surat_perintah_tugas) }}"
                                            target="_blank" class="text-blue-600 underline hover:text-blue-800">
                                            Lihat File
                                        </a>
                                    @else
                                        <span class="text-gray-500">Tidak ada file</span>
                                    @endif
                                </td>

                                <!-- Aksi -->
                                <td class="px-4 py-2 border text-center flex flex-col items-center space-y-2">

                                    <!-- Tombol Delete -->
                                    <form action="{{ route('pelaporan.destroy', $row->id) }}" method="POST"
                                        class="w-full flex justify-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus data ini?')"
                                            class="w-28 px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 text-sm font-semibold text-center">
                                            Delete
                                        </button>
                                    </form>

                                    <!-- Tombol Verifikasi -->
                                    <button type="button" onclick="verifikasiData({{ $row->id }})"
                                        class="w-28 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 text-sm font-semibold">
                                        Verifikasi
                                    </button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>




        </div>
    </div>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function verifikasiData(id) {
            Swal.fire({
                title: 'Verifikasi Pelaporan',
                text: "Apakah data pelaporan ini DITERIMA atau DITOLAK?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'DITERIMA',
                cancelButtonText: 'DITOLAK',
            }).then((result) => {
                let status = '';
                if (result.isConfirmed) {
                    status = 'DITERIMA';
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    status = 'DITOLAK';
                }

                if (status !== '') {
                    fetch(`/pelaporan/verifikasi/${id}?status=${status}`)
                        .then(() => {
                            Swal.fire('Berhasil!', 'Status verifikasi diperbarui.', 'success')
                                .then(() => window.location.reload());
                        });
                }
            });
        }

        function showMap(kordinat) {
            if (!kordinat || !kordinat.includes(',')) {
                Swal.fire('Error', 'Titik koordinat bencana tidak tersedia', 'error');
                return;
            }

            const [lat, lng] = kordinat.split(',').map(x => parseFloat(x.trim()));

            Swal.fire({
                title: 'Lokasi Peta',
                html: '<div id="map" style="height:400px;"></div>',
                width: 600,
                didOpen: () => {
                    const map = L.map('map').setView([lat, lng], 13);

                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);

                    L.marker([lat, lng]).addTo(map)
                        .bindPopup('Lokasi Bencana').openPopup();
                }
            });
        }
    </script>
</body>


</html>
