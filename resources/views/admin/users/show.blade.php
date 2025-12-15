@extends('layouts.admin')

@section('title', 'Gebruiker Details')

@section('content')
<div style="width: 100%; max-width: 800px;">
    <h1 style="color: #E8D5B7; font-size: 2.5rem; margin-bottom: 20px;">Gebruiker Details</h1>

    <div style="background-color: #111111; padding: 30px; border-radius: 8px; border: 1px solid rgba(232, 213, 183, 0.3);">
        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Naam</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $user->name }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">E-mail</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $user->email }}</p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Admin Status</label>
            <p style="color: #e8e8e8; margin: 0;">
                @if($user->is_admin)
                    <span style="color: #4CAF50;"><i class="fas fa-check-circle"></i> Admin</span>
                @else
                    <span style="color: #ff6b6b;"><i class="fas fa-times-circle"></i> Gebruiker</span>
                @endif
            </p>
        </div>

        <div style="margin-bottom: 20px;">
            <label style="display: block; color: #E8D5B7; font-weight: 500; margin-bottom: 5px;">Aangemaakt op</label>
            <p style="color: #e8e8e8; margin: 0;">{{ $user->created_at->format('d-m-Y H:i') }}</p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn" style="background: linear-gradient(135deg, #E8D5B7 0%, #D4C5A9 100%); color: #000000; padding: 10px 30px; border: 2px solid #E8D5B7; border-radius: 5px; cursor: pointer; font-weight: 600; font-size: 16px; text-decoration: none; display: inline-block;">
                Bewerken
            </a>
            <a href="{{ route('admin.users.index') }}" style="color: #E8D5B7; text-decoration: none; margin-left: 15px;">Terug naar Overzicht</a>
        </div>
    </div>
</div>
@endsection

