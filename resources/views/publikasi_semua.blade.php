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
                    <th class="px-4 py-3 border">Judul Singkat Bencana</th>
                    <th class="px-4 py-3 border">Lokasi Bencana</th>
                    <th class="px-4 py-3 border">Titik Kordinat Lokasi</th>
                    <th class="px-4 py-3 border">Skala Bencana</th>
                    <th class="px-4 py-3 border">Deskripsi Terkait Bencana</th>
                    <th class="px-4 py-3 border">Foto Bencana</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($data_publikasi as $publikasi)
                    <tr>
                        <td class="border px-4 py-2">
                            {{ $publikasi->pblk_judul_bencana }}</td>
                        <td class="border px-4 py-2">{{ $publikasi->pblk_lokasi_bencana }}</td>
                        <td class="border px-4 py-2">{{ $publikasi->pblk_titik_kordinat_bencana }}</td>
                        <td class="border px-4 py-2">{{ $publikasi->pblk_skala_bencana }}</td>
                        <td class="border px-4 py-2">{{ $publikasi->deskripsi_umum }}</td>
                        <td class="border px-4 py-2">
                            @if ($publikasi->pblk_foto_bencana)
                                <img src="{{ asset('storage/' . $publikasi->pblk_foto_bencana) }}" width="100" />
                            @else
                                <span>Tidak ada foto</span>
                            @endif
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
