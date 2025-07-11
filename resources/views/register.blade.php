<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex min-h-screen">
    <!-- Bagian Form Register -->
    <div class="w-1/2 flex items-center justify-center bg-gray-200">
        <div class="bg-gray-300 p-16 rounded-lg shadow-md w-[600px]">
            <h1 class="text-center text-3xl font-bold mb-8">Register</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-5">
                    <label class="block text-sm mb-2 font-semibold">Username</label>
                    <input type="text" name="username_akun_admin" placeholder="Masukkan Username"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-5">
                    <label class="block text-sm mb-2 font-semibold">Password</label>
                    <input type="password" name="password_akun_admin" placeholder="Masukkan Password"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-5">
                    <label class="block text-sm mb-2 font-semibold">Konfirmasi Password</label>
                    <input type="password" name="password_akun_admin_confirmation" placeholder="Konfirmasi Password"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-5">
                    <label class="block text-sm mb-2 font-semibold">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap_admin" placeholder="Masukkan Nama Lengkap"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-5">
                    <label class="block text-sm mb-2 font-semibold">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir_admin"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-5">
                    <label class="block text-sm mb-2 font-semibold">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir_admin" placeholder="Masukkan Tempat Lahir"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-5">
                    <label class="block text-sm mb-2 font-semibold">No Anggota</label>
                    <input type="text" name="no_anggota" placeholder="Masukkan No Anggota"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <div class="mb-8">
                    <label class="block text-sm mb-2 font-semibold">No HP</label>
                    <input type="text" name="no_handphone_admin" placeholder="Masukkan No HP"
                        class="w-full px-4 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-red-500" required>
                </div>

                <button type="submit"
                    class="w-full bg-red-700 hover:bg-red-800 text-white font-bold py-3 px-4 rounded">
                    Daftar
                </button>
            </form>

            <a href="/login" class="block text-center text-red-700 mt-6 text-sm hover:underline">Sudah punya akun? Masuk</a>
        </div>
    </div>

    <!-- Gambar Kanan -->
    <div class="w-1/2 h-screen bg-cover bg-center"
        style="background-image: url('/image/imagelogin.jpg')">
    </div>
</body>

</html>
