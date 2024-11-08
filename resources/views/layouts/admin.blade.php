<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">
</head>
<body>
<header>
    <h1>Admin Paneel</h1>
    <nav>
        <a href="{{ route('admin.users.index') }}">Gebruikers</a>
        <a href="{{ route('admin.services.index') }}">Diensten</a>
        <a href="{{ route('admin.bookings.index') }}">Boekingen</a>
        <a href="{{ route('logout') }}">Uitloggen</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>&copy; {{ date('Y') }} Eye For Detailing</p>
</footer>
</body>
</html>
