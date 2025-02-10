@props([
    'icon' => null,
    'heading' => 'Heading of the card goes here...',
    'text' => 'Description of the card goes here...',
])

<div class="space-y-3">
    <span class="inline-block p-3 text-blue-500 bg-blue-100 rounded-full dark:text-white dark:bg-blue-500">
        @if ($icon)
            <i class="fa fa-{{ $icon }} fa-lg"></i>
        @endif
    </span>

    <h1 class="text-xl font-semibold text-gray-700 capitalize dark:text-white">{{ $heading }}</h1>

    <p class="text-gray-500 dark:text-gray-300">
        {{ $text }}
    </p>
</div>
