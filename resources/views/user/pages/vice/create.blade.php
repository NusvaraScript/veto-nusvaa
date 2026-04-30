@extends('layout.user')
@section('title', 'Form Tambah - VetoNusvaa')

@section('content')
    <x-section section="Form Tambah List">
        
        {{-- Header Info --}}
        <div class="mb-6">
            <h2 class="text-xl font-black uppercase italic tracking-tighter text-black">Tambah List Baru</h2>
            <p class="text-xs font-bold text-gray-500 uppercase">Definisikan kebiasaan yang ingin kamu hentikan hari ini.</p>
        </div>

        <div class="border-2 border-black bg-white p-6 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
            <form action="{{ route('vice.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Nama List --}}
                    <div class="col-span-1">
                        <label for="habit_name" class="block text-[10px] font-black uppercase tracking-widest text-black mb-1">Nama Kebiasaan</label>
                        <input type="text" name="habit_name" id="habit_name" placeholder="CONTOH: MEROKOK, BEGADANG..." required
                            class="w-full border-2 border-black p-3 bg-white font-bold text-sm focus:ring-0 focus:border-red-600 outline-none transition-all placeholder:text-gray-300">
                        @error('habit_name')
                            <p class="text-red-600 text-[10px] font-bold uppercase mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Keparahan --}}
                    <div class="col-span-1">
                        <label for="severity" class="block text-[10px] font-black uppercase tracking-widest text-black mb-1">Level Keparahan</label>
                        <select name="severity" id="severity" required
                            class="w-full border-2 border-black p-3 bg-white font-bold text-sm focus:ring-0 focus:border-red-600 outline-none transition-all">
                            <option value="" disabled selected>-- PILIH LEVEL --</option>
                            <option value="rendah">RENDAH</option>
                            <option value="sedang">SEDANG</option>
                            <option value="tinggi">TINGGI</option>
                        </select>
                        @error('severity')
                            <p class="text-red-600 text-[10px] font-bold uppercase mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="col-span-1 md:col-span-2">
                        <label for="description" class="block text-[10px] font-black uppercase tracking-widest text-black mb-1">Deskripsi / Alasan Berhenti</label>
                        <textarea name="description" id="description" placeholder="Mengapa kamu ingin berhenti dari kebiasaan ini?"
                            class="w-full border-2 border-black p-3 bg-white font-bold text-sm focus:ring-0 focus:border-red-600 outline-none transition-all h-32 resize-none placeholder:text-gray-300">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-600 text-[10px] font-bold uppercase mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Action Buttons --}}
                    <div class="col-span-1 md:col-span-2 flex flex-col sm:flex-row gap-3 mt-2">
                        <button type="submit" 
                            class="bg-black text-white border-2 border-black px-8 py-3 font-black uppercase text-xs shadow-[2px_2px_0px_0px_rgba(220,38,38,1)] hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all">
                            Simpan Kebiasaan
                        </button>
                        <a href="{{ route('vice.index') }}" 
                            class="flex items-center justify-center bg-white text-black border-2 border-black px-8 py-3 font-black uppercase text-xs shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all text-center">
                            Batal
                        </a>
                    </div>

                </div>
            </form>
        </div>

    </x-section>
@endsection 