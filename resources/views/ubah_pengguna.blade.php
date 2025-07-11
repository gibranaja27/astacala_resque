<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Navigation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-48 bg-gray-400 text-black flex flex-col font-semibold">
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
        <div style="margin-left: 100px; margin-top:50px;">
            <h1 style="font-family: Arial, Helvetica, sans-serif; color:#FF8E27; font-size: x-large;">Ubah Pengguna</h1>
        </div>
        <section class="width-100% height-auto" style="margin-left: 80px; display: flex;">
            <div style="margin-top: 40px;">
                <form action="/Pengguna/{{ $pengguna->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div style="margin-bottom: 20px">
                        <input type="text" name="username_akun_pengguna" placeholder="username_akun_pengguna"
                            value="{{ $pengguna->username_akun_pengguna }}" style="width: 400px; height: 40px"><br>
                    </div>
                    <div style="margin-bottom: 20px">
                        <input type="text" name="nama_lengkap_pengguna" placeholder="nama_lengkap_pengguna"
                            value="{{ $pengguna->nama_lengkap_pengguna }}" style="width: 400px; height: 40px"> <br>
                    </div>
                    <div style="margin-bottom: 20px">
                        <input type="text" name="tanggal_lahir_pengguna" placeholder="tanggal_lahir_pengguna"
                            value="{{ $pengguna->tanggal_lahir_pengguna }}" style="width: 400px; height: 40px">
                        <br>
                    </div>
                    <div style="margin-bottom: 20px">
                        <input type="text" name="tempat_lahir_pengguna" placeholder="tempat_lahir_pengguna"
                            value="{{ $pengguna->tempat_lahir_pengguna }}" style="width: 400px; height: 40px"> <br>
                    </div>
                    <div style="margin-bottom: 20px">
                        <input type="text" name="no_handphone_pengguna" placeholder="no_handphone_pengguna"
                            value="{{ $pengguna->no_handphone_pengguna }}"style="width: 400px; height: 40px"> <br>
                    </div>
                    <div style="margin-bottom: 20px">
                        <input type="text" name="password_akun_pengguna" placeholder="password_akun_pengguna"
                            value="{{ $pengguna->password_akun_pengguna }}"style="width: 400px; height: 40px"> <br>
                    </div>
                    <div style="margin-bottom: 20px">
                        <input type="submit" name="submit" value="update"
                            style="width: 100px; height: 30px; background-color:#FF8E27; border-radius:5px">
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>
