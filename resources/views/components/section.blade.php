@props([
    'section' => '',
])

<section class="py-6 sm:py-8">
    {{-- Header Section dengan aksen garis bawah lancip --}}
    @if($section)
        <div class="mb-6">
            <h1 class="text-2xl sm:text-3xl font-black italic tracking-tighter uppercase text-black">
                {{ $section }}<span class="text-red-600">.</span>
            </h1>
            {{-- Garis dekoratif minimalis --}}
            <div class="mt-2 h-1 w-12 bg-black"></div>
        </div>
    @endif

    {{-- Konten Utama --}}
    <div class="relative">
        {{ $slot }}
    </div>
</section>