<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased h-screen flex flex-col bg-slate-50 text-slate-900">
    <x-navbar />

    <div class="flex flex-1 overflow-hidden">
        <aside class="w-64 border-r-2 border-black overflow-y-auto bg-gray-50 hidden md:block h-full">
            <x-sidebar />
        </aside>

        <main class="flex-1 overflow-y-auto h-full">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-y-4">
                @if (session('success'))
                    <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-800 shadow-sm">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-circle-check mt-1"></i>
                            <p class="text-sm font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-800 shadow-sm">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-triangle-exclamation mt-1"></i>
                            <p class="text-sm font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @yield('content')
            </div>

            <x-footer />
        </main>
    </div>

    @stack('js')
</body>

</html>
