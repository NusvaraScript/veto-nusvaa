@props([
    'class' => '',
])

<div class="border-2 border-black bg-white shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] {{ $class }}">
    {{ $slot }}
</div>
