@props(['url' => '/', 'icon' => null])

<a href="{{ $url }}" class="block px-3 py-2  rounded-lg text-gray-200  hover:text-gray-400 lg:mx-2">
    @if ($icon)
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>
