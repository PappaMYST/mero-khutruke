<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Mero Khutruke | Personal Finance Manager' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:400,500,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="font-sans antialiased bg-gray-900">
    @include('layouts.navigation')
    <!-- Page Content -->
    <main class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            {{-- Display alert messages --}}
            @if (session('success'))
                <x-alert type="success" message="{{ session('success') }}"></x-alert>
            @endif
            @if (session('error'))
                <x-alert type="error" message="{{ session('error') }}"></x-alert>
            @endif
            {{ $slot }}
        </div>
    </main>
    {{-- Scripts --}}

    @stack('scripts')
</body>

</html>
