<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\User;
use App\Enums\Role;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        // Prendi tutti gli admin
        $admins = User::where('role', Role::ADMIN)->get();

        // Prendi tutti gli utenti normali
        $users = User::where('role', Role::USER)->get();

        foreach ($admins as $admin) {
            foreach ($users as $user) {
                // Admin invia il primo messaggio
                Message::create([
                    'sender_id' => $admin->id,
                    'receiver_id' => $user->id,
                    'content' => 'Benvenuto! Se hai domande, scrivimi pure!',
                ]);

                // L'utente risponde all'admin
                Message::create([
                    'sender_id' => $user->id,
                    'receiver_id' => $admin->id,
                    'content' => 'Grazie mille!',
                ]);
            }
        }
    }
}
