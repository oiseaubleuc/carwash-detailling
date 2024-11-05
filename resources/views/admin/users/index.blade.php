@extends('layouts.layout')

@section('title', 'Gebruikersbeheer')

@section('content')
    <div class="container">
        <h1>Gebruikersbeheer</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-warning">Nieuwe gebruiker toevoegen</a>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user->id) }}">Bewerken</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Verwijderen</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
