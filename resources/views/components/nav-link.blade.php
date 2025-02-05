@props(['url' => '/', 'icon' => ''])

<a href="{{ $url }}"
    {{ $attributes->merge(['class' => 'flex items-center p-2 rounded-lg text-white hover:bg-gray-600 group']) }}>
    <i
        class="fa fa-{{ $icon }} shrink-0 w-5 h-5  transition duration-75 text-gray-400  group-hover:text-white mx-1 mt-1"></i>
    <span class="text-lg flex-1 ms-3 whitespace-nowrap">{{ $slot }}</span>
</a>
