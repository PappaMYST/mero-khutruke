@props(['url' => '/', 'icon' => ''])

<a href="{{ $url }}"
    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
    <i
        class="fa fa-{{ $icon }} shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white mx-1 mt-1"></i>
    <span class="text-lg flex-1 ms-3 whitespace-nowrap">{{ $slot }}</span>
</a>
