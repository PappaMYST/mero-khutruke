@props(['url' => '/', 'icon' => null])

<a href="{{ $url }}"
    class="block px-3 py-2 text-gray-600 rounded-lg dark:text-gray-200 hover:bg-gray-100 hover:text-gray-600 lg:mx-2">
    @if ($icon)
        <i class="fa fa-{{ $icon }} mr-1"></i>
    @endif
    {{ $slot }}
</a>
