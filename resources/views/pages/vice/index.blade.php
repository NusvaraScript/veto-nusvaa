@extends('layout.app')
@section('title', 'Manajemen - VetoNusvaa')
@section('content')
    <x-section section="List Kebiasaan Buruk Kamu">
        <div class="mb-4 rounded-xl border border-slate-200 bg-white p-4">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <p class="text-sm text-slate-600">Kelola kebiasaan burukmu, pantau tingkat keparahan, dan lihat progres streak.</p>
                <x-button route="{{ route('vice.create') }}">
                    + Tambah Kebiasaan
                </x-button>
            </div>
        </div>

        <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
            <table class="w-full">
                <thead class="uppercase tracking-widest text-xs bg-slate-100 text-slate-700">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Kebiasaan</th>
                        <th class="p-3 text-left">Deskripsi</th>
                        <th class="p-3 text-left">Keparahan</th>
                        <th class="p-3 text-left">Streak</th>
                        <th class="p-3 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vices as $vice)
                        <tr class="border-t border-slate-100 hover:bg-slate-50 transition-all">
                            <td class="p-3">{{ $vices->firstItem() + $loop->index }}</td>
                            <td class="p-3 font-semibold uppercase">{{ $vice->habit_name }}</td>
                            <td class="p-3 text-slate-600">{{ $vice->description ?: '-' }}</td>
                            <td class="p-3 uppercase">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full
                                    @if($vice->severity == 'tinggi') bg-red-100 text-red-700
                                    @elseif($vice->severity == 'sedang') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-700 @endif">
                                    {{ $vice->severity }}
                                </span>
                            </td>
                            <td class="p-3"><span class="font-semibold">{{ $vice->streak_days }}</span> hari</td>
                            <td class="p-3 flex items-center gap-2">
                                <a href="{{ route('vice.edit', $vice->id) }}" class="font-semibold rounded-lg px-3 py-1 bg-amber-500 text-white hover:bg-amber-600 transition text-sm">Edit</a>
                                <button type="button" onclick="handleDelete({{ $vice->id }})" class="font-semibold rounded-lg px-3 py-1 bg-rose-600 text-white hover:bg-rose-700 transition text-sm">Hapus</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-500">
                                Belum ada kebiasaan. Mulai tambahkan kebiasaan untuk dipantau progresnya.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $vices->links() }}
        </div>
    </x-section>

    <form id="deleteForm" action="" method="POST" class="hidden">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('js')
    <script>
        function handleDelete(id) {
            document.getElementById('deleteForm').action = '/vice/' + id;
            var check = confirm('Apakah anda yakin akan menghapus kebiasaan ini?');
            if (check) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endpush
