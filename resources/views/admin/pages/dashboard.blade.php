@extends('admin.layout.app')
@section('title', 'Dashboard Admin — VetoNusvaa')

@section('content')

    <div class="mb-6">
        <h1 class="text-3xl font-bold uppercase">Dashboard Admin</h1>
        <p class="text-gray-500 text-sm mt-1">Pantau performa website secara keseluruhan.</p>
        <p class="text-xs text-gray-400 mt-1">
            <i class="fa-solid fa-lock mr-1"></i>
            Data kebiasaan tiap user bersifat privat dan tidak ditampilkan di sini.
        </p>
    </div>

    {{-- Stat Cards: Pengguna --}}
    <h2 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">Statistik Pengguna</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

        <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase tracking-widest text-gray-500">Total User Terdaftar</p>
            <p class="text-4xl font-black mt-1">{{ $totalUsers }}</p>
            <p class="text-xs text-gray-400 mt-2">Semua user aktif</p>
        </div>

        <div class="border-2 border-black bg-green-50 p-5 shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase tracking-widest text-gray-500">Baru Bulan Ini</p>
            <p class="text-4xl font-black text-green-700 mt-1">{{ $newUsersThisMonth }}</p>
            <p class="text-xs text-gray-400 mt-2">{{ now()->format('F Y') }}</p>
        </div>

        <div class="border-2 border-black bg-blue-50 p-5 shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase tracking-widest text-gray-500">Baru Minggu Ini</p>
            <p class="text-4xl font-black text-blue-700 mt-1">{{ $newUsersThisWeek }}</p>
            <p class="text-xs text-gray-400 mt-2">{{ now()->startOfWeek()->format('d M') }} – {{ now()->endOfWeek()->format('d M') }}</p>
        </div>

    </div>

    {{-- Stat Cards: Konten --}}
    <h2 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">Statistik Konten</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">

        <div class="border-2 border-black bg-white p-5 shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase tracking-widest text-gray-500">Total Kebiasaan</p>
            <p class="text-3xl font-black mt-1">{{ $totalVices }}</p>
        </div>

        <div class="border-2 border-black bg-red-50 p-5 shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase tracking-widest text-gray-500">Total Relapse</p>
            <p class="text-3xl font-black text-red-600 mt-1">{{ $totalRelapses }}</p>
        </div>

        <div class="border-2 border-black bg-yellow-50 p-5 shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase tracking-widest text-gray-500">Rata-rata Kebiasaan/User</p>
            <p class="text-3xl font-black text-yellow-700 mt-1">{{ $avgVicesPerUser }}</p>
        </div>

        <div class="border-2 border-black bg-orange-50 p-5 shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase tracking-widest text-gray-500">Rata-rata Relapse/User</p>
            <p class="text-3xl font-black text-orange-600 mt-1">{{ $avgRelapsesPerUser }}</p>
        </div>

    </div>

    {{-- Severity Breakdown --}}
    <h2 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">Distribusi Tingkat Keparahan</h2>
    <div class="grid grid-cols-3 gap-4 mb-8">

        <div class="border-2 border-black bg-green-100 p-4 text-center shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase font-bold text-green-700">Rendah</p>
            <p class="text-3xl font-black text-green-800 mt-1">{{ $vicesRendah }}</p>
        </div>

        <div class="border-2 border-black bg-yellow-100 p-4 text-center shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase font-bold text-yellow-700">Sedang</p>
            <p class="text-3xl font-black text-yellow-800 mt-1">{{ $vicesSedang }}</p>
        </div>

        <div class="border-2 border-black bg-red-100 p-4 text-center shadow-[4px_4px_0px_#000]">
            <p class="text-xs uppercase font-bold text-red-700">Tinggi</p>
            <p class="text-3xl font-black text-red-800 mt-1">{{ $vicesTinggi }}</p>
        </div>

    </div>

    {{-- Tabel User Terbaru --}}
    <h2 class="text-sm font-bold uppercase tracking-widest text-gray-500 mb-3">User Terbaru</h2>
    <div class="border-2 border-black bg-white shadow-[4px_4px_0px_#000] overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-black text-white">
                <tr>
                    <th class="p-3 text-left font-bold uppercase tracking-wider">No</th>
                    <th class="p-3 text-left font-bold uppercase tracking-wider">Nama</th>
                    <th class="p-3 text-left font-bold uppercase tracking-wider">Email</th>
                    <th class="p-3 text-left font-bold uppercase tracking-wider">Bergabung</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentUsers as $index => $user)
                    <tr class="border-t-2 border-black even:bg-gray-50 hover:bg-yellow-50 transition-colors">
                        <td class="p-3 text-gray-500">{{ $index + 1 }}</td>
                        <td class="p-3 font-semibold">{{ $user->name }}</td>
                        <td class="p-3 text-gray-600">{{ $user->email }}</td>
                        <td class="p-3 text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-400">Belum ada user terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Privacy Notice --}}
    <div class="mt-8 p-4 border-2 border-dashed border-gray-400 bg-gray-50 text-sm text-gray-500">
        <i class="fa-solid fa-shield-halved mr-2 text-gray-400"></i>
        <strong>Privasi Pengguna:</strong>
        Data kebiasaan, relapse, dan catatan pribadi setiap user tidak dapat diakses oleh admin.
        Dashboard ini hanya menampilkan statistik agregat untuk memantau kesehatan platform.
    </div>

@endsection
