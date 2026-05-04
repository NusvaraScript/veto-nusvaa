@props([
    'route' => '#',
    'target' => '_self',
    'variant' => 'solid',
    'onclick' => '',
    'class' => ''
])

@php
    $button = match($variant) {
        'solid' => 'inline-block bg-red-600 text-white border-2 border-black px-2 py-1 font-bold uppercase hover:bg-white hover:text-black hover:shadow-block hover:scale-105 active:scale-95 transition-all',
        'outline' => 'inline-block bg-white text-black border-2 border-black px-2 py-1 font-bold uppercase hover:bg-red-600 hover:text-white hover:shadow-block hover:scale-105 active:scale-95 transition-all',
        'ghost' => 'text-white underline decoration-transparent hover:decoration-white hover:scale-105 active:scale-95 transition-all',
        'danger' => 'font-bold uppercase px-2 py-1 bg-red-600 text-white border-2 border-black hover:bg-red-700 hover:scale-105 active:scale-95 transition-all',
        'warning' => 'inline-block bg-yellow-500 text-white border-2 border-black px-2 py-1 font-bold uppercase hover:bg-white hover:text-black hover:shadow-block hover:scale-105 active:scale-95 transition-all',
        default => 'leading-relaxed text-blue-500 hover:underline'
    };
@endphp

<a href="{{ $route }}" target="{{ $target }}" class="{{ $button }} {{ $class }}" onclick="{{ $onclick }}">
    {{ $slot }} 
</a>