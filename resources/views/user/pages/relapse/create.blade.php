@extends('user.layout.app')
@section('title', 'Form Tambah Relapse - VetoNusvaa')

@section('content')
    <x-section section="Form Tambah Relapse">
        
        {{-- Header Info --}}
        <x-page-header
            title="Catat Kekalahan"
            subtitle="Jujur pada diri sendiri adalah langkah pertama untuk bangkit."
            title-class="text-xl font-black uppercase italic tracking-tighter"
        />

        <x-panel class="p-6">
            <form action="{{ route('relapse.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6">
                    
                    {{-- Select Kebiasaan --}}
                    <div>
                        <label for="vices_id" class="block text-[10px] font-black uppercase tracking-widest text-black mb-1">Pilih Kebiasaan Buruk <span class="text-red-600">*</span></label>
                        <select name="vices_id" id="vices_id" required
                            class="w-full border-2 border-black p-3 bg-white font-bold text-sm focus:ring-0 focus:border-red-600 outline-none transition-all">
                            <option value="" disabled selected>-- PILIH DATA --</option>
                            @foreach($vices as $vice)
                                <option value="{{ $vice['id'] }}">{{ strtoupper($vice['label']) }}</option>
                            @endforeach
                        </select>
                        @error('vices_id')
                            <p class="text-red-600 text-[10px] font-bold uppercase mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tanggal --}}
                    <div>
                        <label for="violation_date" class="block text-[10px] font-black uppercase tracking-widest text-black mb-1">Tanggal Kambuh <span class="text-red-600">*</span></label>
                        <input type="date" name="violation_date" id="violation_date" required
                            value="{{ old('violation_date', date('Y-m-d')) }}"
                            class="w-full border-2 border-black p-3 bg-white font-bold text-sm focus:ring-0 focus:border-red-600 outline-none transition-all">
                        @error('violation_date')
                            <p class="text-red-600 text-[10px] font-bold uppercase mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Alasan --}}
                    <div>
                        <label for="excuse" class="block text-[10px] font-black uppercase tracking-widest text-black mb-1">Alasan / Catatan (Opsional)</label>
                        <textarea name="excuse" id="excuse" placeholder="Kenapa ini terjadi? Catat situasinya agar tidak terulang..."
                            class="w-full border-2 border-black p-3 bg-white font-bold text-sm focus:ring-0 focus:border-red-600 outline-none transition-all h-32 resize-none">{{ old('excuse') }}</textarea>
                        @error('excuse')
                            <p class="text-red-600 text-[10px] font-bold uppercase mt-1 italic">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Info Reset --}}
                    <div class="bg-red-50 border-2 border-dashed border-red-600 p-3">
                        <p class="text-[10px] font-black text-red-600 uppercase leading-tight">
                            <i class="fas fa-exclamation-triangle mr-1"></i> Perhatian: Streak kebiasaan ini akan di-reset menjadi 0 hari segera setelah disimpan.
                        </p>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        <button type="submit" class="bg-red-600 text-white border-2 border-black px-6 py-3 font-black uppercase text-xs shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all">
                            Simpan Kekalahan
                        </button>
                        <a href="{{ route('relapse.index') }}" class="flex items-center justify-center bg-white text-black border-2 border-black px-6 py-3 font-black uppercase text-xs shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-none transition-all text-center">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </x-panel>

    </x-section>
@endsection