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
<body class="antialiased h-screen flex flex-col bg-gray-50 text-slate-900 font-sans">
    <nav class="bg-white border-b-4 border-black sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <button id="openAdminSidebar" class="md:hidden border-2 border-black px-2 py-1 bg-white">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 group">
                        <div class="bg-black text-white p-1 border-2 border-black"><span class="text-xl font-black tracking-tighter italic px-1">VN.</span></div>
                        <div class="hidden sm:block"><span class="text-lg font-bold tracking-tight uppercase">Admin<span class="text-red-600">Panel</span></span></div>
                    </a>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 border-2 border-black">Keluar</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="flex flex-1 overflow-hidden relative">
        <div id="adminSidebarBackdrop" class="fixed inset-0 z-40 bg-black/50 hidden md:hidden opacity-0 transition-opacity duration-300"></div>
        <aside id="adminSidebar" class="fixed inset-y-0 left-0 z-50 w-64 border-r-2 border-black bg-white -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0 md:flex md:flex-col">
            <div class="flex justify-end p-4 md:hidden">
                <button id="closeAdminSidebar" class="text-black border-2 border-black px-2 py-1 bg-red-500"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="flex-1 overflow-y-auto">
                <x-admin-sidebar />
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 border-4 border-black">{{ session('success') }}</div>
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
                setTimeout(() => backdrop.classList.add('opacity-100'), 10);
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.remove('opacity-100');
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
