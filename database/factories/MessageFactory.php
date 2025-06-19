<?php

namespace Database\Factories;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;
    public function definition(): array
    {
        return [
            // 'sender_id' => User::factory(), // opzionale se non serve
            // 'receiver_id' => User::factory(), // opzionale
            'content' => $this->faker->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
