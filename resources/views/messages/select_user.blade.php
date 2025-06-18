@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Seleziona un utente per chattare</h3>

        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $user->name }}
                    <a href="{{ route('messages.chat', $user->id) }}" class="btn btn-sm btn-primary">Chatta</a>
                </li>
            @endforeach
        </ul>
    </div>
    {{--@php
        $user = Auth::user();
    @endphp

    @if($user->role === \App\Enums\Role::ADMIN)
        <div class="container">
            <h3>Seleziona un utente per chattare</h3>

            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $user->name }}
                        <a href="{{ route('messages.chat', $user->id) }}" class="btn btn-sm btn-primary">Chatta</a>
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p>Accesso negato. Solo i Personar trainer possono avviare conversazioni.</p>
    @endif--}}
@endsection
