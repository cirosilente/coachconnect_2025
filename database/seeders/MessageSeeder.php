<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\User;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        // Prendi uno o più admin
        $admins = User::where('role', 'admin')->get();

        // Prendi tutti gli utenti normali
        $users = User::where('role', 'user')->get();

        // Ogni admin scrive al primo utente disponibile
        foreach ($admins as $admin) {
            foreach ($users as $user) {
                // 1. Admin scrive per primo
                Message::create([
                    'sender_id' => $admin->id,
                    'receiver_id' => $user->id,
                    'content' => 'Benvenuto! Se hai domande, scrivimi pure!',
                ]);

                // 2. Utente risponde
                Message::create([
                    'sender_id' => $user->id,
                    'receiver_id' => $admin->id,
                    'content' => 'Grazie! Felice di iniziare questo percorso.',
                ]);
            }
        }
    }
}
