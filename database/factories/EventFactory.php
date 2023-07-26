<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => fake()->unique()->sentence(3),
            'event_description' => fake()->text,
            'event_start' => fake()->dateTimeBetween('now', '+1 month'),
            'event_end' => fake()->dateTimeBetween('+1 month', '+2 months'),
        ];
    }
}