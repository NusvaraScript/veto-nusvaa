@extends('admin.layout.app')
@section('title', 'Dashboard Admin — VetoNusvaa')

@section('content')
    {{-- Header Section --}}
    <div class="mb-10">
        <h1 class="text-3xl font-black uppercase italic tracking-tighter text-black">
            System Overview<span class="text-red-600">.</span>
        </h1>
        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Laporan statistik real-time platform VetoNusvaa.</p>
        <div class="mt-3 h-1.5 w-16 bg-black"></div>
    </div>

    {{-- Statistik Pengguna --}}
    <h2 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-4 flex items-center gap-2">
        <span class="w-2 h-2 bg-red-600"></span> User Analytics
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
        <div class="border-2 border-black bg-white p-6 shadow-[4px_4px_0px_#000] relative overflow-hidden group">
            <p class="text-[10px] font-black uppercase italic text-gray-400">Total User</p>
            <p class="text-5xl font-black mt-2 tracking-tighter">{{ $totalUsers }}</p>
            <div class="absolute -right-4 -bottom-4 text-gray-50 opacity-10 group-hover:opacity-20 transition-opacity">
                <i class="fa-solid fa-users text-8xl"></i>
            </div>
        </div>
        <div class="border-2 border-black bg-white p-6 shadow-[4px_4px_0px_#000]">
            <p class="text-[10px] font-black uppercase italic text-green-600">Baru Bulan Ini</p>
            <p class="text-5xl font-black mt-2 tracking-tighter text-black">{{ $newUsersThisMonth }}</p>
            <div class="mt-2 text-[9px] font-bold uppercase bg-green-100 text-green-700 px-2 py-0.5 inline-block border border-green-200">Growth Active</div>
        </div>
        <div class="border-2 border-black bg-white p-6 shadow-[4px_4px_0px_#000]">
            <p class="text-[10px] font-black uppercase italic text-blue-600">Baru Minggu Ini</p>
            <p class="text-5xl font-black mt-2 tracking-tighter text-black">{{ $newUsersThisWeek }}</p>
            <div class="mt-2 text-[9px] font-bold uppercase bg-blue-100 text-blue-700 px-2 py-0.5 inline-block border border-blue-200">Weekly Spike</div>
        </div>
    </div>

    {{-- Statistik Konten --}}
    <h2 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-4 flex items-center gap-2">
        <span class="w-2 h-2 bg-black"></span> Content Metrics
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-10">
        <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000] border-l-[12px]">
            <p class="text-[10px] font-black uppercase italic">Total Kebiasaan</p>
            <p class="text-3xl font-black mt-1">{{ $totalVices }}</p>
        </div>
        <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000] border-l-[12px] border-l-red-600">
            <p class="text-[10px] font-black uppercase italic text-red-600">Total Relapse</p>
            <p class="text-3xl font-black mt-1">{{ $totalRelapses }}</p>
        </div>
        <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000] border-l-[12px] border-l-yellow-400">
            <p class="text-[10px] font-black uppercase italic text-yellow-600">Avg Vice / User</p>
            <p class="text-3xl font-black mt-1">{{ $avgVicesPerUser }}</p>
        </div>
        <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000] border-l-[12px] border-l-orange-500">
            <p class="text-[10px] font-black uppercase italic text-orange-600">Avg Relapse / User</p>
            <p class="text-3xl font-black mt-1">{{ $avgRelapsesPerUser }}</p>
        </div>
    </div>

    {{-- Distribusi Keparahan --}}
    <h2 class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-4 flex items-center gap-2">
        <span class="w-2 h-2 bg-yellow-400"></span> Severity Distribution
    </h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="border-2 border-black bg-green-500 p-6 shadow-[6px_6px_0px_#000] text-white">
            <p class="text-[10px] uppercase font-black italic tracking-widest">Rendah</p>
            <p class="text-4xl font-black mt-1">{{ $vicesRendah }}</p>
            <p class="text-[9px] font-bold uppercase mt-2 opacity-80 italic">Status: Aman</p>
        </div>
        <div class="border-2 border-black bg-yellow-400 p-6 shadow-[6px_6px_0px_#000] text-black">
            <p class="text-[10px] uppercase font-black italic tracking-widest">Sedang</p>
            <p class="text-4xl font-black mt-1">{{ $vicesSedang }}</p>
            <p class="text-[9px] font-bold uppercase mt-2 opacity-60 italic">Status: Pantau</p>
        </div>
        <div class="border-2 border-black bg-red-600 p-6 shadow-[6px_6px_0px_#000] text-white">
            <p class="text-[10px] uppercase font-black italic tracking-widest">Tinggi</p>
            <p class="text-4xl font-black mt-1">{{ $vicesTinggi }}</p>
            <p class="text-[9px] font-bold uppercase mt-2 opacity-80 italic">Status: Kritis</p>
        </div>
    </div>
@endsection