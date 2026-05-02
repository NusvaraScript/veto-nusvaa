<div class="flex h-screen overflow-hidden">

    {{-- Sidebar --}}
    <aside
        class="w-20 hover:w-64 h-screen bg-white border-r-4 border-black transition-all duration-300 group flex-shrink-0 overflow-hidden">

        <div class="w-full h-full flex flex-col py-6 overflow-x-hidden">

            {{-- Wrapper --}}
            <div class="flex flex-col items-center hover:items-start gap-8 h-full px-2">

                {{-- Logo Section --}}
                <div class="flex items-center w-full">

                    <div
                        class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-black border-2 border-black shadow-[3px_3px_0px_0px_rgba(220,38,38,1)]">
                        <span class="text-sm font-black italic text-white leading-none">
                            VN
                        </span>
                    </div>

                    <span
                        class="ml-4 text-sm font-black tracking-tighter uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                        Veto<span class="text-red-600">Nusvaa</span>
                    </span>

                </div>

                {{-- Navigation --}}
                <div class="flex flex-col gap-4 w-full">

                    {{-- Label --}}
                    <div class="flex items-center w-full">

                        <div class="w-12 flex justify-center flex-shrink-0">
                            <i class="fa-solid fa-ellipsis text-xs opacity-30"></i>
                        </div>

                        <span
                            class="ml-4 text-[10px] font-black uppercase tracking-widest whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                            Menu
                        </span>

                    </div>

                    {{-- Menu List --}}
                    <div class="flex flex-col gap-3 w-full">

                        {{-- Tambah --}}
                        <a href="{{ route('vice.create') }}" class="flex items-center w-full group/link transition-all">

                            <div
                                class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-red-600 text-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                                <i class="fa-solid fa-plus-circle text-lg"></i>
                            </div>

                            <span
                                class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                                Tambah
                            </span>

                        </a>

                        {{-- Cari Data --}}
                        <a href="{{ route('vice.index') }}" class="flex items-center w-full group/link transition-all">

                            <div
                                class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                                <i class="fa-solid fa-magnifying-glass text-lg"></i>
                            </div>

                            <span
                                class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                                Cari Data
                            </span>

                        </a>

                        {{-- Label --}}
                        <div class="flex items-center w-full pt-2">

                            <div class="w-12 flex justify-center flex-shrink-0">
                                <i class="fa-solid fa-ellipsis text-xs opacity-30"></i>
                            </div>

                            <span
                                class="ml-4 text-[10px] font-black uppercase tracking-widest whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                                Lainnya
                            </span>

                        </div>
                        {{-- Dashboard --}}
                        <a href="{{ route('home') }}" class="flex items-center w-full group/link transition-all">

                            <div
                                class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                                <i class="fa-solid fa-chart-line text-lg"></i>
                            </div>

                            <span
                                class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                                Dashboard
                            </span>

                        </a>

                        {{-- Kebiasaan --}}
                        <a href="{{ route('vice.index') }}" class="flex items-center w-full group/link transition-all">

                            <div
                                class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                                <i class="fa-solid fa-handshake-simple text-lg"></i>
                            </div>

                            <span
                                class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                                Kebiasaan
                            </span>

                        </a>

                        {{-- Riwayat --}}
                        <a href="{{ route('relapse.index') }}"
                            class="flex items-center w-full group/link transition-all">

                            <div
                                class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                                <i class="fa-solid fa-history text-lg"></i>
                            </div>

                            <span
                                class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                                Riwayat
                            </span>

                        </a>

                    </div>

                </div>

                {{-- Bottom Section --}}
                <div class="mt-auto pb-6 w-full">

                    <div class="flex items-center w-full">

                        <div
                            class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                            <i class="fa-solid fa-quote-left text-xs text-red-600"></i>
                        </div>

                        <div class="ml-4 opacity-0 group-hover:opacity-100 transition-all duration-300 overflow-hidden">
                            <p class="text-[10px] font-black uppercase italic whitespace-nowrap">
                                Stay Disciplined.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </aside>
</div>
