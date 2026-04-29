<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased min-h-screen flex flex-col bg-slate-50 text-slate-900">
    <x-navbar />
    <div class="flex flex-1 overflow-hidden">
        @auth
            @if(auth()->user()->role === 'user')
            <aside class="w-64 border-r border-slate-200 overflow-y-auto bg-white/80 backdrop-blur hidden md:block h-full">
                <x-sidebar />
            </aside>
            @endif
        @endauth
        <main class="flex-1 overflow-y-auto h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-4">@yield('content')</div>
            <x-footer />
        </main>
    </div>
    @stack('js')
</body>
</html>
