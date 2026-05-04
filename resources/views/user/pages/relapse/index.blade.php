@extends('layout.user')
@section('title', 'Riwayat Relapse - VetoNusvaa')

@section('content')
    <x-section section="Riwayat Relapse">
        
        {{-- Header & Action --}}
        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-black uppercase italic tracking-tighter">Log Kekalahan</h2>
                <p class="text-[10px] font-bold text-gray-500 uppercase">Pelajari polanya agar tidak jatuh di lubang yang sama.</p>
            </div>
            <x-button route="{{ route('relapse.create') }}" class="border-2 border-black bg-red-600 text-white shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:shadow-none transition-all py-2 text-xs uppercase font-black">
                + Catat Relapse Baru
            </x-button>
        </div>

        {{-- Tabel / List Data --}}
        <div class="border-2 border-black bg-white shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 border-b-2 border-black">
                        <tr>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest w-16">No</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest">Kebiasaan</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest">Alasan / Excuse</th>
                            <th class="p-4 text-[10px] font-black uppercase tracking-widest text-right">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-black">
                        @forelse($relapses as $relapse)
                            <tr class="hover:bg-red-50 transition-colors">
                                <td class="p-4 text-xs font-bold">{{ $relapses->firstItem() + $loop->index }}</td>
                                <td class="p-4">
                                    <span class="text-xs font-black uppercase px-2 py-1 border border-black bg-white">
                                        {{ $relapse->vice->habit_name ?? '-' }}
                                    </span>
                                </td>
                                <td class="p-4 text-xs font-medium text-gray-600 italic">
                                    "{{ $relapse->excuse ?? 'Tanpa alasan/catatan.' }}"
                                </td>
                                <td class="p-4 text-right">
                                    <span class="text-[10px] font-black uppercase bg-black text-white px-2 py-1">
                                        {{ \Carbon\Carbon::parse($relapse->violation_date)->format('d / m / Y') }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-12 text-center">
                                    <p class="text-xs font-bold uppercase text-gray-400 italic">Bersih. Tidak ada data relapse yang tercatat.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $relapses->links() }}
        </div>

    </x-section>
@endsection