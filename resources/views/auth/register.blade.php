<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Register</title>
  </head>
  <body class="min-h-screen bg-gray-50 flex items-center justify-center">
    <div class="max-w-md w-full bg-white shadow rounded-lg p-8">
      <h2 class="text-2xl font-semibold mb-6">Buat Akun</h2>

      @if($errors->any())
        <div class="mb-4 text-sm text-red-600">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ url('/register') }}">
        @csrf
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Nama</label>
          <input type="text" name="name" value="{{ old('name') }}" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm" />
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm" />
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm" />
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" required class="mt-1 block w-full rounded-md border-gray-200 shadow-sm" />
          </div>
        </div>

        <div class="flex items-center justify-between">
          <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:underline">Sudah punya akun? Login</a>
          <button type="submit" class="bg-[#007E5D] text-white px-4 py-2 rounded">Daftar</button>
        </div>
      </form>
    </div>
  </body>
</html>
