<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Data Pelaporan Terverifikasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-6">
    <h1 class="text-3xl font-semibold text-gray-700 mb-6 text-center">Semua Data Pelaporan Terverifikasi</h1>

    <div class="overflow-x-auto bg-white rounded-xl shadow-md p-4">
        <table class="min-w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">

            <!-- Header -->
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs font-semibold">
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
                    <th class="px-4 py-3 border">Status Verifikasi</th>
                </tr>
            </thead>

            <!-- Body -->
            <tbody class="divide-y divide-gray-200">
                @foreach ($data_pelaporan as $pelaporan)
                    <tr class="hover:bg-gray-50 transition">

                        <td class="px-4 py-3">{{ $pelaporan->pengguna->username_akun_pengguna ?? 'Tidak ada username' }}
                        </td>
                        <td class="px-4 py-3">{{ $pelaporan->nama_team_pelapor }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->jumlah_personel }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->no_handphone }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->informasi_singkat_bencana }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->lokasi_bencana }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->titik_kordinat_lokasi_bencana }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->skala_bencana }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->jumlah_korban }}</td>
                        <td class="px-4 py-3">{{ $pelaporan->deskripsi_terkait_data_lainya }}</td>

                        <!-- Foto -->
                        <td class="px-4 py-3">
                            @if ($pelaporan->foto_lokasi_bencana)
                                <img src="{{ asset('storage/' . $pelaporan->foto_lokasi_bencana) }}"
                                    class="w-24 h-auto rounded-lg shadow-sm border border-gray-200 object-cover">
                            @else
                                <span class="text-gray-500 text-xs italic">Tidak ada foto</span>
                            @endif
                        </td>

                        <!-- File -->
                        <td class="px-4 py-3">
                            @if ($pelaporan->bukti_surat_perintah_tugas)
                                <a href="{{ asset('storage/' . $pelaporan->bukti_surat_perintah_tugas) }}"
                                    target="_blank"
                                    class="text-blue-600 underline hover:text-blue-800 text-sm font-medium">
                                    Lihat File
                                </a>
                            @else
                                <span class="text-gray-500 text-xs italic">Tidak ada file</span>
                            @endif
                        </td>

                        <!-- Status Verifikasi -->
                        <td class="px-4 py-3">
                            @if ($pelaporan->status_verifikasi === 'DITERIMA')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-semibold">
                                    DITERIMA
                                </span>
                            @elseif ($pelaporan->status_verifikasi === 'DITOLAK')
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-semibold">
                                    DITOLAK
                                </span>
                            @else
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">
                                    MENUNGGU
                                </span>
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>


    <div class="mt-7">
        <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            Kembali ke Rumah
        </a>
    </div>
</body>

</html>
