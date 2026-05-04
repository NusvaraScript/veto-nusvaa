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

        {{-- Statistik Utama - Bersih --}}
        <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-3">
            <x-card class="border-2 border-black rounded-none shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] bg-white">
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500">Total Kebiasaan</p>
                <p class="mt-1 text-3xl font-black">{{ $totalVices }}</p>
            </x-card>

            <x-card class="border-2 border-black rounded-none shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] bg-white">
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 text-red-600">Total Relapse</p>
                <p class="mt-1 text-3xl font-black text-red-600">{{ $totalRelapses }}</p>
            </x-card>

            <x-card class="border-2 border-black rounded-none shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] bg-white">
                <p class="text-[10px] font-bold uppercase tracking-widest text-gray-500 text-green-600">Rata-rata Streak</p>
                <p class="mt-1 text-3xl font-black text-green-600">{{ $avgStreak }} <span
                        class="text-sm font-bold">Hari</span></p>
            </x-card>
        </div>

        {{-- Distribusi Keparahan - Minimalis & Lancip --}}
        <div class="mb-6 border-2 border-black bg-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]">
            <div class="border-b-2 border-black p-3 bg-gray-50">
                <h3 class="text-xs font-black uppercase tracking-tight">Analisis Keparahan</h3>
            </div>
            <div class="grid grid-cols-1 divide-y-2 divide-black sm:grid-cols-3 sm:divide-y-0 sm:divide-x-2">
                <div class="p-4 flex items-center justify-between sm:flex-col sm:items-start gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-green-600">Rendah</span>
                    <p class="text-2xl font-black">{{ $vicesRendah }}</p>
                </div>
                <div class="p-4 flex items-center justify-between sm:flex-col sm:items-start gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-yellow-600">Sedang</span>
                    <p class="text-2xl font-black">{{ $vicesSedang }}</p>
                </div>
                <div class="p-4 flex items-center justify-between sm:flex-col sm:items-start gap-2">
                    <span class="text-[10px] font-bold uppercase tracking-widest text-red-600">Tinggi</span>
                    <p class="text-2xl font-black">{{ $vicesTinggi }}</p>
                </div>
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
