<nav class="bg-white border-b-2 border-black sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-12">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="text-2xl font-bold text-black">
                Veto<span class="text-red-700">Nusvaa</span>.
            </a>

            {{-- User Info & Logout --}}
            @auth
                <div class="flex items-center gap-3">
                    <span class="text-sm text-gray-600 hidden sm:block">
                        <i class="fa-solid fa-circle-user mr-1"></i>
                        {{ auth()->user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="text-sm border-2 border-black px-3 py-1 font-bold uppercase hover:bg-red-600 hover:text-white hover:border-red-600 transition-all active:scale-95"
                        >
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="hidden sm:inline ml-1">Keluar</span>
                        </button>
                    </form>
                </div>
            @else
                <div class="flex items-center gap-2">
                    <a href="{{ route('login') }}" class="text-sm border-2 border-black px-3 py-1 font-bold uppercase hover:bg-black hover:text-white transition-all">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="text-sm border-2 border-black px-3 py-1 font-bold uppercase bg-red-600 text-white hover:bg-black transition-all">
                        Daftar
                    </a>
                </div>
            @endauth

        </div>
    </div>
</nav>
