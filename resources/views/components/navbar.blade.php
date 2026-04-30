<nav class="bg-white border-b-4 border-black sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="group flex items-center">
                <span class="text-2xl font-black tracking-tighter text-black italic transition-transform group-hover:-rotate-2">
                    Veto<span class="text-red-600">Nusvaa</span>.
                </span>
            </a>

            {{-- User Navigation --}}
            <div class="flex items-center gap-3">
                @auth
                    {{-- User Profile Info --}}
                    <div class="hidden md:flex items-center gap-2 border-l-2 border-black pl-4 h-8">
                        <span class="text-xs font-black uppercase tracking-tight text-gray-500">
                            {{ auth()->user()->name }}
                        </span>
                    </div>

                    {{-- Logout Button --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="flex items-center gap-2 bg-white text-black border-2 border-black px-4 py-1.5 font-black uppercase text-xs shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] hover:bg-red-500 hover:text-white transition-all active:scale-95"
                        >
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="hidden sm:inline">Keluar</span>
                        </button>
                    </form>
                @else
                    {{-- Guest Buttons --}}
                    <div class="flex items-center gap-3">
                        <a href="{{ route('login') }}" 
                           class="text-xs font-black uppercase border-2 border-black px-4 py-1.5 bg-white text-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" 
                           class="text-xs font-black uppercase border-2 border-black px-4 py-1.5 bg-red-600 text-white shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all">
                            Daftar
                        </a>
                    </div>
                @endauth
                <button id="openSidebar" class="inline-flex md:hidden items-center justify-center border-2 border-black bg-white p-2 text-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:shadow-none active:translate-x-[1px] active:translate-y-[1px] transition-all">
                    <i class="fa-solid fa-bars-staggered text-xl"></i>
                </button>
            </div>

        </div>
    </div>
</nav>