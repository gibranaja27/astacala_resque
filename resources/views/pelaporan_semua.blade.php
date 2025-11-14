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

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full border border-gray-300 text-sm text-center">
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
                    <th class="px-4 py-3 border">Status Verifikasi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($data_pelaporan as $pelaporan)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $pelaporan->pengguna->username_akun_pengguna ?? 'Tidak ada username' }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->nama_team_pelapor }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->jumlah_personel }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->no_handphone }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->informasi_singkat_bencana }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->lokasi_bencana }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->titik_kordinat_lokasi_bencana }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->skala_bencana }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->jumlah_korban }}</td>
                        <td class="border px-4 py-2">{{ $pelaporan->deskripsi_terkait_data_lainya }}</td>
                        <td class="border px-4 py-2">
                            @if ($pelaporan->foto_lokasi_bencana)
                                <img src="{{ asset('storage/' . $pelaporan->foto_lokasi_bencana) }}"
                                    class="w-20 h-auto">
                            @else
                                <span class="text-gray-500">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2">
                            @if ($pelaporan->bukti_surat_perintah_tugas)
                                <a href="{{ asset('storage/' . $pelaporan->bukti_surat_perintah_tugas) }}"
                                    target="_blank" class="text-blue-600 underline">Lihat</a>
                            @else
                                <span class="text-gray-500">Tidak ada file</span>
                            @endif
                        </td>
                        <td
                            class="border px-4 py-2 font-semibold
    {{ $pelaporan->status_verifikasi === 'DITERIMA' ? 'text-green-600' : ($pelaporan->status_verifikasi === 'DITOLAK' ? 'text-red-600' : 'text-gray-600') }}">
                            {{ $pelaporan->status_verifikasi }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            Kembali ke Dashboard
        </a>
    </div>
</body>

</html>
