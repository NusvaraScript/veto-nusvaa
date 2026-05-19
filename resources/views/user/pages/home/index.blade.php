@extends('layout.user')
@section('title', 'Beranda - VetoNusvaa')

@section('content')
    <x-section section="Dashboard">

        {{-- Alert Welcome - Minimalis --}}
        <div class="mb-6 border-2 border-black bg-white p-4">
            <p class="text-sm font-bold text-black italic">
                <i class="fa-solid fa-circle-info mr-2"></i> Pantau progresmu setiap hari untuk membangun kebiasaan yang
                lebih sehat.
            </p>
        </div>

        {{-- Statistik Utama - Selaras dengan Admin --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-10">
            <div class="border-2 border-black bg-white p-6 shadow-[4px_4px_0px_#000] relative overflow-hidden group">
                <p class="text-[10px] font-black uppercase italic text-gray-400">Total Kebiasaan</p>
                <p class="text-5xl font-black mt-2 tracking-tighter">{{ $totalVices }}</p>
                <div class="absolute -right-4 -bottom-4 text-gray-50 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fa-solid fa-layer-group text-8xl"></i>
                </div>
            </div>

            <div class="border-2 border-black bg-white p-6 shadow-[4px_4px_0px_#000] relative overflow-hidden group">
                <p class="text-[10px] font-black uppercase italic text-red-600">Total Relapse</p>
                <p class="text-5xl font-black mt-2 tracking-tighter text-black">{{ $totalRelapses }}</p>
                <div class="absolute -right-4 -bottom-4 text-red-50 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fa-solid fa-triangle-exclamation text-8xl text-red-600"></i>
                </div>
            </div>

            <div class="border-2 border-black bg-white p-6 shadow-[4px_4px_0px_#000] relative overflow-hidden group">
                <p class="text-[10px] font-black uppercase italic text-green-600">Rata-rata Streak</p>
                <p class="text-5xl font-black mt-2 tracking-tighter text-black">{{ $avgStreak }} <span class="text-xl font-bold">Hari</span></p>
                <div class="absolute -right-4 -bottom-4 text-green-50 opacity-10 group-hover:opacity-20 transition-opacity">
                    <i class="fa-solid fa-fire text-8xl text-green-600"></i>
                </div>
            </div>
        </div>

        {{-- Distribusi Keparahan - Selaras dengan Admin --}}
        <div class="mb-10 grid grid-cols-1 sm:grid-cols-3 gap-6">
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
        {{-- Tabel Data & List - Fokus pada Konten --}}
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

            {{-- Streak Tertinggi --}}
            <div class="border-2 border-black bg-white shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                <div class="border-b-2 border-black p-3 bg-gray-50">
                    <h3 class="text-sm font-black uppercase tracking-tight">Streak Tertinggi</h3>
                </div>
                <div class="p-4">
                    @forelse ($topStreakVices as $vice)
                        <div class="flex justify-between items-center mb-2 last:mb-0 border-b border-gray-100 pb-2">
                            <span class="text-sm font-bold uppercase">{{ $vice->habit_name }}</span>
                            <span class="text-sm font-black text-green-600">{{ $vice->streak_days }} HARI</span>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400 italic">Belum ada data.</p>
                    @endforelse
                </div>
            </div>

            {{-- Relapse Terbaru --}}
            <div class="border-2 border-black bg-white shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                <div class="border-b-2 border-black p-3 bg-gray-50">
                    <h3 class="text-sm font-black uppercase tracking-tight text-red-600">Relapse Terbaru</h3>
                </div>
                <div class="p-4">
                    @forelse ($latestRelapses as $relapse)
                        <div class="flex justify-between items-center mb-2 last:mb-0 border-b border-gray-100 pb-2">
                            <span class="text-sm font-bold uppercase">{{ $relapse->vice->habit_name ?? '-' }}</span>
                            <span
                                class="text-[10px] font-bold text-gray-400">{{ \Carbon\Carbon::parse($relapse->violation_date)->format('d/m/y') }}</span>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400 italic">Bersih dari relapse.</p>
                    @endforelse
                </div>
            </div>

        </div>

        {{-- Action Buttons - Simple & Bold --}}
        <div class="mt-8 flex flex-wrap gap-3">
            <x-button route="{{ route('vice.create') }}"
                class="border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] text-xs">
                + Tambah
            </x-button>
            <x-button route="{{ route('relapse.create') }}" variant="outline"
                class="border-2 border-black bg-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] text-xs text-red-600">
                Catat Relapse
            </x-button>
        </div>

    </x-section>
@endsection
