@props(['type', 'message'])

@if (session()->has($type))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 5000)" x-show="show"
        class="p-4 mb-4 text-sm font-semibold text-gray-200 rounded {{ $type == 'success' ? 'bg-green-600' : 'bg-red-600' }}">
        {{ $message }}
    </div>
@endif
