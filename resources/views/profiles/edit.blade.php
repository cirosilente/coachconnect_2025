@extends('layouts.app')

@section('content')

   <div class="container">
       <h2>Modifica Profilo</h2>

       @if ($errors->any())
           <div class="alert alert-danger">
               <ul>
                   @foreach ($errors->all() as $errore)
                       <li>{{ $errore }}</li>
                   @endforeach
               </ul>
           </div>
       @endif

       <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
           @csrf
           @method('PUT')

           <div class="mb-3">
               <label for="user_id" class="form-label">Utente</label>
               <select class="form-select" name="user_id" required>
                   @foreach ($users as $user)
                       <option value="{{ $user->id }}" {{ $profile->user_id == $user->id ? 'selected' : '' }}>
                           {{ $user->name }} ({{ $user->email }})
                       </option>
                   @endforeach
               </select>
           </div>

           <div class="mb-3">
               <label class="form-label">Età</label>
               <input type="number" name="età" class="form-control" value="{{ $profile->età }}">
           </div>

           <div class="mb-3">
               <label class="form-label">Sesso</label>
               <select name="sesso" class="form-select">
                   <option value="">-- Seleziona --</option>
                   <option value="maschio" {{ $profile->sesso === 'maschio' ? 'selected' : '' }}>Maschio</option>
                   <option value="femmina" {{ $profile->sesso === 'femmina' ? 'selected' : '' }}>Femmina</option>
                   <option value="altro" {{ $profile->sesso === 'altro' ? 'selected' : '' }}>Altro</option>
               </select>
           </div>

           <div class="mb-3">
               <label class="form-label">Altezza (cm)</label>
               <input type="number" step="0.01" name="altezza" class="form-control" value="{{ $profile->altezza }}">
           </div>

           <div class="mb-3">
               <label class="form-label">Peso (kg)</label>
               <input type="number" step="0.01" name="peso" class="form-control" value="{{ $profile->peso }}">
           </div>

           <div class="mb-3">
               <label class="form-label">Obiettivi</label>
               <input type="text" name="obiettivi" class="form-control" value="{{ $profile->obiettivi }}">
           </div>

           <div class="mb-3">
               <label class="form-label">Note</label>
               <textarea name="note" class="form-control">{{ $profile->note }}</textarea>
           </div>

           <div class="mb-3">
               <label class="form-label">Programma Allenamento</label>
               <textarea name="programma_allenamento" class="form-control">{{ $profile->programma_allenamento }}</textarea>
           </div>

           <button type="submit" class="btn btn-primary">Aggiorna Profilo</button>
       </form>
   </div>
@endsection
