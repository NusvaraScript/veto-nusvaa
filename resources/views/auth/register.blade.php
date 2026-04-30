<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar — VetoNusvaa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @if(app()->environment('local'))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
<body class="antialiased min-h-screen bg-slate-50 flex items-center justify-center px-4 py-8">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('login') }}" class="text-3xl font-bold text-black">
                Veto<span class="text-red-700">Nusvaa</span>.
            </a>
            <p class="text-gray-500 text-sm mt-1">Mulai pantau kebiasaan burukmu.</p>
        </div>

        {{-- Card --}}
        <div class="border-2 border-black bg-white shadow-[6px_6px_0px_#000] p-8">
            <h1 class="text-2xl font-bold uppercase mb-6">Buat Akun</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border-2 border-red-500 text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <p class="text-red-700">• {{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Nama kamu"
                        required
                        autocomplete="name"
                        class="w-full border-2 border-black p-2 focus:outline-none focus:border-red-600 transition-colors @error('name') border-red-500 @enderror"
                    >
                </div>

                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-1">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="kamu@email.com"
                        required
                        autocomplete="email"
                        class="w-full border-2 border-black p-2 focus:outline-none focus:border-red-600 transition-colors @error('email') border-red-500 @enderror"
                    >
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Min. 8 karakter"
                        required
                        autocomplete="new-password"
                        class="w-full border-2 border-black p-2 focus:outline-none focus:border-red-600 transition-colors"
                    >
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1">Konfirmasi Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Ulangi password"
                        required
                        autocomplete="new-password"
                        class="w-full border-2 border-black p-2 focus:outline-none focus:border-red-600 transition-colors"
                    >
                </div>

                <button
                    type="submit"
                    class="w-full bg-red-600 text-white border-2 border-black px-4 py-2 font-bold uppercase hover:bg-black hover:text-white hover:shadow-[4px_4px_0px_#ef4444] transition-all active:scale-95"
                >
                    <i class="fa-solid fa-user-plus mr-2"></i> Daftar
                </button>
            </form>

            <div class="mt-6 pt-4 border-t-2 border-black text-center text-sm">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-bold text-red-600 hover:underline">Masuk</a>
            </div>
        </div>

        <p class="text-center text-xs text-gray-400 mt-4">
            Data kebiasaanmu bersifat privat dan hanya bisa dilihat oleh kamu sendiri.
        </p>
    </div>

</body>
</html>
