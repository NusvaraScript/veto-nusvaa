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
<body class="antialiased h-screen flex flex-col bg-gray-50 text-slate-900">

    <x-admin-navbar />

    <div class="flex flex-1 overflow-hidden relative">
        
        {{-- BACKDROP --}}
        <div 
            id="adminSidebarBackdrop"
            class="fixed inset-0 z-40 bg-black/50 hidden md:hidden opacity-0 transition-opacity duration-300"
        ></div>

        {{-- SIDEBAR --}}
        <aside 
            id="adminSidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 md:w-16 md:hover:w-64 border-r-2 border-black bg-white -translate-x-full transition-all duration-300 ease-in-out 
                   md:relative md:translate-x-0 md:flex md:flex-col group overflow-hidden"
        >
            {{-- Tombol Close Mobile --}}
            <div class="flex justify-end p-4 md:hidden">
                <button id="closeAdminSidebar" class="text-black border-2 border-black px-2 py-1 bg-red-500 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-hidden md:group-hover:overflow-y-auto">
                <x-admin-sidebar />
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-y-auto h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-4">
                
                {{-- Success Alert --}}
                @if (session('success'))
                    <div class="p-4 bg-green-400 border-2 border-black font-bold uppercase text-xs shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                        <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
            <x-footer />
        </main>
    </div>

    {{-- VANILLA JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('adminSidebar');
            const backdrop = document.getElementById('adminSidebarBackdrop');
            const btnClose = document.getElementById('closeAdminSidebar');
            
            // Cari tombol hamburger di Navbar
            const btnOpen = document.getElementById('openAdminSidebar');

            function toggleSidebar(isOpen) {
                if (isOpen) {
                    sidebar.classList.remove('-translate-x-full');
                    backdrop.classList.remove('hidden');
                    setTimeout(() => backdrop.classList.add('opacity-100'), 10);
                } else {
                    sidebar.classList.add('-translate-x-full');
                    backdrop.classList.remove('opacity-100');
                    setTimeout(() => backdrop.classList.add('hidden'), 300);
                }
            }

            if(btnOpen) btnOpen.addEventListener('click', () => toggleSidebar(true));
            if(btnClose) btnClose.addEventListener('click', () => toggleSidebar(false));
            if(backdrop) backdrop.addEventListener('click', () => toggleSidebar(false));
        });
    </script>

    @stack('js')
</body>
</html>