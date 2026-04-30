@extends('user.layout.app')
@section('title', 'Form Tambah Relapse - VetoNusvaa')

@section('content')
    <x-section section="Form Tambah Relapse">
        <p class="text-gray-600 mb-4">Catat kapan Anda kambuh dari kebiasaan buruk.</p>

        <div class="my-4 border-2 border-black p-4">
            <form action="{{ route('relapse.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="vices_id" class="block text-sm font-bold text-gray-700">Pilih Kebiasaan Buruk <span class="text-red-500">*</span></label>
                        <select name="vices_id" id="vices_id" required
                            class="mt-1 w-full border-2 border-black p-2 hover:ring-red-500 hover:border-red-500">
                            <option value="" disabled selected>-- Pilih Kebiasaan --</option>
                            @foreach($vices as $vice)
                                <option value="{{ $vice['id'] }}">{{ $vice['label'] }}</option>
                            @endforeach
                        </select>
                        @error('vices_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="violation_date" class="block text-sm font-bold text-gray-700">Tanggal Kambuh <span class="text-red-500">*</span></label>
                        <input type="date" name="violation_date" id="violation_date" required
                            value="{{ old('violation_date', date('Y-m-d')) }}"
                            class="mt-1 w-full border-2 border-black p-2 hover:ring-red-500 hover:border-red-500">
                        @error('violation_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="excuse" class="block text-sm font-bold text-gray-700">Alasan / Excuse</label>
                        <textarea name="excuse" id="excuse" placeholder="Tuliskan alasan atau catatan..."
                            class="mt-1 w-full border-2 border-black p-2 hover:ring-red-500 hover:border-red-500 h-32">{{ old('excuse') }}</textarea>
                        @error('excuse')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="flex-1 text-black border-2 border-black px-4 py-1 font-bold uppercase bg-red-600 text-white hover:bg-red-700 hover:scale-105 active:scale-95 transition-all">
                            Simpan Relapse
                        </button>
                        <x-button route="{{ route('relapse.index') }}" variant="outline">
                            Batal
                        </x-button>
                    </div>
                </div>
            </form>
        </div>

        {{-- Info Box --}}
        <div class="mt-4 p-4 bg-yellow-50 border-2 border-yellow-500">
            <p class="text-sm text-yellow-800">
                <i class="fas fa-info-circle"></i> 
                <strong>Catatan:</strong> Ketika Anda menyimpan relapse, streak kebiasaan tersebut akan otomatis di-reset menjadi 0.
            </p>
        </div>
    </x-section>
@endsection