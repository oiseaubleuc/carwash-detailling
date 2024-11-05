{{-- resources/views/auth/login.blade.php --}}
    <!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <title>Inloggen</title>
</head>
<body>
<h1>Inloggen</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Inloggen</button>
</form>
@if ($errors->any())
    <div>
        <strong>{{ $errors->first() }}</strong>
    </div>
@endif
</body>
</html>
