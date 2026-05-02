<nav class="bg-white border-b-4 border-black sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center h-16">

            {{-- Left Section --}}
            <div class="flex items-center gap-3">

                {{-- Mobile Sidebar Toggle --}}
                <button
                    id="openSidebar"
                    class="md:hidden border-2 border-black px-2 py-1 bg-white hover:bg-gray-100 active:translate-y-0.5 transition-all shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px]"
                >
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">

                    <div class="bg-black text-white p-1 border-2 border-black shadow-[2px_2px_0px_0px_rgba(220,38,38,1)]">
                        <span class="text-xl font-black tracking-tighter italic px-1">
                            VN.
                        </span>
                    </div>

                    <div class="hidden sm:block">
                        <span class="text-lg font-black tracking-tight uppercase">
                            Veto<span class="text-red-600">Nusvaa</span>
                        </span>
                    </div>

                </a>

            </div>

            {{-- Right Section --}}
            <div class="flex items-center gap-4">

                @auth

                    {{-- User Info --}}
                    <div class="hidden md:flex items-center gap-2 border-l-2 border-black pl-4 h-8">

                        <div class="w-7 h-7 flex items-center justify-center border-2 border-black bg-white text-black">
                            <i class="fa-solid fa-user text-[10px]"></i>
                        </div>

                        <span class="text-xs font-black uppercase tracking-tight text-gray-700 whitespace-nowrap">
                            {{ auth()->user()->name }}
                        </span>

                    </div>

                    {{-- Logout --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button
                            type="submit"
                            class="flex items-center gap-2 bg-red-500 hover:bg-red-600 text-white border-2 border-black px-4 py-2 font-black uppercase text-xs shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all"
                        >
                            <i class="fa-solid fa-right-from-bracket"></i>

                            <span class="hidden sm:inline">
                                Keluar
                            </span>
                        </button>

                    </form>

                @else

                    {{-- Guest Buttons --}}
                    <div class="flex items-center gap-3">

                        <a
                            href="{{ route('login') }}"
                            class="text-xs font-black uppercase border-2 border-black px-4 py-2 bg-white text-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all"
                        >
                            Masuk
                        </a>

                        <a
                            href="{{ route('register') }}"
                            class="text-xs font-black uppercase border-2 border-black px-4 py-2 bg-red-600 text-white shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px] transition-all"
                        >
                            Daftar
                        </a>

                    </div>

                @endauth

            </div>

        </div>

    </div>

</nav>