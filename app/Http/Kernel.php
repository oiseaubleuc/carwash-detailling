<!-- resources/views/layouts/dashboard_layout.blade.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
<header>
    <h1>Admin Dashboard</h1>
    <nav>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.users.index') }}">Gebruikers</a></li>
            <li><a href="{{ route('admin.bookings.index') }}">Boekingen</a></li>
            <li><a href="{{ route('admin.services.index') }}">Diensten</a></li>
            <li><a href="{{ route('logout') }}">Uitloggen</a></li>
        </ul>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <p>© 2024 Car Wash Detailing. Alle rechten voorbehouden.</p>
</footer>
</body>
</html>
