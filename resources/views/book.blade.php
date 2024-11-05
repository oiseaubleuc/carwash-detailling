@extends('layouts.layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-dark text-white">
                        <h3>Boek een Afspraak</h3>
                    </div>

                    <div class="card-body bg-light">
                        <form >
                            @csrf

                            <div class="form-group mb-4">
                                <label for="firstname" class="form-label">Voornaam</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Voer je voornaam in" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Voer je e-mail in" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="phone" class="form-label">Telefoonnummer</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Voer je telefoonnummer in" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="service" class="form-label">Kies een Dienst</label>
                                <select class="form-select" id="service" name="service" required>
                                    <option value="">Selecteer een dienst...</option>
                                    <option value="wassen">Wassen</option>
                                    <option value="polijsten">Polijsten</option>
                                    <option value="interieur">Interieur reinigen</option>
                                </select>
                            </div>

                            <div class="form-group mb-4">
                                <label for="date" class="form-label">Datum</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="time" class="form-label">Tijd</label>
                                <input type="time" class="form-control" id="time" name="time" required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="note" class="form-label">Opmerking</label>
                                <textarea id="note" name="note" rows="4" class="form-control"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-warning btn-lg">Bevestig Boekingen</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
