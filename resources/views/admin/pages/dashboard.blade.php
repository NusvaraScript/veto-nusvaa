@extends('admin.layout.app')
@section('title', 'Dashboard Admin — VetoNusvaa')

@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold uppercase">Dashboard Admin</h1>
    <p class="text-gray-500 text-sm mt-1">Ringkasan statistik platform.</p>
</div>

<h2 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">Statistik Pengguna</h2>
<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
    <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000]"><p class="text-xs">Total User</p><p class="text-4xl font-black mt-1">{{ $totalUsers }}</p></div>
    <div class="border-2 border-black bg-green-50 p-5 shadow-[4px_4px_0px_#000]"><p class="text-xs">Baru Bulan Ini</p><p class="text-4xl font-black text-green-700 mt-1">{{ $newUsersThisMonth }}</p></div>
    <div class="border-2 border-black bg-blue-50 p-5 shadow-[4px_4px_0px_#000]"><p class="text-xs">Baru Minggu Ini</p><p class="text-4xl font-black text-blue-700 mt-1">{{ $newUsersThisWeek }}</p></div>
</div>

<h2 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">Statistik Konten</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000]"><p class="text-xs">Total Kebiasaan</p><p class="text-3xl font-black mt-1">{{ $totalVices }}</p></div>
    <div class="border-2 border-black bg-red-50 p-5 shadow-[4px_4px_0px_#000]"><p class="text-xs">Total Relapse</p><p class="text-3xl font-black text-red-600 mt-1">{{ $totalRelapses }}</p></div>
    <div class="border-2 border-black bg-yellow-50 p-5 shadow-[4px_4px_0px_#000]"><p class="text-xs">Rata-rata Kebiasaan/User</p><p class="text-3xl font-black text-yellow-700 mt-1">{{ $avgVicesPerUser }}</p></div>
    <div class="border-2 border-black bg-orange-50 p-5 shadow-[4px_4px_0px_#000]"><p class="text-xs">Rata-rata Relapse/User</p><p class="text-3xl font-black text-orange-600 mt-1">{{ $avgRelapsesPerUser }}</p></div>
</div>

<h2 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">Distribusi Keparahan</h2>
<div class="grid grid-cols-3 gap-4">
    <div class="border-2 border-black bg-green-100 p-4 text-center shadow-[4px_4px_0px_#000]"><p class="text-xs uppercase font-bold text-green-700">Rendah</p><p class="text-3xl font-black text-green-800 mt-1">{{ $vicesRendah }}</p></div>
    <div class="border-2 border-black bg-yellow-100 p-4 text-center shadow-[4px_4px_0px_#000]"><p class="text-xs uppercase font-bold text-yellow-700">Sedang</p><p class="text-3xl font-black text-yellow-800 mt-1">{{ $vicesSedang }}</p></div>
    <div class="border-2 border-black bg-red-100 p-4 text-center shadow-[4px_4px_0px_#000]"><p class="text-xs uppercase font-bold text-red-700">Tinggi</p><p class="text-3xl font-black text-red-800 mt-1">{{ $vicesTinggi }}</p></div>
</div>
@endsection
