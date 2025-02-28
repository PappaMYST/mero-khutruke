@props([
    'url' => '/',
    'icon' => null,
    'textClass' => 'text-white',
    'bgClass' => 'bg-gray-900',
    'minWidthClass' => '',
    'hoverClass' => 'hover:bg-gray-700',
])

<a href="{{ $url }}"
    class="{{ $bgClass }} {{ $textClass }} {{ $minWidthClass }} {{ $hoverClass }} block px-5 py-2 text-sm font-medium tracking-wider text-center transition-colors duration-300 transform rounded-md">
    {{ $slot }}
    @if ($icon)
        <i class="fa fa-{{ $icon }} ml-1"></i>
    @endif
</a>
