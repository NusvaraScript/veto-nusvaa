<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @if(app()->environment('local'))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body class="antialiased h-screen flex flex-col bg-white text-slate-900">
    
    <x-navbar />

    <div class="flex flex-1 overflow-hidden relative">
        
        {{-- BACKDROP --}}
        <div 
            id="sidebarBackdrop"
            class="fixed inset-0 z-40 bg-black/50 hidden md:hidden opacity-0 transition-opacity duration-300"
        ></div>

        {{-- SIDEBAR --}}
        <aside 
            id="mobileSidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 border-r-2 border-black bg-white -translate-x-full transition-transform duration-300 ease-in-out 
                   md:relative md:translate-x-0 md:flex md:flex-col"
        >
            {{-- Tombol Close Mobile --}}
            <div class="flex justify-end p-4 md:hidden">
                <button id="closeSidebar" class="text-black border-2 border-black px-2 py-1 bg-red-500 shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="flex-1 overflow-y-auto">
                <x-sidebar />
            </div>
        </aside>

        {{-- MAIN CONTENT --}}
        <main class="flex-1 overflow-y-auto h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-4">
                @yield('content')
            </div>
            <x-footer />
        </main>
    </div>

    {{-- VANILLA JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('mobileSidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            const btnClose = document.getElementById('closeSidebar');
            
            // Cari tombol hamburger di Navbar (Pastikan di Navbar id-nya 'openSidebar')
            const btnOpen = document.getElementById('openSidebar');

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