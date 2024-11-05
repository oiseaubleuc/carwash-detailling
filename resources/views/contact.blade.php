@extends('layouts.layout')

@section('content')
    <h1 class="text-4xl font-bold text-center my-6">Contact</h1>

    <div class="flex justify-center">
        <form action="{{ route('contact.send') }}" method="POST" class="max-w-md w-full space-y-4 bg-gray-800 p-6 rounded shadow-lg">
            @csrf
            <div>
                <label for="name" class="block text-lg text-yellow-500">Naam:</label>
                <input type="text" name="name" id="name" class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white" required>
            </div>
            <div>
                <label for="email" class="block text-lg text-yellow-500">E-mail:</label>
                <input type="email" name="email" id="email" class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white" required>
            </div>
            <div>
                <label for="message" class="block text-lg text-yellow-500">Bericht:</label>
                <textarea name="message" id="message" rows="4" class="w-full p-2 border border-gray-600 rounded bg-gray-700 text-white" required></textarea>
            </div>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Verstuur</button>
        </form>
    </div>

    <a href="{{ route('home') }}" class="block text-center mt-4 text-yellow-500 hover:underline">Terug naar Home</a>
@endsection
