<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — VetoNusvaa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen bg-slate-50 flex items-center justify-center px-4">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('login') }}" class="text-3xl font-bold text-black">
                Veto<span class="text-red-700">Nusvaa</span>.
            </a>
            <p class="text-gray-500 text-sm mt-1">Your personal "to don't" list.</p>
        </div>

        {{-- Card --}}
        <div class="border-2 border-black bg-white shadow-[6px_6px_0px_#000] p-8">
            <h1 class="text-2xl font-bold uppercase mb-6">Masuk</h1>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border-2 border-red-500 text-red-700 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
                @csrf

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
                        placeholder="••••••••"
                        required
                        autocomplete="current-password"
                        class="w-full border-2 border-black p-2 focus:outline-none focus:border-red-600 transition-colors"
                    >
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" id="remember" name="remember" class="border-2 border-black">
                    <label for="remember" class="text-sm text-gray-600">Ingat saya</label>
                </div>

                <button
                    type="submit"
                    class="w-full bg-red-600 text-white border-2 border-black px-4 py-2 font-bold uppercase hover:bg-black hover:text-white hover:shadow-[4px_4px_0px_#ef4444] transition-all active:scale-95"
                >
                    <i class="fa-solid fa-right-to-bracket mr-2"></i> Masuk
                </button>
            </form>

            <div class="mt-6 pt-4 border-t-2 border-black text-center text-sm">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-bold text-red-600 hover:underline">Daftar sekarang</a>
            </div>
        </div>
    </div>

</body>
</html>
