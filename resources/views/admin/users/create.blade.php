@extends('layouts.admin')

@section('title', 'Nieuwe Gebruiker Aanmaken')

@section('content')
<div style="width: 100%; max-width: 800px;">
    <h1 style="color: #E8D5B7; font-size: 2.5rem; margin-bottom: 20px;">Nieuwe Gebruiker Aanmaken</h1>

    @if($errors->any())
        <div style="background-color: #ff6b6b; color: white; padding: 15px; border-radius: 5px; margin-bottom: 20px; box-shadow: 0 4px 8px rgba(255, 107, 107, 0.3);">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Er zijn fouten opgetreden:</strong>
            </div>
            <ul style="margin: 0; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="POST" style="background-color: #111111; padding: 30px; border-radius: 8px; border: 1px solid rgba(232, 213, 183, 0.3);">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Naam *</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">E-mail *</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Wachtwoord *</label>
            <input type="password" name="password" id="password" required
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password_confirmation" style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Bevestig Wachtwoord *</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required
                   style="width: 100%; padding: 10px; border: 1px solid rgba(232, 213, 183, 0.3); border-radius: 5px; background-color: #000000; color: #e8e8e8;">
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: flex; align-items: center; gap: 10px; color: #E8D5B7; font-weight: 500;">
                <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}
                       style="width: 20px; height: 20px; cursor: pointer;">
                <span>Admin gebruiker</span>
            </label>
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn" style="background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%); color: #000000; padding: 10px 30px; border: 2px solid #E8D5B7; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 16px;">
                Gebruiker Aanmaken
            </button>
            <a href="{{ route('admin.users.index') }}" style="color: #E8D5B7; text-decoration: none; margin-left: 15px;">Annuleren</a>
        </div>
    </form>
</div>
@endsection
