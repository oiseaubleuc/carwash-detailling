@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Nieuwe Boekingen Aanmaken</h1>

        <form action="{{ route('admin.bookings.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-4">
                <label for="customer_name" class="block text-sm font-medium">Klantnaam</label>
                <input type="text" name="customer_name" id="customer_name" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium">Datum</label>
                <input type="date" name="date" id="date" class="mt-1 block w-full" required>
            </div>

            <button type="submit" class="btn btn-primary">Aanmaken</button>
        </form>
    </div>
@endsection
