<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Profile::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'età' => $this->faker->numberBetween(18, 65),
            'sesso' => $this->faker->randomElement(['M', 'F', 'Altro']),
            'altezza' => $this->faker->randomFloat(2, 140, 210),
            'peso' => $this->faker->randomFloat(2, 40, 120),
            'obiettivi' => $this->faker->sentence(),
            'note' => $this->faker->paragraph(),
            'programma_allenamento' => $this->faker->text(200),
        ];
    }
}
