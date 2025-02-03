<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-200">
  <div class="bg-gray-300 p-8 rounded-lg shadow-md w-96">
    <h1 class="text-center text-2xl font-bold mb-6">Login</h1>
    <form>
      <div class="mb-4">
        <label for="username" class="block text-sm font-medium mb-2">Username</label>
        <input type="text" id="username" placeholder="Masukkan Username Anda" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
      </div>
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium mb-2">Password</label>
        <input type="password" id="password" placeholder="Masukkan Password Anda" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
      </div>
      <button type="submit" class="w-full bg-red-700 text-white py-2 rounded-lg hover:bg-red-800 transition"><a href="/Home">Masuk</a></button>
    </form>
    <a href="/Register" class="block text-center text-red-700 mt-4 text-sm hover:underline">Daftar Akun</a>
  </div>
</body>
</html>
