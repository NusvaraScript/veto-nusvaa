@extends('layout.app')
@section('title', 'Relapse - VetoNusvaa')
@section('content')
    <x-section section="List Relapse Kamu">
        <x-card class="p-4 mb-4">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <p class="text-md text-black">Catat kambuh untuk evaluasi pola dan menjaga konsistensi pemulihan.</p>
                <x-button route="{{ route('relapse.create') }}">
                    + Tambah Relapse
                </x-button>
            </div>
        </x-card>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead class="uppercase tracking-widest text-sm border-b-2 border-black">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Kebiasaan</th>
                        <th class="p-3 text-left">Alasan</th>
                        <th class="p-3 text-left">Tanggal Kambuh</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($relapses as $relapse)
                        <tr class="even:bg-gray-100 hover:bg-red-100/50 border-black border-b-2 transition-all">
                            <td class="p-3">{{ $relapses->firstItem() + $loop->index }}</td>
                            <td class="p-3 font-semibold uppercase">{{ $relapse->vice->habit_name ?? '-' }}</td>
                            <td class="p-3 text-slate-600">{{ $relapse->excuse ?? '-' }}</td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($relapse->violation_date)->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-slate-500">Belum ada data relapse. Kamu bisa mulai mencatat dari tombol di atas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $relapses->links() }}
        </div>
    </x-section>
@endsection
