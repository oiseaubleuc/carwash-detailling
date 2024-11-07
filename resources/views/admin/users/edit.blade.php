@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Gebruiker Bewerken</h1>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Naam</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">E-mail</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Wachtwoord (laat leeg om niet te wijzigen)</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full">
            </div>

            <button type="submit" class="btn btn-primary">Bijwerken</button>
        </form>
    </div>
@endsection
