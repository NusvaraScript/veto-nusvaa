@props([
    'title' => '',
    'subtitle' => '',
    'titleClass' => 'text-xl font-black uppercase italic tracking-tighter',
    'subtitleClass' => 'text-xs font-bold text-gray-500 uppercase',
    'wrapperClass' => 'mb-6',
])

<div class="{{ $wrapperClass }}">
    <h2 class="{{ $titleClass }}">{{ $title }}</h2>
    @if($subtitle)
        <p class="{{ $subtitleClass }}">{{ $subtitle }}</p>
    @endif
</div>
