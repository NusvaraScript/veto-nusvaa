@props([
    'class' => ''
])

<div class="border-2 border-black p-4 hover:shadow-[5px_5px_0px_#000] transition-all {{ $class }}">
    {{ $slot }}
</div>