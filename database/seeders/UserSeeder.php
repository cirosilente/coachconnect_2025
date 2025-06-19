<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(10)->create();

        // Utente admin di test
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@example.com',
            'role' => 'admin', // Usa una stringa
        ]);
    }
}
