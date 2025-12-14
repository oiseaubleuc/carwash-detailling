@extends('layouts.layout')

@section('title', 'Contact - MEA Detailing')

@section('content')
<div class="contact-container">
    <h1>Contact</h1>

    <div class="contact-form-wrapper">
        <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
            @csrf
            
            @if(session('success'))
                <div class="form-message success">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="form-message error">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Er zijn fouten opgetreden:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="form-group">
                <label for="name">Naam *</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       placeholder="Uw volledige naam">
            </div>
            
            <div class="form-group">
                <label for="email">E-mail *</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       placeholder="uw.email@voorbeeld.nl">
            </div>
            
            <div class="form-group">
                <label for="message">Bericht *</label>
                <textarea name="message" id="message" rows="6" required
                          placeholder="Uw bericht...">{{ old('message') }}</textarea>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-submit">
                    <i class="fas fa-paper-plane"></i> Verstuur
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    .contact-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 20px;
        min-height: calc(100vh - 300px);
    }

    .contact-container h1 {
        color: #E8D5B7;
        font-size: 2.5rem;
        margin-bottom: 30px;
        text-align: center;
        text-shadow: 0 0 20px rgba(232, 213, 183, 0.5);
        word-wrap: break-word;
    }

    .contact-form-wrapper {
        background-color: #111111;
        padding: 40px;
        border-radius: 8px;
        border: 1px solid rgba(232, 213, 183, 0.3);
        box-shadow: 0 4px 8px rgba(232, 213, 183, 0.2);
    }

    .contact-form {
        width: 100%;
    }

    .form-message {
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
        gap: 10px;
        word-wrap: break-word;
    }

    .form-message.success {
        background-color: #4CAF50;
        color: white;
    }

    .form-message.error {
        background-color: #ff6b6b;
        color: white;
    }

    .form-message ul {
        margin: 10px 0 0 0;
        padding-left: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #E8D5B7;
        font-weight: 500;
        margin-bottom: 8px;
        font-size: 1rem;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid rgba(232, 213, 183, 0.3);
        border-radius: 5px;
        background-color: #000000;
        color: #e8e8e8;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #E8D5B7;
        box-shadow: 0 0 10px rgba(232, 213, 183, 0.3);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-actions {
        text-align: center;
        margin-top: 30px;
    }

    .btn-submit {
        background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%);
        color: #000000;
        padding: 12px 40px;
        border: 2px solid #E8D5B7;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        touch-action: manipulation;
        text-shadow: none;
    }

    .btn-submit:hover,
    .btn-submit:active {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(232, 213, 183, 0.3);
        background: linear-gradient(135deg, #F5E6D3 0%, #E8D5B7 100%);
        color: #000000;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .contact-container {
            padding: 30px 15px;
        }

        .contact-container h1 {
            font-size: 2rem;
            margin-bottom: 25px;
        }

        .contact-form-wrapper {
            padding: 30px 20px;
        }
    }

    @media (max-width: 480px) {
        .contact-container {
            padding: 20px 10px;
        }

        .contact-container h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .contact-form-wrapper {
            padding: 20px 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group textarea {
            padding: 10px;
            font-size: 16px; /* Prevents zoom on iOS */
        }

        .btn-submit {
            width: 100%;
            padding: 12px 20px;
            justify-content: center;
        }
    }

    @media (max-width: 360px) {
        .contact-container h1 {
            font-size: 1.3rem;
        }

        .contact-form-wrapper {
            padding: 15px 12px;
        }
    }
</style>
@endsection
