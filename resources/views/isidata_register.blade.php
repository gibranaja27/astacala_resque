<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Isi Data Diri</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
  <div class="bg-gray-300 p-8 rounded-lg shadow-md w-96">
    <h1 class="text-center text-2xl font-bold mb-6">Isi Data Diri</h1>
    <form method="POST" action="/isidataregister">
      @csrf
      <input type="hidden" name="username_akun_admin" value="{{ request('username_akun_admin') }}">
      <input type="hidden" name="password_akun_admin" value="{{ request('password_akun_admin') }}">
      <input type="hidden" name="password_akun_admin_confirmation" value="{{ request('password_akun_admin_confirmation') }}">

      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium mb-2">Nama Lengkap</label>
        <input type="text" id="nama" name="nama_lengkap_admin" placeholder="Masukkan Nama Lengkap Anda"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" required>
      </div>
      <div class="mb-4">
        <label for="tanggal-lahir" class="block text-sm font-medium mb-2">Tanggal Lahir</label>
        <input type="date" id="tanggal-lahir" name="tanggal_lahir_admin"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" required>
      </div>
      <div class="mb-4">
        <label for="tempat-lahir" class="block text-sm font-medium mb-2">Tempat Lahir</label>
        <input type="text" id="tempat-lahir" name="tempat_lahir_admin" placeholder="Masukkan Tempat Lahir Anda"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" required>
      </div>
      <div class="mb-4">
        <label for="no-hp" class="block text-sm font-medium mb-2">No Handphone</label>
        <input type="text" id="no-hp" name="no_handphone_admin" placeholder="Masukkan Nomor Handphone Anda"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" required>
      </div>
      <div class="mb-6">
        <label for="no-anggota" class="block text-sm font-medium mb-2">No Anggota</label>
        <input type="text" id="no-anggota" name="no_anggota" placeholder="Masukkan No Anggota"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500" required>
      </div>
      <button type="submit"
              class="w-full bg-red-700 text-white py-2 rounded-lg hover:bg-red-800 transition">
        Simpan & Daftar
      </button>
    </form>
  </div>
</body>
</html>
