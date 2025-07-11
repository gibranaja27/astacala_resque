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
                     <img src="{{ asset('image/yayasan_astacala_logo.png') }}" alt="Logo Profil" class="w-20 h-20 rounded-full mx-auto mt-10">
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
            <h1 class="text-2xl font-bold mb-4">Data Pelaporan</h1>

            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Username Pengguna</th>
                        <th class="border px-4 py-2">Nama Tim</th>
                        <th class="border px-4 py-2">Jumlah Personel</th>
                        <th class="border px-4 py-2">No HP</th>
                        <th class="border px-4 py-2">Informasi Singkat</th>
                        <th class="border px-4 py-2">Lokasi</th>
                        <th class="border px-4 py-2">Koordinat</th>
                        <th class="border px-4 py-2">Skala</th>
                        <th class="border px-4 py-2">Jumlah Korban</th>
                        <th class="border px-4 py-2">Deskripsi</th>
                        <th class="border px-4 py-2">Foto Lokasi</th>
                        <th class="border px-4 py-2">Bukti Tugas</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        <tr>
                            <td class="border px-4 py-2">
                                {{ $row->pengguna->username_akun_pengguna ?? 'Tidak ada username' }}</td>
                            <td class="border px-4 py-2">{{ $row->nama_team_pelapor }}</td>
                            <td class="border px-4 py-2">{{ $row->jumlah_personel }}</td>
                            <td class="border px-4 py-2">{{ $row->no_handphone }}</td>
                            <td class="border px-4 py-2">{{ $row->informasi_singkat_bencana }}</td>
                            <td class="border px-4 py-2">{{ $row->lokasi_bencana }}</td>
                            <td class="border px-4 py-2">
                                {{ $row->titik_kordinat_lokasi_bencana }}
                                <button onclick="showMap('{{ $row->titik_kordinat_lokasi_bencana }}')"
                                    class="ml-2 text-blue-500">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td class="border px-4 py-2">{{ $row->skala_bencana }}</td>
                            <td class="border px-4 py-2">{{ $row->jumlah_korban }}</td>
                            <td class="border px-4 py-2">{{ $row->deskripsi_terkait_data_lainya }}</td>
                            <td class="border px-4 py-2">
                                @if ($row->foto_lokasi_bencana)
                                    <img src="{{ asset('storage/' . $row->foto_lokasi_bencana) }}" width="100">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                @if ($row->bukti_surat_perintah_tugas)
                                    <a href="{{ asset('storage/' . $row->bukti_surat_perintah_tugas) }}"
                                        target="_blank">Lihat File</a>
                                @else
                                    Tidak ada file
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('pelaporan.destroy', $row->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600"
                                        onclick="return confirm('Hapus data ini?')">Delete</button>
                                </form>
                                <button type="button" onclick="verifikasiData({{ $row->id }})"
                                    class="text-green-600 ml-2">Verifikasi</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


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
