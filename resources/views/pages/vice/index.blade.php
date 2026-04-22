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
                                <x-button route="{{ route('vice.edit', $vice->id) }}" variant="warning" class="text-sm">Edit</x-button>
                                <x-button route="#" variant="danger" class="text-sm" onclick="handleDelete({{ $vice->id }})">Hapus</x-button>
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
            $('#deleteForm').attr('action', '/vice/' + id);
            var check = confirm('Apakah anda yakin akan menghapus ini?');
            if (check) {
                $('#deleteForm').submit();
            }
        }
        function handleEdit(id) {
            window.location.href = '/vice/' + id + '/edit/';
        }
    </script>
@endpush