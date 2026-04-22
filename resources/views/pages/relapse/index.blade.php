@extends('layout.app')
@section('title', 'Relapse - VetoNusvaa')
@section('content')
    <x-section section="List Relapse Kamu">
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead class="uppercase tracking-widest text-sm border-b-2 border-black">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Kebiasaan</th>
                        <th class="p-3 text-left">Tanggal Relapse</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relapses as $relapse)
                        <tr class="even:bg-gray-100 hover:bg-red-100/50 border-black border-b-2 transition-all">
                            <td class="p-3">{{ $loop->iteration }}</td> 
                            <td class="p-3 font-bold uppercase">{{ $relapse->vice->habit_name }}</td>
                            <td class="p-3">{{ $relapse->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-section>
@endsection