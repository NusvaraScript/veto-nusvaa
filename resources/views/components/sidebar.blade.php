<div class="w-full block p-4 bg-white border-r-2 border-black min-h-screen">
    <div class="flex flex-col gap-6">
        
        {{-- Quick Actions --}}
        <div class="flex flex-col gap-2">
            <x-button 
                variant="solid" 
                route="{{ route('vice.create') }}" 
                class="w-full justify-start border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all py-2 text-xs"
            >
                <i class="fa-solid fa-plus-circle mr-2"></i> 
                <span class="font-bold uppercase tracking-tight">Tambah Kebiasaan</span>
            </x-button>

            <x-button 
                variant="outline" 
                route="{{ route('vice.index') }}" 
                class="w-full justify-start border-2 border-black bg-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all py-2 text-xs"
            >
                <i class="fa-solid fa-magnifying-glass mr-2"></i> 
                <span class="font-bold uppercase tracking-tight text-black">Cari Kebiasaan</span>
            </x-button>
        </div>

        <hr class="border-b border-black opacity-20">

        {{-- Navigation Pages --}}
        <div>
            <div class="flex items-center gap-2 mb-3 bg-white border-2 border-black px-2 py-1 w-fit shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                <i class="fa-solid fa-folder-open text-[9px]"></i>
                <p class="font-bold uppercase text-[9px] tracking-widest">Main Menu</p>
            </div>
            <div class="flex flex-col gap-1">
                <x-button 
                    variant="solid" 
                    route="{{ route('home') }}" 
                    class="w-full text-left border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none transition-all py-2 text-xs"
                >
                    <span class="font-bold uppercase">Dashboard</span>
                </x-button>
            </div>
        </div>

        {{-- Collections/List --}}
        <div>
            <div class="flex items-center gap-2 mb-3 bg-white border-2 border-black px-2 py-1 w-fit shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                <i class="fa-solid fa-list-ul text-[9px]"></i>
                <p class="font-bold uppercase text-[9px] tracking-widest">Database</p>
            </div>
            <div class="flex flex-col gap-2">
                <x-button 
                    variant="outline" 
                    route="{{ route('vice.index') }}" 
                    class="w-full text-left border-2 border-black bg-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:bg-black hover:text-white transition-all font-bold uppercase text-xs py-2"
                >
                    Kebiasaan Buruk
                </x-button>
                <x-button 
                    variant="outline" 
                    route="{{ route('relapse.index') }}" 
                    class="w-full text-left border-2 border-black bg-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:bg-black hover:text-white transition-all font-bold uppercase text-xs py-2"
                >
                    Riwayat Relapse
                </x-button>
            </div>
        </div>

        <hr class="border-b border-black opacity-20">

        {{-- Optional Footer Sidebar Info --}}
        <div class="mt-auto pt-4">
            <div class="border-2 border-black p-3 bg-white italic shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                <p class="text-[9px] font-bold leading-tight uppercase tracking-tighter">"Disiplin adalah jembatan antara cita-cita dan pencapaian."</p>
            </div>
        </div>

    </div>
</div>