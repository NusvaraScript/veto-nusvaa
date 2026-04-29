@extends('layout.app')
@section('title', 'Manajemen - VetoNusvaa')
@section('content')
    <x-section section="List Kebiasaan Buruk Kamu">
        <x-card class="mb-4">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <p class="text-md">Kelola kebiasaan burukmu, pantau tingkat keparahan, dan lihat progres streak.</p>
                <x-button route="{{ route('vice.create') }}">
                    + Tambah Kebiasaan
                </x-button>
            </div>
        </x-card>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="uppercase tracking-widest text-sm border-b-2 border-black">
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
                        <tr class="even:bg-gray-100 hover:bg-red-100/50 border-black border-b-2 transition-all">
                            <td class="p-3">{{ $vices->firstItem() + $loop->index }}</td>
                            <td class="p-3 font-semibold uppercase">{{ $vice->habit_name }}</td>
                            <td class="p-3 text-slate-600">{{ $vice->description ?: '-' }}</td>
                            <td class="p-3 uppercase">
                                <span class="px-2 py-1 text-xs font-semibold
                                    @if($vice->severity == 'tinggi') bg-red-100 text-red-700
                                    @elseif($vice->severity == 'sedang') bg-yellow-100 text-yellow-800
                                    @else bg-green-100 text-green-700 @endif">
                                    {{ $vice->severity }}
                                </span>
                            </td>
                            <td class="p-3"><span class="font-semibold">{{ $vice->streak_days }}</span> hari</td>
                            <td class="p-3 flex items-center gap-2">
                                <x-button route="{{ route('vice.edit', $vice->id) }}" variant="warning">
                                    edit
                                </x-button>
                                <button type="button" onclick="handleDelete({{ $vice->id }})" class="inline-block bg-red-600 text-white border-2 border-black px-2 py-1 font-bold uppercase hover:bg-white hover:text-black hover:shadow-block hover:scale-105 active:scale-95 transition-all">Hapus</button>
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
