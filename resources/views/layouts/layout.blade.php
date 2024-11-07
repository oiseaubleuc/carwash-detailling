<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Car Wash Detailing')</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js'></script>


    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>

<a href="{{ url('/') }}">
    <img src="{{ asset('images/logo.jpg') }}" alt="Car Wash Detailing Logo" class="logo">
</a>

<header>
    <h1>Car Wash Detailing</h1>
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('services') }}" class="text-white">Services</a>
        <a href="{{ route('about') }}">Over Ons</a>
        <a href="{{ route('contact') }}">Contact</a>
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

<footer class="footer">
    <div class="footer-content">
        <p>© 2024 Car Wash Detailing. Alle rechten voorbehouden.</p>
        <p>MEA Detailing BV</p>
        <p>Telefoon: +32 487 905 165</p>
        <p>E-mail: <a href="mailto:clean.your.carr2023@gmail.com">clean.your.carr2023@gmail.com</a></p>
        <p>BTW: BE 0805.672.003</p>
    </div>
</footer>

</body>
</html>
