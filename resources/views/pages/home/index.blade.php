@extends('layout.app')
@section('title', 'Beranda - VetoNusvaa')
@section('content')
    <x-section section="Dashboard">
        {{-- Statistik Utama --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="border-2 border-black p-4 hover:shadow-[5px_5px_0px_#000] transition-all">
                <p class="text-sm text-gray-500 uppercase">Total Kebiasaan</p>
                <p class="text-3xl font-bold">{{ $totalVices }}</p>
            </div>
            <div class="border-2 border-black p-4 hover:shadow-[5px_5px_0px_#000] transition-all">
                <p class="text-sm text-gray-500 uppercase">Total Relapse</p>
                <p class="text-3xl font-bold text-red-600">{{ $totalRelapses }}</p>
            </div>
            <div class="border-2 border-black p-4 hover:shadow-[5px_5px_0px_#000] transition-all">
                <p class="text-sm text-gray-500 uppercase">Rata-rata Streak</p>
                <p class="text-3xl font-bold text-green-600">{{ $avgStreak }} <span class="text-sm font-normal">hari</span></p>
            </div>
        </div>

        {{-- Severity Breakdown --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="border-2 border-black p-4 bg-green-50">
                <p class="text-sm text-gray-500 uppercase">Rendah</p>
                <p class="text-2xl font-bold text-green-600">{{ $vicesRendah }}</p>
            </div>
            <div class="border-2 border-black p-4 bg-yellow-50">
                <p class="text-sm text-gray-500 uppercase">Sedang</p>
                <p class="text-2xl font-bold text-yellow-600">{{ $vicesSedang }}</p>
            </div>
            <div class="border-2 border-black p-4 bg-red-50">
                <p class="text-sm text-gray-500 uppercase">Tinggi</p>
                <p class="text-2xl font-bold text-red-600">{{ $vicesTinggi }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Top Streak Vices --}}
            <div class="border-2 border-black p-4">
                <h3 class="text-lg font-bold uppercase mb-4">Streak Tertinggi</h3>
                @if($topStreakVices->isEmpty())
                    <p class="text-gray-500">Belum ada kebiasaan.</p>
                @else
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b-2 border-black">
                                <th class="p-2 text-left">Kebiasaan</th>
                                <th class="p-2 text-left">Severity</th>
                                <th class="p-2 text-right">Streak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topStreakVices as $vice)
                                <tr class="border-b border-gray-200">
                                    <td class="p-2 font-bold">{{ $vice->habit_name }}</td>
                                    <td class="p-2">
                                        <span class="px-2 py-1 text-xs font-bold uppercase
                                            @if($vice->severity == 'tinggi') bg-red-100 text-red-700
                                            @elseif($vice->severity == 'sedang') bg-yellow-100 text-yellow-700
                                            @else bg-green-100 text-green-700 @endif">
                                            {{ $vice->severity }}
                                        </span>
                                    </td>
                                    <td class="p-2 text-right font-bold">{{ $vice->streak_days }} hari</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            {{-- Latest Relapses --}}
            <div class="border-2 border-black p-4">
                <h3 class="text-lg font-bold uppercase mb-4">Relapse Terbaru</h3>
                @if($latestRelapses->isEmpty())
                    <p class="text-gray-500">Belum ada riwayat relapse.</p>
                @else
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b-2 border-black">
                                <th class="p-2 text-left">Kebiasaan</th>
                                <th class="p-2 text-left">Tanggal</th>
                                <th class="p-2 text-right">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestRelapses as $relapse)
                                <tr class="border-b border-gray-200">
                                    <td class="p-2 font-bold">{{ $relapse->vice->habit_name ?? '-' }}</td>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($relapse->violation_date)->format('d M Y') }}</td>
                                    <td class="p-2 text-right text-gray-500">{{ Str::limit($relapse->excuse, 20) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="mt-6 flex gap-4">
            <x-button route="{{ route('vice.create') }}">
                + Tambah Kebiasaan
            </x-button>
            <x-button route="{{ route('vice.index') }}" variant="outline">
                Lihat Semua Kebiasaan
            </x-button>
        </div>
    </x-section>
@endsection