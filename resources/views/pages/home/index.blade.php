@extends('layout.app')
 @section('title', 'Beranda - VetoNusvaa')

 @section('content')
     <x-section section="Dashboard">
         {{-- Alert Welcome --}}
         <div class="mb-6 border-2 border-black bg-red-50 p-4">
             <p class="text-md font-bold text-black">Selamat datang! Pantau progresmu setiap hari untuk membangun kebiasaan yang lebih sehat.</p>
         </div>

         {{-- Header Banner --}}
         <div class="mb-6 border-2 border-black bg-gradient-to-r from-indigo-50 via-sky-50 to-cyan-50 p-5 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
             <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                 <div>
                     <p class="text-xs font-semibold uppercase tracking-wide text-red-700">Ringkasan Hari Ini</p>
                     <h2 class="text-xl font-bold text-slate-900">Selamat datang kembali!</h2>
                     <p class="mt-1 text-sm text-slate-600">Pantau progresmu setiap hari untuk membangun kebiasaan yang lebih sehat.</p>
                 </div>
                 <div class="grid grid-cols-2 gap-2 text-sm">
                     <x-button route="{{ route('vice.create') }}">+ Tambah Kebiasaan</x-button>
                     <x-button route="{{ route('relapse.create') }}" variant="outline" class="text-center">Catat Relapse</x-button>
                 </div>
             </div>
         </div>

         {{-- Statistik Utama --}}
         <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-3">
             <x-card class="border-2 border-black rounded-none shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                 <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Total Kebiasaan</p>
                 <p class="mt-2 text-3xl font-bold">{{ $totalVices }}</p>
                 <p class="mt-1 text-xs text-gray-500">Kebiasaan yang sedang kamu pantau.</p>
             </x-card>

             <x-card class="border-2 border-black rounded-none shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                 <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Total Relapse</p>
                 <p class="mt-2 text-3xl font-bold text-red-600">{{ $totalRelapses }}</p>
                 <p class="mt-1 text-xs text-gray-500">Total insiden sejak pencatatan dimulai.</p>
             </x-card>

             <x-card class="border-2 border-black rounded-none shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                 <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Rata-rata Streak</p>
                 <p class="mt-2 text-3xl font-bold text-green-600">{{ $avgStreak }} <span class="text-sm font-normal">hari</span></p>
                 <p class="mt-1 text-xs text-gray-500">Rata-rata progres bebas kebiasaan buruk.</p>
             </x-card>
         </div>

         {{-- Distribusi Keparahan --}}
         <x-card class="mb-6 border-2 border-black rounded-none shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
             <div class="mb-4 flex items-center justify-between">
                 <h3 class="text-base font-bold uppercase">Distribusi Keparahan</h3>
                 <p class="text-xs text-slate-500">Bantu prioritaskan fokus perbaikan</p>
             </div>
             <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                 <div class="border-2 border-black bg-green-50 p-4">
                     <p class="text-xs font-semibold uppercase text-green-700">Rendah</p>
                     <p class="mt-2 text-2xl font-bold text-green-600">{{ $vicesRendah }}</p>
                 </div>
                 <div class="border-2 border-black bg-yellow-50 p-4">
                     <p class="text-xs font-semibold uppercase text-yellow-800">Sedang</p>
                     <p class="mt-2 text-2xl font-bold text-yellow-700">{{ $vicesSedang }}</p>
                 </div>
                 <div class="border-2 border-black bg-red-50 p-4">
                     <p class="text-xs font-semibold uppercase text-red-700">Tinggi</p>
                     <p class="mt-2 text-2xl font-bold text-red-600">{{ $vicesTinggi }}</p>
                 </div>
             </div>
         </x-card>

         {{-- Tabel Data --}}
         <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
             {{-- Streak Tertinggi --}}
             <x-card class="border-2 border-black rounded-none shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                 <h3 class="mb-4 text-lg font-bold uppercase">Streak Tertinggi</h3>
                 @if ($topStreakVices->isEmpty())
                     <div class="border-2 border-dashed border-black bg-slate-50 p-4 text-sm text-slate-500">
                         Belum ada kebiasaan.
                     </div>
                 @else
                     <div class="overflow-x-auto">
                         <table class="w-full text-sm">
                             <thead>
                                 <tr class="border-b-2 border-black text-slate-600">
                                     <th class="p-2 text-left">Kebiasaan</th>
                                     <th class="p-2 text-left">Keparahan</th>
                                     <th class="p-2 text-right">Streak</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($topStreakVices as $vice)
                                     <tr class="border-b border-black">
                                         <td class="p-2 font-bold">{{ $vice->habit_name }}</td>
                                         <td class="p-2">
                                             <span class="border border-black px-2 py-0.5 text-[10px] font-bold uppercase 
                                                @if ($vice->severity == 'tinggi') bg-red-100 text-red-700 
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
                     </div>
                 @endif
             </x-card>

             {{-- Relapse Terbaru --}}
             <x-card class="border-2 border-black rounded-none shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                 <h3 class="mb-4 text-lg font-bold uppercase">Relapse Terbaru</h3>
                 @if ($latestRelapses->isEmpty())
                     <div class="border-2 border-dashed border-black bg-slate-50 p-4 text-sm text-slate-500">
                         Belum ada riwayat relapse.
                     </div>
                 @else
                     <div class="overflow-x-auto">
                         <table class="w-full text-sm text-black">
                             <thead>
                                 <tr class="border-b-2 border-black text-slate-600">
                                     <th class="p-2 text-left">Kebiasaan</th>
                                     <th class="p-2 text-left">Tanggal</th>
                                     <th class="p-2 text-right">Catatan</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($latestRelapses as $relapse)
                                     <tr class="border-b border-black">
                                         <td class="p-2 font-bold">{{ $relapse->vice->habit_name ?? '-' }}</td>
                                         <td class="p-2">{{ \Carbon\Carbon::parse($relapse->violation_date)->format('d M Y') }}</td>
                                         <td class="p-2 text-right text-gray-600">{{ Str::limit($relapse->excuse, 20) }}</td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 @endif
             </x-card>
         </div>

         {{-- Footer Buttons --}}
         <div class="mt-8 flex flex-wrap gap-3">
             <x-button route="{{ route('vice.create') }}">+ Tambah Kebiasaan</x-button>
             <x-button route="{{ route('vice.index') }}" variant="outline">Lihat Semua Kebiasaan</x-button>
             <x-button route="{{ route('relapse.create') }}" variant="solid">+ Catat Relapse</x-button>
             <x-button route="{{ route('relapse.index') }}" variant="outline">Lihat Semua Relapse</x-button>
         </div>
     </x-section>
 @endsection