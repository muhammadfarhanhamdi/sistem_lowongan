<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-slate-300">

<div class="flex min-h-screen">

    <!-- BAGIAN KIRI -->
    <!-- BAGIAN KIRI -->
<div class="hidden lg:flex w-1/2 relative">
    <img src="{{ asset('images/home.jpg') }}" 
         class="absolute inset-0 w-full h-full object-cover" />

    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Tombol Beranda DI POJOK KIRI ATAS -->
    <a href="{{ url('/') }}"
       class="absolute top-6 left-6 px-5 py-2 border border-white text-white font-medium rounded-lg 
              hover:bg-white hover:text-black transition z-20">
        <i class="fa-solid fa-arrow-left mr-2"></i>
        Kembali
    </a>

    <!-- Konten Tulisan -->
    <div class="relative z-10 text-white px-14 my-auto">
        <h1 class="text-4xl font-bold mb-4">Edit Smarter. Export Faster.<br>Create Anywhere.</h1>

        <p class="text-lg leading-relaxed max-w-md">
            From quick social media clips to full-length videos, our powerful editor 
            lets you work seamlessly across devices.
        </p>
    </div>
</div>


    <!-- BAGIAN KANAN (FULL CARD) -->
    <div class="w-full lg:w-1/2 bg-white rounded-l-3xl shadow-2xl p-10 flex items-center">

        <div class="w-full">

            <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back!</h2>
            <p class="text-gray-600 mb-8">Log in to start creating stunning videos with ease.</p>

            <form action="/login" method="POST" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" name="email"
                        class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-black outline-none"
                        placeholder="Input your email">
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Password</label>
                    <div class="flex items-center border border-gray-300 rounded-xl px-4 py-3">
                        <input type="password" name="password"
                            class="w-full outline-none"
                            placeholder="Input your password">
                        <i class="fa-solid fa-eye text-gray-500"></i>
                    </div>
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-gray-700">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="w-4 h-4">
                        <span>Remember Me</span>
                    </label>

                    <a href="#" class="text-gray-700 hover:underline">Forgot Password?</a>
                </div>

                <!-- Tombol Login -->
                <button class="w-full bg-black text-white font-semibold py-3 rounded-xl hover:bg-gray-900 transition">
                    Login
                </button>

                <!-- Garis -->
                <div class="flex items-center my-4">
                    <hr class="flex-grow border-gray-300">
                    <span class="mx-3 text-gray-500">Or continue with:</span>
                    <hr class="flex-grow border-gray-300">
                </div>

                <!-- Google Button -->
                <button type="button"
                    class="w-full border border-gray-300 rounded-xl py-3 flex items-center justify-center gap-3 hover:bg-gray-50 transition">
                    <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" class="w-5">
                    <span>Continue with Google</span>
                </button>
            </form>

            <p class="text-center text-gray-600 mt-6">
                Don’t have an account?
                <a href="/register" class="text-black font-semibold hover:underline">Sign up here</a>
            </p>

        </div>

    </div>

</div>

</body>
</html>
