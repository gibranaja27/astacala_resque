<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profil Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Profil Admin</h1>

        <div class="mb-4">
            <strong>Nama Lengkap:</strong> {{ $admin->nama_lengkap_admin }}
        </div>
        <div class="mb-4">
            <strong>Username:</strong> {{ $admin->username_akun_admin }}
        </div>
        <div class="mb-4">
            <strong>Tanggal Lahir:</strong> {{ $admin->tanggal_lahir_admin }}
        </div>
        <div class="mb-4">
            <strong>Tempat Lahir:</strong> {{ $admin->tempat_lahir_admin }}
        </div>
        <div class="mb-4">
            <strong>No Anggota:</strong> {{ $admin->no_anggota }}
        </div>
        <div class="mb-4">
            <strong>No HP:</strong> {{ $admin->no_handphone_admin }}
        </div>

        <a href="/dashboard" class="inline-block bg-red-600 text-white px-4 py-2 rounded">Kembali ke Dashboard</a>
    </div>
</body>

</html>
