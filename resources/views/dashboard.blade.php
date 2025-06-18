@extends('layouts.app')
@section('content')

    @auth
        @if (Auth::user()->role === \App\Enums\Role::ADMIN)

            <div class="row py-lg-5">
                <h2>Tutti i Profili</h2>
                <div class="col-lg-6 col-md-8 mx-auto">
                    <a href="{{ route('profiles.index') }}" class="btn btn-primary mb-3">Visualizza tutti i profili</a>
                </div>
                <div class="col-lg-6 col-md-8 mx-auto">
                    <a href="{{ route('messages.select') }}" class="btn btn-outline-primary">
                        Apri chat
                    </a>

                </div>
            </div>

        @elseif(Auth::user()->role === \App\Enums\Role::USER)
            <h2>Il tuo profilo</h2>

            @php
                $profile = auth()->user()->profile;
            @endphp

            @if($profile)
                <ul>
                    <li>Età: {{ $profile->età ?? '-' }}</li>
                    <li>Sesso: {{ ucfirst($profile->sesso) ?? '-' }}</li>
                    <li>Altezza: {{ $profile->altezza ?? '-' }} cm</li>
                    <li>Peso: {{ $profile->peso ?? '-' }} kg</li>
                    <li>Obiettivi: {{ $profile->obiettivi ?? '-' }}</li>
                </ul>
                <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning">Modifica profilo</a>

                <a href="{{ route('messages.select') }}" class="btn btn-outline-primary">
                    Apri chat
                </a>
            @else
                <p>Non hai ancora un profilo. <a href="{{ route('profiles.create') }}" class="btn btn-primary">Crea
                        Nuovo Profilo</a></p>
            @endif
        @else
            <p>Ruolo non riconosciuto</p>
        @endif
    @endauth
@endsection