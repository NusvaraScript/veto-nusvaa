<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin — VetoNusvaa')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen bg-gray-50 text-slate-900 font-sans">

    {{-- Top Navbar --}}
    <nav class="bg-white border-b-4 border-black sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                {{-- Logo Section --}}
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 group">
                    <div class="bg-black text-white p-1 border-2 border-black transition-transform group-hover:-translate-y-1 group-hover:translate-x-1">
                        <span class="text-xl font-black tracking-tighter italic px-1">VN.</span>
                    </div>
                    <div class="hidden sm:block">
                        <span class="text-lg font-bold tracking-tight uppercase">Admin<span class="text-red-600">Panel</span></span>
                    </div>
                </a>

                {{-- User Actions --}}
                <div class="flex items-center gap-3">
                    <div class="hidden md:flex flex-col items-end border-r-2 border-black pr-4 leading-tight">
                        <span class="text-xs font-black uppercase text-gray-500 italic">Administrator</span>
                        <span class="text-sm font-bold">{{ auth()->user()->name }}</span>
                    </div>
                    
                    <form action="{{ route('logout') }}" method="POST" class="ml-1">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none transition-all active:translate-x-[2px] active:translate-y-[2px]">
                            <i class="fa-solid fa-power-off sm:mr-2"></i>
                            <span class="hidden sm:inline uppercase text-xs">Keluar</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    {{-- Main Content Container --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        {{-- Flash Messages --}}
        @if (session('success'))
            <div class="mb-8 p-4 bg-green-100 border-4 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] flex items-center gap-3">
                <div class="bg-black text-white p-2">
                    <i class="fa-solid fa-check-double text-lg"></i>
                </div>
                <span class="font-bold uppercase tracking-tight text-sm">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Admin Breadcrumbs / Info (Optional) --}}
        <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
            <div class="bg-yellow-300 border-2 border-black px-4 py-2 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                <p class="text-xs font-black uppercase tracking-widest">
                    <i class="fa-solid fa-calendar-day mr-2"></i> {{ now()->format('l, d M Y') }}
                </p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('home') }}" target="_blank" class="bg-white hover:bg-gray-100 text-black border-2 border-black px-4 py-2 text-xs font-bold uppercase shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] transition-all">
                    <i class="fa-solid fa-up-right-from-square mr-2"></i> Lihat Situs
                </a>
            </div>
        </div>

        {{-- Page Content --}}
        <div class="relative">
            @yield('content')
        </div>
    </main>

    {{-- Simple Footer --}}
    <footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center">
        <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">
            &copy; {{ date('Y') }} VetoNusvaa Admin System — v1.0.0
        </p>
    </footer>

</body>
</html>