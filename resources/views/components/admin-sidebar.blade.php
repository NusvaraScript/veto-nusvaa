<div class="w-full block p-4 bg-white border-r-2 border-black min-h-screen">
    <div class="flex flex-col gap-6">
        <div>
            <div class="flex items-center gap-2 mb-3 bg-white border-2 border-black px-2 py-1 w-fit shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
                <i class="fa-solid fa-folder-open text-[9px]"></i>
                <p class="font-bold uppercase text-[9px] tracking-widest">Admin Menu</p>
            </div>
            <div class="flex flex-col gap-2">
                <a href="{{ route('admin.dashboard') }}" class="w-full text-left border-2 border-black bg-white px-3 py-2 shadow-[2px_2px_0px_#000] text-xs font-bold uppercase hover:bg-black hover:text-white transition-all">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="w-full text-left border-2 border-black bg-white px-3 py-2 shadow-[2px_2px_0px_#000] text-xs font-bold uppercase hover:bg-black hover:text-white transition-all">Kelola User</a>
            </div>
        </div>

        <hr class="border-b border-black opacity-20">

        <div class="mt-auto pt-4">
            <a href="{{ route('home') }}" target="_blank" class="block border-2 border-black p-3 bg-yellow-200 shadow-[2px_2px_0px_#000] text-[10px] font-bold uppercase">Lihat Halaman User</a>
        </div>
    </div>
</div>
