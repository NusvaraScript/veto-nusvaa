@props([
    'route' => '#',
    'target' => '_self',
    'variant' => 'solid',
    'onclick' => '',
    'class' => ''
])

@php
    $button = match($variant) {
        'solid' => 'w-full text-black border-2 border-black px-4 py-1 font-bold uppercase hover:bg-red-600 hover:text-white transition hover:shadow-[5px_5px_0px_#fff] hover:scale-105
        active:scale-95
        transition-all',
        'outline' => 'bg-black border-2 border-white/10 hover:border-white hover:shadow-[5px_5px_0px_#fff]
        hover:scale-105
        active:scale-95
        transition-all',
        'ghost' => 'text-white underline decoration-transparent hover:decoration-white hover:scale-105
        active:scale-95
        transition-all',
        'danger' => 'font-bold uppercase px-4 py-1 bg-red-600 text-white border-2 border-black hover:bg-red-700 hover:scale-105 active:scale-95
        transition-all',
        'warning' => 'font-bold uppercase px-4 py-1 bg-yellow-600 text-white border-2 border-black hover:bg-yellow-700 hover:scale-105 active:scale-95
        transition-all',
        default => 'leading-relaxed text-blue-500 hover:underline'
    };
@endphp

<a href="{{ $route }}" target="{{ $target }}" class="{{ $button }} {{ $class }}" onclick="{{ $onclick }}">
    {{ $slot }}
</a>