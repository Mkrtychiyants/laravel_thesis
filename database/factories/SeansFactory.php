<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seans>
 */
class SeansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id'=>fake()->numberBetween(1,1),
            'movie_id'=>fake()->numberBetween(1,1),
            'start'=>fake()->time(),
            'finish'=>fake()->time(),
        ];
    }
}
