<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-slate-300">

<div class="flex min-h-screen">

  <!-- LEFT - hero image and copy (hidden on small screens) -->
  <div class="hidden lg:flex w-1/2 relative">
    <img src="{{ asset('images/home.jpg') }}" class="absolute inset-0 w-full h-full object-cover" />
    <div class="absolute inset-0 bg-black/40"></div>

    <a href="{{ url('/') }}" class="absolute top-6 left-6 px-5 py-2 border border-white text-white font-medium rounded-lg hover:bg-white hover:text-black transition z-20">
      <i class="fa-solid fa-arrow-left mr-2"></i>
      Kembali
    </a>

    <div class="relative z-10 text-white px-14 my-auto">
      <h1 class="text-4xl font-bold mb-4">Selamat Datang di Sistem Magang</h1>
      <p class="text-lg leading-relaxed max-w-md">Buat akun untuk mengajukan lamaran, unggah CV, dan pantau status lamaran Anda melalui dashboard.</p>
    </div>
  </div>

  <!-- RIGHT - registration card -->
  <div class="w-full lg:w-1/2 bg-white rounded-l-3xl shadow-2xl p-10 flex items-center">
    <div class="w-full">
      <h2 class="text-3xl font-bold text-gray-900 mb-2">Buat Akun Baru</h2>
      <p class="text-gray-600 mb-8">Isi data untuk membuat akun peserta.</p>

      @if($errors->any())
        <div class="mb-4 text-sm text-red-600">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ url('/register') }}" class="space-y-5">
        @csrf

        <div>
          <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
          <input type="text" name="name" value="{{ old('name') }}" required
            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-black outline-none" placeholder="Nama lengkap Anda">
        </div>

        <div>
          <label class="block text-gray-700 font-medium mb-1">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required
            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-black outline-none" placeholder="you@example.com">
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-gray-700 font-medium mb-1">Password</label>
            <div class="flex items-center border border-gray-300 rounded-xl px-4 py-3">
              <input type="password" name="password" required class="w-full outline-none" placeholder="Password">
              <i class="fa-solid fa-eye text-gray-500"></i>
            </div>
          </div>

          <div>
            <label class="block text-gray-700 font-medium mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required
              class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-black outline-none" placeholder="Ulangi password">
          </div>
        </div>

        <div class="flex items-center justify-between">
          <a href="{{ route('login') }}" class="text-gray-700 hover:underline">Sudah punya akun? Login</a>
          <button type="submit" class="w-1/3 bg-black text-white font-semibold py-3 rounded-xl hover:bg-gray-900 transition">Daftar</button>
        </div>

        <div class="flex items-center my-4">
          <hr class="flex-grow border-gray-300">
          <span class="mx-3 text-gray-500">atau daftar dengan</span>
          <hr class="flex-grow border-gray-300">
        </div>

        <button type="button" class="w-full border border-gray-300 rounded-xl py-3 flex items-center justify-center gap-3 hover:bg-gray-50 transition">
          <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5">
          <span>Daftar dengan Google</span>
        </button>
      </form>

    </div>
  </div>

</div>

</body>
</html>
