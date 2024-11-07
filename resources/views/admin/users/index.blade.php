@extends('layouts.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Beheer Gebruikers</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-4">Nieuwe Gebruiker Aanmaken</a>

        <table class="min-w-full bg-gray-800">
            <thead>
            <tr>
                <th class="text-left py-3 px-4">Naam</th>
                <th class="text-left py-3 px-4">E-mail</th>
                <th class="text-left py-3 px-4">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="py-3 px-4">{{ $user->name }}</td>
                    <td class="py-3 px-4">{{ $user->email }}</td>
                    <td class="py-3 px-4">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500 hover:underline">Bewerken</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
