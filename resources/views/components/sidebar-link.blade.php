@props([
    'route' => '#',
    'icon' => '',
    'label' => '',
    'iconBg' => 'bg-white',
    'iconText' => 'text-black',
    'target' => '_self'
])

<a href="{{ $route }}" target="{{ $target }}" class="flex items-center w-full group/link transition-all">
    <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center {{ $iconBg }} {{ $iconText }} border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] group-hover/link:shadow-none group-hover/link:translate-x-[2px] group-hover/link:translate-y-[2px] transition-all">
        <i class="{{ $icon }} text-lg"></i>
    </div>
    <span class="ml-4 text-xs font-black uppercase italic whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all duration-300">
        {{ $label }}
    </span>
</a>
