<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin — VetoNusvaa')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @if(app()->environment('local'))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>
{{-- Perbaikan: Menambahkan kutipan penutup pada class body --}}
<body class="antialiased h-screen flex flex-col bg-gray-50 text-slate-900 font-sans">

    {{-- Top Navbar --}}
    <nav class="bg-white border-b-4 border-black sticky top-0 z-50 overflow-hidden">

        <div class="w-full px-4 sm:px-6 lg:px-8">
    
            <div class="flex justify-between items-center h-16">
    
                {{-- Left Section --}}
                <div class="flex items-center gap-3 min-w-0">
    
                    {{-- Mobile Toggle --}}
                    <button
                        id="openAdminSidebar"
                        class="md:hidden flex-shrink-0 border-2 border-black px-2 py-1 bg-white hover:bg-gray-100 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all"
                    >
                        <i class="fa-solid fa-bars"></i>
                    </button>
    
                    {{-- Logo --}}
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center gap-2 min-w-0">
    
                        <div class="flex-shrink-0 bg-black text-white p-1 border-2 border-black shadow-[2px_2px_0px_0px_rgba(220,38,38,1)]">
                            <span class="text-xl font-black tracking-tighter italic px-1">
                                VN.
                            </span>
                        </div>
    
                        <div class="hidden sm:block truncate">
                            <span class="text-lg font-black tracking-tight uppercase whitespace-nowrap">
                                Admin<span class="text-red-600">Panel</span>
                            </span>
                        </div>
    
                    </a>
    
                </div>
    
                {{-- Right Section --}}
                <div class="flex items-center gap-3 flex-shrink-0">
    
                    {{-- User --}}
                    @auth
                        <div class="hidden md:flex items-center gap-2 border-l-2 border-black pl-4 h-8">
    
                            <div class="w-7 h-7 flex items-center justify-center border-2 border-black bg-white">
                                <i class="fa-solid fa-user text-[10px]"></i>
                            </div>
    
                            <span class="text-xs font-black uppercase whitespace-nowrap">
                                {{ auth()->user()->name }}
                            </span>
    
                        </div>
                    @endauth
    
                    {{-- Logout --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
    
                        <button
                            type="submit"
                            class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white font-black uppercase text-xs py-2 px-4 border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all"
                        >
                            <i class="fa-solid fa-right-from-bracket"></i>
    
                            <span class="hidden sm:inline">
                                Keluar
                            </span>
                        </button>
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
    </nav>

    {{-- Main Content Container --}}
    <div class="flex flex-1 overflow-hidden relative">
        
        {{-- Backdrop --}}
        <div id="adminSidebarBackdrop" class="fixed inset-0 z-40 bg-black/50 hidden md:hidden opacity-0 transition-opacity duration-300"></div>
        
        {{-- Sidebar --}}
        <aside id="adminSidebar" class="fixed inset-y-0 left-0 z-50 w-64 md:w-16 md:hover:w-64 border-r-2 border-black bg-white -translate-x-full transition-all duration-300 ease-in-out md:relative md:translate-x-0 md:flex md:flex-col group overflow-hidden shadow-[4px_0px_0px_0px_rgba(0,0,0,1)] md:shadow-none">
            
            {{-- Close Button Mobile --}}
            <div class="flex justify-end p-4 md:hidden">
                <button id="closeAdminSidebar" class="text-white border-2 border-black px-2 py-1 bg-red-600 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            {{-- Sidebar Component --}}
            <div class="flex-1 overflow-y-hidden md:group-hover:overflow-y-auto pt-4 md:pt-0">
                <x-admin-sidebar />
            </div>
        </aside>

        {{-- Page Content --}}
        <main class="flex-1 overflow-y-auto h-full bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                
                {{-- Success Alert --}}
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-400 border-2 border-black font-bold uppercase text-xs shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('adminSidebar');
        const backdrop = document.getElementById('adminSidebarBackdrop');
        const openBtn = document.getElementById('openAdminSidebar');
        const closeBtn = document.getElementById('closeAdminSidebar');

        const toggle = (open) => {
            if (open) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                // Kecil delay untuk trigger transisi opacity
                setTimeout(() => backdrop.classList.add('opacity-100'), 10);
                document.body.classList.add('overflow-hidden'); // Kunci scroll saat menu buka
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.remove('opacity-100');
                document.body.classList.remove('overflow-hidden');
                setTimeout(() => backdrop.classList.add('hidden'), 300);
            }
        };

        openBtn?.addEventListener('click', () => toggle(true));
        closeBtn?.addEventListener('click', () => toggle(false));
        backdrop?.addEventListener('click', () => toggle(false));
    });
</script>

</body>
</html>