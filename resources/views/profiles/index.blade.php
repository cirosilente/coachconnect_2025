@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista Profili</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($profiles->isEmpty())
            <p>Nessun profilo trovato.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Utente</th>
                    <th>Età</th>
                    <th>Sesso</th>
                    <th>Altezza</th>
                    <th>Peso</th>
                    <th>Obiettivi</th>
                    <th>Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>{{ $profile->user->name ?? 'Sconosciuto' }}</td>
                        <td>{{ $profile->età }}</td>
                        <td>{{ $profile->sesso }}</td>
                        <td>{{ $profile->altezza }}</td>
                        <td>{{ $profile->peso }}</td>
                        <td>{{ $profile->obiettivi }}</td>
                        <td>
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-sm btn-primary">Modifica</a>
                            <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Elimina</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('profiles.create') }}" class="btn btn-success">Crea Nuovo Profilo</a>
    </div>
@endsection
