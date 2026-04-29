<nav class="bg-white border-b-2 border-black sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-12 items-center">
            <div class="flex items-center">
                <a href="{{ auth()->check() ? route('dashboard.redirect') : route('landing') }}" class="text-2xl font-bold text-black">Veto<span class="text-red-700">Nusvaa</span>.</a>
            </div>

            <div class="flex items-center gap-2">
                @guest
                    <x-button variant="outline" route="{{ route('login') }}">Masuk</x-button>
                    <x-button route="{{ route('register') }}">Daftar</x-button>
                @else
                    <span class="text-sm font-medium text-slate-700">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="inline-flex items-center justify-center rounded-xl px-4 py-2 text-sm font-semibold uppercase tracking-wide transition-all duration-200 bg-slate-900 text-white hover:bg-slate-700">Keluar</button>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
