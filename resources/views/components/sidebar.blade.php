<div class="w-full h-full bg-white flex flex-col py-6 overflow-x-hidden">
    <div class="flex flex-col items-center md:items-start gap-8 h-full px-2 md:px-2">
        {{-- Navigation --}}
        <div class="flex flex-col gap-4 w-full">
            {{-- Label --}}
            <div class="flex items-center w-full">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <i class="fa-solid fa-ellipsis text-xs opacity-30"></i>
                </div>
                <span class="ml-4 text-[10px] font-black uppercase tracking-widest whitespace-nowrap opacity-0 group-hover:opacity-100">Menu</span>
            </div>

            {{-- Menu List --}}
            <div class="flex flex-col gap-3 w-full">
                <x-sidebar-link 
                    route="{{ route('vice.create') }}" 
                    icon="fa-solid fa-plus-circle" 
                    label="Tambah"
                    iconBg="bg-red-600"
                    iconText="text-white" />

                <x-sidebar-link 
                    route="{{ route('vice.index') }}" 
                    icon="fa-solid fa-magnifying-glass" 
                    label="Cari Data" />
            </div>

            {{-- Label --}}
            <div class="flex items-center w-full pt-2">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <i class="fa-solid fa-ellipsis text-xs opacity-30"></i>
                </div>
                <span class="ml-4 text-[10px] font-black uppercase tracking-widest whitespace-nowrap opacity-0 group-hover:opacity-100">Lainnya</span>
            </div>

            <div class="flex flex-col gap-3 w-full">
                <x-sidebar-link 
                    route="{{ route('home') }}" 
                    icon="fa-solid fa-chart-line" 
                    label="Dashboard" />

                <x-sidebar-link 
                    route="{{ route('vice.index') }}" 
                    icon="fa-solid fa-handshake-simple" 
                    label="Kebiasaan" />

                <x-sidebar-link 
                    route="{{ route('relapse.index') }}" 
                    icon="fa-solid fa-history" 
                    label="Riwayat" />
            </div>
        </div>

        {{-- Bottom --}}
        <div class="mt-auto pb-6 w-full">
            <div class="flex items-center w-full">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <i class="fa-solid fa-quote-left text-xs text-red-600"></i>
                </div>
                <div class="ml-4 overflow-hidden">
                    <p class="text-[10px] font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                        Stay Disciplined.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>