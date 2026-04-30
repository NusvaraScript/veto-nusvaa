<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin — VetoNusvaa')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen bg-gray-100 text-slate-900">

    {{-- Top Navbar --}}
    <nav class="bg-black text-white border-b-4 border-red-600 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-14">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">
                    Veto<span class="text-red-500">Nusvaa</span>.
                    <span class="text-xs font-normal bg-red-600 px-2 py-0.5 ml-2">ADMIN</span>
                </a>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-300 hidden sm:block">
                        <i class="fa-solid fa-user-shield mr-1"></i>
                        {{ auth()->user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm border border-gray-500 hover:border-red-500 hover:text-red-400 px-3 py-1 transition-colors">
                            <i class="fa-solid fa-right-from-bracket"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-4 p-3 bg-emerald-50 border-2 border-emerald-500 text-emerald-800 text-sm">
                <i class="fa-solid fa-circle-check mr-2"></i>{{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

</body>
</html>
