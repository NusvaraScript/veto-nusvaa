    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white h-screen flex flex-col">
    <x-navbar />

    <div class="flex flex-1 overflow-hidden">   
        <aside class="w-64 border-r-2 border-black overflow-y-auto bg-gray-50 hidden md:block h-full">
            <x-sidebar />
        </aside>
        <main class="flex-1 overflow-y-auto h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                @yield('content')
            </div>

            <x-footer />
        </main>
    
    </div>
    @stack('js')
</body>
</html>