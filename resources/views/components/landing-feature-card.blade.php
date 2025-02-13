@props([
    'icon' => null,
    'heading' => 'Heading of the card goes here...',
    'text' => 'Description of the card goes here...',
])

<div class="space-y-3">
    <span class="inline-block p-3 rounded-full text-gray-200 bg-blue-500">
        @if ($icon)
            <i class="fa fa-{{ $icon }} fa-lg"></i>
        @endif
    </span>

    <h1 class="text-xl font-semibold capitalize text-gray-100">{{ $heading }}</h1>

    <p class="text-gray-300">
        {{ $text }}
    </p>
</div>
