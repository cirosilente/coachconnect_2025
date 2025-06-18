@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Chat con {{ $otherUser->name }}</h3>

        <div class="mb-4" style="max-height: 400px; overflow-y: auto;">
            @foreach($messages as $msg)
                <div class="mb-2 {{ $msg->sender_id === auth()->id() ? 'text-end' : 'text-start' }}">
                    <strong>{{ $msg->sender->name }}:</strong>
                    <div class="border rounded p-2 d-inline-block">
                        {{ $msg->content }}
                    </div>
                    <small class="d-block text-muted">{{ $msg->created_at->format('d/m/Y H:i') }}</small>
                </div>
            @endforeach
        </div>

        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">
            <div class="input-group">
                <input type="text" name="content" class="form-control" placeholder="Scrivi un messaggio..." required>
                <button type="submit" class="btn btn-primary">Invia</button>
            </div>
        </form>
    </div>
@endsection
