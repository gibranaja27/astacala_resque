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
        <div class="w-44 bg-gray-400 text-black flex flex-col font-semibold">
            <div class="p-4 text-center text-xl font-bold border-b border-white-500">
                <div class="flex items-center space-x-2">
                    <!-- Ikon Profil Font Awesome -->
                    <i class="fas fa-user-circle text-7xl text-gray-600 ml-10 mt-10"></i>
                </div>
                <div class="mb-7 mt-5">
                    Admin
                </div>
            </div>
            <nav class="flex-grow mt-4">
                <ul>
                    <li>
                        <a href="/Home" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/Pelaporan" class="block py-3 px-4 hover:bg-red-500 rounded transition duration-300">
                            Data Pelaporan
                        </a>
                    </li>
                    <li>
                        <a href="#data-pelaporan"
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
        <!DOCTYPE html>
        <html>

        <head>
            <title>Dashboard Admin</title>
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        </head>

        <body class="bg-gray-100">
            <div class="container mx-auto p-8">
                <h1 class="text-3xl font-bold text-gray-800">Welcome to the dashboard admin :)</h1>
                <div class="grid grid-cols-3 gap-4 mt-8">
                    <div class="bg-cyan-500 text-white rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="text-5xl">1</div>
                            <div class="ml-4">
                                <h2 class="text-lg">Kejadian Bencana</h2>
                                <a href="/Databencana" class="hover: underline">More Info ></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-500 text-white rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="text-5xl">3</div>
                            <div class="ml-4">
                                <h2 class="text-lg">Admin</h2>
                                <a href="/Dataadmin" class="hover: underline">More Info ></a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-500 text-white rounded-lg p-6">
                        <div class="flex items-center">
                            <div class="text-5xl">1</div>
                            <div class="ml-4">
                                <h2 class="text-lg">Pengguna</h2>
                                <a href="/Datapengguna" class="hover: underline">More Info ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
    </div>
</body>

</html>
