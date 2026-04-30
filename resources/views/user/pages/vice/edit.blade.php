@extends('user.layout.app')
@section('title', 'Form Edit - VetoNusvaa')

@section('content')
    <section class="py-8">
        <h1 class="text-2xl font-bold mb-4">Form Edit List</h1>
        <p class="text-gray-600">Isi formulir di bawah untuk mengedit list.</p>

        <div class="my-4 border-2 border-black p-4">
            <form action="{{ route('vice.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                 <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="habit_name" class="block text-sm font-bold text-gray-700">Nama List</label>
                        <input type="text" name="habit_name" id="habit_name" placeholder="Masukkan Nama List . . ."
                            value="{{ $data->habit_name }}"
                            class="mt-1 w-full border-2 border-black p-1 hover:ring-red-500 hover:border-red-500">
                    </div>
                    <div>
                        <label for="severity" class="block text-sm font-bold text-gray-700">Keparahan</label>
                        <select name="severity" id="severity"
                            class="mt-1 w-full border-2 border-black p-1 hover:ring-red-500 hover:border-red-500">
                            <option value="" disabled>-- Pilih Keparahan --</option>
                            <option value="rendah" {{ $data->severity == 'rendah' ? 'selected' : '' }}>Rendah</option>
                            <option value="sedang" {{ $data->severity == 'sedang' ? 'selected' : '' }}>Sedang</option>
                            <option value="tinggi" {{ $data->severity == 'tinggi' ? 'selected' : '' }}>Tinggi</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-bold text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" placeholder="Masukkan Deskripsi Kebiasaan Buruk Kamu"
                            class="mt-1 w-full border-2 border-black p-1 hover:ring-red-500 hover:border-red-500">{{ $data->description }}</textarea>
                    </div>
                </div>
                <div class="col-span-2 mt-4">
                    <button type="submit" class="w-full text-black border-2 border-black px-4 py-1 font-bold uppercase hover:bg-red-600 hover:text-white transition hover:shadow-[5px_5px_0px_#fff] hover:scale-105
                    active:scale-95
                    transition-all">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection