<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Court>
 */
class CourtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            /* 'name' => $this->faker->sentence(12) ,
            'description' => $this->faker->sentence(30),
            'category_lvl_court' => $this->faker->randomElement([1,2,3,4,5]),
            'category' => $this->faker->randomElement(['normal', 'tournament']),
            'date_booking' => ,
            'hour_booking' => ,
            'city' => $this->faker->sentence(6),
            'available' => $this->faker->boolean(true),
            'players' => $this->faker->randomElement([1,2,3,4]),
            'img' => $this->faker->uuid() . 'jpg',
            'size' => $this->faker->randomElement([4]),
            'user_id'=> $this->faker->randomElement([1,2,3]) */
        ];
    }
}
