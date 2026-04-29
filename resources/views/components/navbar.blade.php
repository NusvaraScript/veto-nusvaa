<nav class="bg-white border-b-2 border-black sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12 items-center">
            <a href="{{ auth()->check() ? route('dashboard.redirect') : route('landing') }}" class="text-2xl font-bold text-black">Veto<span class="text-red-700">Nusvaa</span>.</a>
            <div class="flex items-center gap-2">
                @guest
                    <x-button variant="outline" route="{{ route('login') }}">Login</x-button>
                    <x-button route="{{ route('register') }}">Register</x-button>
                @else
                    <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">@csrf<button class="rounded-lg border border-slate-300 px-3 py-1 text-sm">Logout</button></form>
                @endguest
            </div>
        </div>
    </div>
</nav>
