<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white p-10">
    <h1 class="text-2xl font-bold text-red-700 mb-8 text-center">Edit Profil</h1>

    <form action="{{ route('profil.admin.update') }}" method="POST" class="max-w-xl mx-auto">
        @csrf
        @method('PUT')

        <label>Username Admin</label>
        <input type="text" name="username_akun_admin" class="w-full p-2 bg-gray-300 rounded mb-4"
            value="{{ $admin->username_akun_admin }}">

        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap_admin" class="w-full p-2 bg-gray-300 rounded mb-4"
            value="{{ $admin->nama_lengkap_admin }}">

        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir_admin" class="w-full p-2 bg-gray-300 rounded mb-4"
            value="{{ $admin->tanggal_lahir_admin }}">

        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir_admin" class="w-full p-2 bg-gray-300 rounded mb-4"
            value="{{ $admin->tempat_lahir_admin }}">

        <label>No Handphone</label>
        <input type="text" name="no_handphone_admin" class="w-full p-2 bg-gray-300 rounded mb-4"
            value="{{ $admin->no_handphone_admin }}">

        <label>No Anggota</label>
        <input type="text" name="no_anggota" class="w-full p-2 bg-gray-300 rounded mb-6"
            value="{{ $admin->no_anggota }}">

        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded">
            Simpan
        </button>
    </form>
</body>

</html>
