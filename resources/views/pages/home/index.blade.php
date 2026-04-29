@extends('layout.app')
@section('title', 'Beranda - VetoNusvaa')
@section('content')
    <x-section section="Dashboard">
        <div class="mb-6 rounded-xl border border-blue-200 bg-blue-50 p-4">
            <p class="text-sm text-blue-900">Selamat datang! Pantau progresmu setiap hari untuk membangun kebiasaan yang lebih sehat.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-sm text-gray-500 uppercase">Total Kebiasaan</p>
                <p class="text-3xl font-bold">{{ $totalVices }}</p>
            </div>
            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-sm text-gray-500 uppercase">Total Relapse</p>
                <p class="text-3xl font-bold text-red-600">{{ $totalRelapses }}</p>
            </div>
            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <p class="text-sm text-gray-500 uppercase">Rata-rata Streak</p>
                <p class="text-3xl font-bold text-green-600">{{ $avgStreak }} <span class="text-sm font-normal">hari</span></p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="rounded-xl border border-green-200 p-4 bg-green-50">
                <p class="text-sm text-gray-500 uppercase">Rendah</p>
                <p class="text-2xl font-bold text-green-600">{{ $vicesRendah }}</p>
            </div>
            <div class="rounded-xl border border-yellow-200 p-4 bg-yellow-50">
                <p class="text-sm text-gray-500 uppercase">Sedang</p>
                <p class="text-2xl font-bold text-yellow-700">{{ $vicesSedang }}</p>
            </div>
            <div class="rounded-xl border border-red-200 p-4 bg-red-50">
                <p class="text-sm text-gray-500 uppercase">Tinggi</p>
                <p class="text-2xl font-bold text-red-600">{{ $vicesTinggi }}</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <h3 class="text-lg font-bold uppercase mb-4">Streak Tertinggi</h3>
                @if($topStreakVices->isEmpty())
                    <p class="text-gray-500">Belum ada kebiasaan.</p>
                @else
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="p-2 text-left">Kebiasaan</th>
                                <th class="p-2 text-left">Keparahan</th>
                                <th class="p-2 text-right">Streak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topStreakVices as $vice)
                                <tr class="border-b border-slate-100">
                                    <td class="p-2 font-semibold">{{ $vice->habit_name }}</td>
                                    <td class="p-2">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full
                                            @if($vice->severity == 'tinggi') bg-red-100 text-red-700
                                            @elseif($vice->severity == 'sedang') bg-yellow-100 text-yellow-700
                                            @else bg-green-100 text-green-700 @endif">
                                            {{ $vice->severity }}
                                        </span>
                                    </td>
                                    <td class="p-2 text-right font-semibold">{{ $vice->streak_days }} hari</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                <h3 class="text-lg font-bold uppercase mb-4">Relapse Terbaru</h3>
                @if($latestRelapses->isEmpty())
                    <p class="text-gray-500">Belum ada riwayat relapse.</p>
                @else
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-slate-200">
                                <th class="p-2 text-left">Kebiasaan</th>
                                <th class="p-2 text-left">Tanggal</th>
                                <th class="p-2 text-right">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestRelapses as $relapse)
                                <tr class="border-b border-slate-100">
                                    <td class="p-2 font-semibold">{{ $relapse->vice->habit_name ?? '-' }}</td>
                                    <td class="p-2">{{ \Carbon\Carbon::parse($relapse->violation_date)->format('d M Y') }}</td>
                                    <td class="p-2 text-right text-gray-500">{{ Str::limit($relapse->excuse, 30) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>

        <div class="mt-6 flex flex-wrap gap-3">
            <x-button route="{{ route('vice.create') }}">+ Tambah Kebiasaan</x-button>
            <x-button route="{{ route('vice.index') }}" variant="outline">Lihat Semua Kebiasaan</x-button>
            <x-button route="{{ route('relapse.create') }}" variant="outline">Catat Relapse</x-button>
        </div>
    </x-section>
@endsection
