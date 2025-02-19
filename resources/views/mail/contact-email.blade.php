<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Mero Khutruke | Personal Finance Manager' }}</title>
</head>

<body>
    <div>
        <h3>Name: {{ $name }}</h3>
        <h3>Email: {{ $email }}</h3>
        <h3>Message: {{ $messageContent }}</h3>
    </div>
</body>

</html>
