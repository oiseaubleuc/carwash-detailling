@extends('layouts.layout')

@section('content')
    <h1 class="text-4xl font-bold text-center my-6">Contact</h1>
    <form action="{{ route('contact.send') }}" method="POST" class="max-w-md mx-auto space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-lg">Naam:</label>
            <input type="text" name="name" id="name" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label for="email" class="block text-lg">E-mail:</label>
            <input type="email" name="email" id="email" class="w-full p-2 border rounded" required>
        </div>
        <div>
            <label for="message" class="block text-lg">Bericht:</label>
            <textarea name="message" id="message" rows="4" class="w-full p-2 border rounded" required></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Verstuur</button>
    </form>
    <a href="{{ route('home') }}" class="block text-center mt-4">Terug naar Home</a>
@endsection
