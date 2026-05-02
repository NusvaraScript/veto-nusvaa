<div class="w-full h-full bg-white flex flex-col py-6 overflow-x-hidden">
    {{-- Kita pakai items-center di sini supaya semua box lurus di tengah saat collapse --}}
    <div class="flex flex-col items-center md:items-start gap-8 h-full px-2 md:px-2">
        
        {{-- Logo Section --}}
        <div class="flex items-center w-full">
            {{-- Wrapper Logo: Dibuat kotak sempurna --}}
            <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-black border-2 border-black shadow-[3px_3px_0px_0px_rgba(220,38,38,1)]">
                <span class="text-sm font-black italic text-white leading-none">VN</span>
            </div>
            {{-- Teks Logo: Muncul saat hover --}}
            <span class="ml-4 text-sm font-black tracking-tighter uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                Admin<span class="text-red-600">Panel</span>
            </span>
        </div>

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
                
                {{-- Tombol Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center w-full group/link transition-all">
                    {{-- Ikon Box: Dibuat W-12 H-12 (Kotak Sempurna) --}}
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                        <i class="fa-solid fa-chart-line text-lg"></i>
                    </div>
                    {{-- Teks --}}
                    <span class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                        Dashboard
                    </span>
                </a>

                {{-- Tombol Kelola User --}}
                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center w-full group/link transition-all">
                    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                        <i class="fa-solid fa-users text-lg"></i>
                    </div>
                    <span class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                        Kelola User
                    </span>
                </a>

            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="mt-auto pb-6 w-full">
            <a href="{{ route('home') }}" target="_blank"
                class="flex items-center w-full group/link transition-all">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center bg-red-500 text-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
                    <i class="fa-solid fa-arrow-up-right-from-square text-sm"></i>
                </div>
                <span class="ml-4 text-[10px] font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
                    Lihat Web
                </span>
            </a>
        </div>

    </div>
</div>