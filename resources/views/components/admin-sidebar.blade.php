<div class="w-full h-full bg-white flex flex-col py-6 overflow-x-hidden">
    {{-- Kita pakai items-center di sini supaya semua box lurus di tengah saat collapse --}}
    <div class="flex flex-col items-center md:items-start gap-8 h-full px-2 md:px-2">

        {{-- Navigasi Menu --}}
        <div class="flex flex-col gap-4 w-full">
            {{-- Menu Label --}}
            <div class="flex items-center w-full">
                <div class="w-12 flex justify-center flex-shrink-0">
                    <i class="fa-solid fa-ellipsis text-xs opacity-30"></i>
                </div>
                <span class="ml-4 text-[10px] font-black uppercase tracking-widest whitespace-nowrap opacity-0 group-hover:opacity-100">Menu</span>
            </div>
            
            {{-- List Tombol --}}
            <div class="flex flex-col gap-3 w-full">
                
                <x-sidebar-link 
                    route="{{ route('admin.dashboard') }}" 
                    icon="fa-solid fa-chart-line" 
                    label="Dashboard" />

                <x-sidebar-link 
                    route="{{ route('admin.users.index') }}" 
                    icon="fa-solid fa-users" 
                    label="Kelola User" />

            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="mt-auto pb-6 w-full">
            <x-sidebar-link 
                route="{{ route('home') }}" 
                target="_blank"
                icon="fa-solid fa-arrow-up-right-from-square" 
                label="Lihat Web" 
                iconBg="bg-red-500" 
                iconText="text-white" />
        </div>

    </div>
</div>