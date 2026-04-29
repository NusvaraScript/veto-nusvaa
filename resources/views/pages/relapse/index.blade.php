@extends('layout.app')
@section('title', 'Relapse - VetoNusvaa')
@section('content')
    <x-section section="List Relapse Kamu">
        <div class="mb-4 rounded-xl border border-slate-200 bg-white p-4">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <p class="text-sm text-slate-600">Catat kambuh untuk evaluasi pola dan menjaga konsistensi pemulihan.</p>
                <x-button route="{{ route('relapse.create') }}">
                    + Tambah Relapse
                </x-button>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
            <table class="w-full">
                <thead class="uppercase tracking-widest text-xs bg-slate-100 text-slate-700">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Kebiasaan</th>
                        <th class="p-3 text-left">Alasan</th>
                        <th class="p-3 text-left">Tanggal Kambuh</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($relapses as $relapse)
                        <tr class="border-t border-slate-100 hover:bg-slate-50 transition-all">
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
