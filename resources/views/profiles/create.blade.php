@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Crea Nuovo Profilo</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $errore)
                        <li>{{ $errore }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('profiles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_id" class="form-label">Utente</label>
                <select class="form-select" name="user_id" required>
                    <option value="">-- Seleziona utente --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Età</label>
                <input type="number" name="età" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Sesso</label>
                <select name="sesso" class="form-select">
                    <option value="">-- Seleziona --</option>
                    <option value="maschio">Maschio</option>
                    <option value="femmina">Femmina</option>
                    <option value="altro">Altro</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Altezza (cm)</label>
                <input type="number" step="0.01" name="altezza" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Obiettivi</label>
                <input type="text" name="obiettivi" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Note</label>
                <textarea name="note" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Programma Allenamento</label>
                <textarea name="programma_allenamento" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Salva Profilo</button>
        </form>
    </div>
@endsection
