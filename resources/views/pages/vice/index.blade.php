@extends('layout.app')
@section('title', 'Manajemen - VetoNusvaa')
@section('content')
    <x-section section="List Kebiasaan Buruk Kamu">
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
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
                    @foreach ($vices as $vice)
                        <tr class="even:bg-gray-100 hover:bg-red-100/50 border-black border-b-2 transition-all">
                            <td class="p-3">{{ $loop->iteration }}</td> 
                            <td class="p-3 font-bold uppercase">{{ $vice->habit_name }}</td>
                            <td class="p-3">{{ $vice->description }}</td>
                            <td class="p-3 uppercase">{{ $vice->severity }}</td>
                            <td class="p-3">{{ $vice->streak_days }}</td>
                            <td class="p-3 flex items-center gap-1">
                                <a href="{{ route('vice.edit', $vice->id) }}" class="font-bold uppercase px-4 py-1 bg-yellow-600 text-white border-2 border-black hover:bg-yellow-700 hover:scale-105 active:scale-95 transition-all text-sm">Edit</a>
                                <button type="button" onclick="handleDelete({{ $vice->id }})" class="font-bold uppercase px-4 py-1 bg-red-600 text-white border-2 border-black hover:bg-red-700 hover:scale-105 active:scale-95 transition-all text-sm">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
            var check = confirm('Apakah anda yakin akan menghapus ini?');
            if (check) {
                document.getElementById('deleteForm').submit();
            }
        }
    </script>
@endpush