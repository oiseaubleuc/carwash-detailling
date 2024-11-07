@extends('layouts.layout')

@section('content')
    <div class="login-container">
        <h2>Admin Login</h2>
        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" class="btn">Inloggen</button>
        </form>
    </div>
@endsection
