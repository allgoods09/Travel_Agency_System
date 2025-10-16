<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $destination = ['Tubigon', 'Calape', 'Clarin', 'Loon', 'Antequera', 'Cortes', 'Danao', 'Inabanga', 'Panglao', 'Tagbilaran'];

        return [
            'name' => $this->faker->words(3, true),
            'destination' => $this->faker->randomElement($destination),
            'price' => $this->faker->numberBetween(1000, 10000),
            'duration_days' => $this->faker->numberBetween(1, 30),
        ];
    }
}
