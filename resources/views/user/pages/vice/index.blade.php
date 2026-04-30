@extends('layout.user')
@section('title', 'Manajemen - VetoNusvaa')

@section('content')
    <x-section section="Manajemen Kebiasaan">
        
        {{-- Header & Action --}}
        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-black uppercase italic tracking-tighter">Daftar Hitam</h2>
                <p class="text-[10px] font-bold text-gray-500 uppercase">Pantau tingkat keparahan dan pertahankan streak harianmu.</p>
            </div>
            <x-button route="{{ route('vice.create') }}" class="border-2 border-black bg-black text-white shadow-[2px_2px_0px_0px_rgba(220,38,38,1)] hover:shadow-none transition-all py-2 text-xs uppercase font-black">
                + Tambah Kebiasaan
            </x-button>
        </div>

        {{-- Tabel Data --}}
        <div class="border-2 border-black bg-white shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b-2 border-black">
                        <tr>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest w-16">No</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest">Kebiasaan</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest">Keparahan</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest text-center">Streak</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest text-right">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-black">
                        @forelse ($vices as $vice)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="p-4 text-xs font-bold">{{ $vices->firstItem() + $loop->index }}</td>
                                <td class="p-4">
                                    <p class="text-xs font-black uppercase">{{ $vice->habit_name }}</p>
                                    <p class="text-[9px] font-bold text-gray-400 uppercase mt-0.5">{{ Str::limit($vice->description, 40) ?: '-' }}</p>
                                </td>
                                <td class="p-4">
                                    <span class="text-[9px] font-black uppercase border-2 border-black px-2 py-0.5 shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] 
                                        @if($vice->severity == 'tinggi') bg-red-500 text-white
                                        @elseif($vice->severity == 'sedang') bg-yellow-400 text-black
                                        @else bg-green-500 text-white @endif">
                                        {{ $vice->severity }}
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <span class="text-xs font-black">{{ $vice->streak_days }} <span class="text-[9px] text-gray-400 uppercase">Hari</span></span>
                                </td>
                                <td class="p-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('vice.edit', $vice->id) }}" 
                                           class="border-2 border-black bg-white px-3 py-1 text-[9px] font-black uppercase shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all">
                                            Edit
                                        </a>
                                        <button type="button" onclick="handleDelete({{ $vice->id }})" 
                                           class="border-2 border-black bg-red-600 text-white px-3 py-1 text-[9px] font-black uppercase shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none hover:translate-x-[1px] hover:translate-y-[1px] transition-all">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-12 text-center">
                                    <p class="text-xs font-bold uppercase text-gray-400 italic">Daftar masih bersih. Tambahkan kebiasaan pertamamu.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $vices->links() }}
        </div>

    </x-section>

    {{-- Form Hidden Tetap Ada --}}
    <form id="deleteForm" action="" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('js')
    <script>
        function handleDelete(id) {
            document.getElementById('deleteForm').action = '/vice/' + id;
            if (confirm('Yakin ingin menghapus kebiasaan ini? Data streak dan riwayat akan ikut hilang.')) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endpush