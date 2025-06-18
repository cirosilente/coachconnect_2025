<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Mostra il profilo dell'utente autenticato
    /*public function index()
    {
        $profile = Auth::user()->profile;
        return view('profiles.show', compact('profile'));
    }*/

    // Mostra il form per creare un nuovo profilo
    /*public function create()
    {
        $users = User::all(); // prendi tutti gli utenti (o filtra se vuoi)
        return view('profiles.create', compact('users'));
    }*/

    // Salva un nuovo profilo nel database
    /*public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'età' => 'nullable|integer|min:0',
            'sesso' => 'nullable|in:maschio,femmina,altro',
            'altezza' => 'nullable|numeric|min:0',
            'peso' => 'nullable|numeric|min:0',
            'obiettivi' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            'programma_allenamento' => 'nullable|string',
        ]);

        Profile::create([
            'user_id' => $request->user_id, // prendi dal form
            'età' => $request->età,
            'sesso' => $request->sesso,
            'altezza' => $request->altezza,
            'peso' => $request->peso,
            'obiettivi' => $request->obiettivi,
            'note' => $request->note,
            'programma_allenamento' => $request->programma_allenamento,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profilo creato con successo.');
    }*/

    // Mostra il form di modifica del profilo
    /*public function edit()
    {
        $profile = Auth::user()->profile;

        if (!$profile) {
            return redirect()->route('profile.create');
        }

        return view('profiles.edit', compact('profile'));
    }*/

    // Aggiorna il profilo nel database
    /*public function update(Request $request)
    {
        $request->validate([
            'età' => 'nullable|integer|min:0',
            'sesso' => 'nullable|in:maschio,femmina,altro',
            'altezza' => 'nullable|numeric|min:0',
            'peso' => 'nullable|numeric|min:0',
            'obiettivi' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            'programma_allenamento' => 'nullable|string',
        ]);

        $profile = Auth::user()->profile;

        if (!$profile) {
            return redirect()->route('profile.create');
        }

        $profile->update($request->only([
            'età', 'sesso', 'altezza', 'peso', 'obiettivi', 'note', 'programma_allenamento'
        ]));

        return redirect()->route('profile.index')->with('success', 'Profilo aggiornato con successo.');
    }*/

    // Elimina il profilo (opzionale)
    /*public function destroy()
    {
        $profile = Auth::user()->profile;

        if ($profile) {
            $profile->delete();
            return redirect()->route('profile.index')->with('success', 'Profilo eliminato.');
        }

        return redirect()->route('profile.index')->with('error', 'Profilo non trovato.');
    }*/
    public function index()
    {
        $profiles = Profile::with('user')->get();
        return view('profiles.index', compact('profiles'));
    }

    public function create()
    {
        $users = User::all();
        return view('profiles.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'età' => 'nullable|integer|min:0',
            'sesso' => 'nullable|in:maschio,femmina,altro',
            'altezza' => 'nullable|numeric|min:0',
            'peso' => 'nullable|numeric|min:0',
            'obiettivi' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            'programma_allenamento' => 'nullable|string',
        ]);

        Profile::create($request->all());

        return redirect()->route('profiles.index')->with('success', 'Profilo creato con successo.');
    }

    public function edit(Profile $profile)
    {
        $users = User::all();
        return view('profiles.edit', compact('profile', 'users'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'età' => 'nullable|integer|min:0',
            'sesso' => 'nullable|in:maschio,femmina,altro',
            'altezza' => 'nullable|numeric|min:0',
            'peso' => 'nullable|numeric|min:0',
            'obiettivi' => 'nullable|string|max:255',
            'note' => 'nullable|string',
            'programma_allenamento' => 'nullable|string',
        ]);

        $profile->update($request->all());

        return redirect()->route('profiles.index')->with('success', 'Profilo aggiornato con successo.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect()->route('profiles.index')->with('success', 'Profilo eliminato.');
    }
}
