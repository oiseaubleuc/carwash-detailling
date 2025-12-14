@extends('layouts.layout')

@section('title', 'Admin Login - MEA Detailing')

@section('content')
<div class="login-page">
    <div class="login-container">
        <div class="login-header">
            <h1><i class="fas fa-shield-alt"></i> Admin Login</h1>
            <p>Voer uw inloggegevens in om toegang te krijgen tot het admin dashboard</p>
        </div>

        @if (session('error'))
            <div class="login-message error">
                <i class="fas fa-exclamation-circle"></i>
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="login-message success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="login-message error">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Er zijn fouten opgetreden:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">
                    <i class="fas fa-envelope"></i> E-mail
                </label>
                <input type="email" name="email" id="email" 
                       value="{{ old('email') }}" 
                       placeholder="admin@carwash.be" 
                       required 
                       autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">
                    <i class="fas fa-lock"></i> Wachtwoord
                </label>
                <input type="password" name="password" id="password" 
                       placeholder="Voer uw wachtwoord in" 
                       required>
            </div>

            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Inloggen
            </button>
        </form>

        <div class="login-footer">
            <a href="{{ route('home') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Terug naar website
            </a>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .login-page {
        min-height: calc(100vh - 160px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.95) 0%, rgba(17, 17, 17, 0.98) 100%);
    }

    .login-container {
        background-color: #111111;
        padding: 50px 40px;
        border-radius: 12px;
        border: 1px solid rgba(232, 213, 183, 0.3);
        box-shadow: 0 8px 30px rgba(232, 213, 183, 0.2);
        max-width: 450px;
        width: 100%;
    }

    .login-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .login-header h1 {
        color: #E8D5B7;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 10px;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
    }

    .login-header h1 i {
        font-size: 1.8rem;
    }

    .login-header p {
        color: #e8e8e8;
        font-size: 0.95rem;
        margin: 0;
    }

    .login-message {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        word-wrap: break-word;
    }

    .login-message.success {
        background-color: #4CAF50;
        color: white;
    }

    .login-message.error {
        background-color: #ff6b6b;
        color: white;
    }

    .login-message ul {
        margin: 8px 0 0 0;
        padding-left: 20px;
    }

    .login-form {
        width: 100%;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #E8D5B7;
        font-weight: 500;
        margin-bottom: 10px;
        font-size: 0.95rem;
    }

    .form-group label i {
        font-size: 0.9rem;
    }

    .form-group input {
        width: 100%;
        padding: 14px;
        border: 2px solid rgba(232, 213, 183, 0.3);
        border-radius: 8px;
        background-color: #000000;
        color: #e8e8e8;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group input:focus {
        outline: none;
        border-color: #E8D5B7;
        box-shadow: 0 0 15px rgba(232, 213, 183, 0.3);
        background-color: #111111;
    }

    .form-group input::placeholder {
        color: rgba(232, 213, 183, 0.5);
    }

    .btn-login {
        width: 100%;
        padding: 16px;
        background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%);
        color: #000000;
        border: 2px solid #E8D5B7;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        touch-action: manipulation;
        text-shadow: none;
        margin-top: 10px;
    }

    .btn-login:hover,
    .btn-login:active {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(232, 213, 183, 0.4);
        background: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 100%);
    }

    .login-footer {
        margin-top: 30px;
        text-align: center;
        padding-top: 20px;
        border-top: 1px solid rgba(232, 213, 183, 0.2);
    }

    .back-link {
        color: #E8D5B7;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .back-link:hover {
        color: #F5E6D3;
        text-shadow: 0 0 10px rgba(232, 213, 183, 0.5);
        gap: 12px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .login-page {
            padding: 20px 15px;
            min-height: calc(100vh - 140px);
        }

        .login-container {
            padding: 40px 30px;
        }

        .login-header h1 {
            font-size: 1.7rem;
        }

        .login-header p {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 480px) {
        .login-container {
            padding: 30px 20px;
        }

        .login-header h1 {
            font-size: 1.5rem;
        }

        .form-group input {
            padding: 12px;
            font-size: 16px; /* Prevents zoom on iOS */
        }

        .btn-login {
            padding: 14px;
            font-size: 1rem;
        }
    }
</style>
@endsection
