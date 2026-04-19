<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white">
    <x-navbar />

    <div class="flex flex-1 overflow-hidden">
        <aside class="w-64 border-r-2 border-black overflow-y-auto bg-gray-50 hidden md:block">
            <x-sidebar />
        </aside>
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>

            <x-footer />
        </main>
    
    </div>
    @stack('js')
</body>
</html>