<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Car Wash Detailing')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>
    <h1>Car Wash Detailing</h1>
    <nav>
        <a href="{{ route('/') }}">Home</a>
        <a href="{{ route('services') }}">Diensten</a>
        <a href="{{ route('about') }}">Over Ons</a>
        <a href="{{ route('contact') }}">Contact</a>
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

<footer>
    &copy; {{ date('Y') }} Car Wash Detailing. Alle rechten voorbehouden.
        <div class="container mx-auto text-center">
            <p class="text-sm">Car Detailing Eppegem BV</p>
            <p class="text-sm">Telefoon: 0123-456789</p>
            <p class="text-sm">E-mail: info@cardetailingeppegem.be</p>
        </div>
</footer>
</body>
</html>
