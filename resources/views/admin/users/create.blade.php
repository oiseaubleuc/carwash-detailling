@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Nieuwe Gebruiker Aanmaken</h1>

        <form action="{{ route('admin.users.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Naam</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">E-mail</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Wachtwoord</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium">Bevestig Wachtwoord</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full" required>
            </div>

            <button type="submit" class="btn btn-primary">Aanmaken</button>
        </form>
    </div>
@endsection
