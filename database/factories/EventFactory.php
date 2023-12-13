<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends Factory<Event>
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
            'title' => fake()->text(10),
            'description' => fake()->text(),
            'date/time' => fake()->dateTime(),
            'location' => fake()->address(),
        ];
    }

    public function older(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'date/time' => new Carbon("1997-12-31 12:00:00"),
            ];
        });
    }

    public function newer(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'date/time' => new Carbon("2018-01-01 12:00:00"),
            ];
        });
    }
}
