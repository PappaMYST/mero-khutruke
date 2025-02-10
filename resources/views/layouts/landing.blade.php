<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Title --}}
    <title>{{ $title ?? 'Mero Khutruke | Personal Finance Manager' }}</title>
</head>

<body>
    @include('landing-sections.header')
    <main>
        @include('landing-sections.hero')
        @include('landing-sections.about')
        @include('landing-sections.features')
        @include('landing-sections.blogs')
        @include('landing-sections.contact')
    </main>
    @include('landing-sections.footer')
</body>

</html>
