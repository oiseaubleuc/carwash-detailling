@extends('layouts.layout')

@section('title', 'Servicebeheer')

@section('content')
    <div class="container">
        <h1>Servicebeheer</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-warning">Nieuwe dienst toevoegen</a>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->name }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service->id) }}">Bewerken</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display:inline;">
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
