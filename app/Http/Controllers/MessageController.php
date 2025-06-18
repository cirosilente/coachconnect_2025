<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($userId)
    {
        $sender = Auth::user(); // chi sta navigando
        $otherUser = User::findOrFail($userId); // l'altro utente nella conversazione

        // Se non è admin (cioè è un cliente)
        if ($sender->role !== Role::ADMIN) {
            // L'utente può visualizzare SOLO la chat con l'admin
            if ($otherUser->role !== Role::ADMIN) {
                abort(403, 'Puoi visualizzare solo conversazioni con l\'admin.');
            }

            // Inoltre, la chat deve contenere almeno un messaggio con l'admin
            $chatExists = Message::where(function ($q) use ($sender, $otherUser) {
                $q->where('sender_id', $sender->id)->where('receiver_id', $otherUser->id);
            })->orWhere(function ($q) use ($sender, $otherUser) {
                $q->where('sender_id', $otherUser->id)->where('receiver_id', $sender->id);
            })->exists();

            if (!$chatExists) {
                abort(403, 'Non hai ancora una conversazione attiva con l\'admin.');
            }
        }

        // Recupera i messaggi
        $messages = Message::where(function ($q) use ($userId) {
            $q->where('sender_id', Auth::id())->where('receiver_id', $userId);
        })->orWhere(function ($q) use ($userId) {
            $q->where('sender_id', $userId)->where('receiver_id', Auth::id());
        })->orderBy('created_at')->get();

        return view('messages.chat', compact('messages', 'otherUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string|max:1000',
        ]);

        $sender = Auth::user();
        $receiver = User::findOrFail($request->receiver_id);

        // Se l'utente è admin → può inviare messaggi a chiunque
        if ($sender->role === Role::ADMIN) {
            // tutto ok
        }
        // Se NON è admin (quindi utente normale)
        else {
            // Può rispondere SOLO all'admin
            if ($receiver->role !== Role::ADMIN) {
                abort(403, 'Puoi inviare messaggi solo all\'admin.');
            }

            // Deve esistere almeno una chat (messaggio già inviato dall'admin a questo utente)
            $chatExists = Message::where('sender_id', $receiver->id)
                ->where('receiver_id', $sender->id)
                ->exists();

            if (!$chatExists) {
                abort(403, 'Non puoi iniziare una nuova conversazione.');
            }
        }

        // Se tutto è valido, crea il messaggio
        Message::create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'content' => $request->content,
        ]);

        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
    public function selectUser()
    {
        $user = Auth::user();

        if ($user->role === Role::ADMIN) {
            // L'admin vede tutti tranne sé stesso
            $users = User::where('id', '!=', $user->id)->get();
        } elseif ($user->role === Role::USER) {
            // L'utente normale vede solo gli admin
            $users = User::where('role', Role::ADMIN)->get();
        } else {
            // Nessun altro ruolo è autorizzato
            abort(403, 'Ruolo non autorizzato a visualizzare utenti.');
        }

        return view('messages.select_user', compact('users'));
    }
}
