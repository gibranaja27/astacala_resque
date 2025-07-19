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
        <div class="w-60 bg-gray-400 text-black flex flex-col font-semibold">
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
            <h1 class="text-4xl font-bold text-center font-sansz mt-5">Data Pelaporan</h1>

            <div class="overflow-x-auto rounded-lg shadow mt-16">
                <table class="min-w-full bg-white border border-gray-300 text-sm text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 border">Username Pengguna</th>
                            <th class="px-4 py-3 border">Nama Tim</th>
                            <th class="px-4 py-3 border">Jumlah Personel</th>
                            <th class="px-4 py-3 border">No HP</th>
                            <th class="px-4 py-3 border">Informasi Singkat</th>
                            <th class="px-4 py-3 border">Lokasi</th>
                            <th class="px-4 py-3 border">Koordinat</th>
                            <th class="px-4 py-3 border">Skala</th>
                            <th class="px-4 py-3 border">Jumlah Korban</th>
                            <th class="px-4 py-3 border">Deskripsi</th>
                            <th class="px-4 py-3 border">Foto Lokasi</th>
                            <th class="px-4 py-3 border">Bukti Tugas</th>
                            <th class="px-4 py-3 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($data as $row)
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-3">
                                    {{ $row->pengguna->username_akun_pengguna ?? 'Tidak ada username' }}</td>
                                <td class="px-4 py-3">{{ $row->nama_team_pelapor }}</td>
                                <td class="px-4 py-3">{{ $row->jumlah_personel }}</td>
                                <td class="px-4 py-3">{{ $row->no_handphone }}</td>
                                <td class="px-4 py-3">{{ $row->informasi_singkat_bencana }}</td>
                                <td class="px-4 py-3">{{ $row->lokasi_bencana }}</td>
                                <td class="px-4 py-3">
                                    {{ $row->titik_kordinat_lokasi_bencana }}
                                    <button onclick="showMap('{{ $row->titik_kordinat_lokasi_bencana }}')"
                                        class="ml-2 text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td>
                                <td class="px-4 py-3">{{ $row->skala_bencana }}</td>
                                <td class="px-4 py-3">{{ $row->jumlah_korban }}</td>
                                <td class="px-4 py-3">{{ $row->deskripsi_terkait_data_lainya }}</td>
                                <td class="px-4 py-3">
                                    @if ($row->foto_lokasi_bencana)
                                        <img src="{{ asset('storage/' . $row->foto_lokasi_bencana) }}"
                                            alt="Foto Lokasi" class="w-24 h-auto rounded shadow">
                                    @else
                                        <span class="text-gray-500">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3">
                                    @if ($row->bukti_surat_perintah_tugas)
                                        <a href="{{ asset('storage/' . $row->bukti_surat_perintah_tugas) }}"
                                            target="_blank" class="text-blue-600 underline hover:text-blue-800">Lihat
                                            File</a>
                                    @else
                                        <span class="text-gray-500">Tidak ada file</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 space-x-2">
                                    <form action="{{ route('pelaporan.destroy', $row->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus data ini?')"
                                            class="px-6 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                            Delete
                                        </button>
                                    </form>
                                    <button type="button" onclick="verifikasiData({{ $row->id }})"
                                        class="px-5 py-1 mt-6 bg-green-500 text-white rounded hover:bg-green-600">
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
                if (result.isConfirmed) {
                    window.location.href = "/pelaporan/verifikasi/" + id + "?status=DITERIMA";
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    window.location.href = "/pelaporan/verifikasi/" + id + "?status=DITOLAK";
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
