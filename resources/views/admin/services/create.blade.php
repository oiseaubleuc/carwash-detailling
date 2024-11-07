@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Nieuwe Dienst Aanmaken</h1>

        <form action="{{ route('admin.services.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Naam</label>
                <input type="text" name="name" id="name" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Beschrijving</label>
                <textarea name="description" id="description" class="mt-1 block w-full"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Aanmaken</button>
        </form>
    </div>
@endsection
