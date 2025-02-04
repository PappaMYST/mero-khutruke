@props([
    'name' => 'John Doe',
    'title' => 'Null',
    'src' =>
        'https://images.unsplash.com/photo-1493863641943-9b68992a8d07?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=739&q=80',
])
<div class=" object-cover  text-center">
    <img class=" object-cover object-center w-72 h-48 rounded-lg" src="{{ $src }}" alt="avatar" />

    <div class="mt-2">
        <h3 class="text-lg font-medium text-gray-700 dark:text-gray-200">{{ $name }}</h3>
        <span class="mt-1 font-medium text-gray-600 dark:text-gray-300">{{ $title }}</span>
    </div>
</div>
