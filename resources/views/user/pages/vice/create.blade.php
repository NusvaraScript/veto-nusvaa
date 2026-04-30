@extends('user.layout.app')
@section('title', 'Form Tambah - VetoNusvaa')

@section('content')
    <section class="py-8">
        <h1 class="text-2xl font-bold mb-4">Form Tambah List</h1>
        <p class="text-gray-600">Isi formulir di bawah untuk menambahkan list baru.</p>

        <div class="my-4 border-2 border-black p-4">
            <form action="{{ route('vice.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="habit_name" class="block text-sm font-bold text-gray-700">Nama List</label>
                        <input type="text" name="habit_name" id="habit_name" placeholder="Masukkan Nama List . . ."
                            class="mt-1 w-full border-2 border-black p-1 hover:ring-red-500 hover:border-red-500">
                    </div>
                    <div>
                        <label for="severity" class="block text-sm font-bold text-gray-700">Keparahan</label>
                        <select name="severity" id="severity"
                            class="mt-1 w-full border-2 border-black p-1 hover:ring-red-500 hover:border-red-500">
                            <option value="" disabled selected>-- Pilih Keparahan --</option>
                            <option value="rendah">Rendah</option>
                            <option value="sedang">Sedang</option>
                            <option value="tinggi">Tinggi</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block text-sm font-bold text-gray-700">Deskripsi</label>
                        <textarea name="description" id="description" placeholder="Masukkan Deskripsi Kebiasaan Buruk Kamu"
                            class="mt-1 w-full border-2 border-black p-1 hover:ring-red-500 hover:border-red-500"></textarea>
                    </div>
                    <div class="col-span-2">
                        <button type="submit" class="flex-1 text-black border-2 border-black px-4 py-1 font-bold uppercase bg-red-600 text-white hover:bg-red-700 hover:scale-105 active:scale-95 transition-all">
                            Simpan Kebiasaan
                        </button>
                        <x-button route="{{ route('vice.index') }}" variant="outline">
                            Batal
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection