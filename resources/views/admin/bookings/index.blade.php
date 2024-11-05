@extends('layouts.layout')

@section('title', 'Boekingen')

@section('content')
    <div class="container">
        <h1>Boekingen</h1>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Klantnaam</th>
                <th>Dienst</th>
                <th>Datum</th>
                <th>Tijd</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->service_name }}</td>
                    <td>{{ $booking->date }}</td>
                    <td>{{ $booking->time }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
