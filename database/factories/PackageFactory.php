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
        $name = ['Island Adventure', 'Mountain Escape', 'Cultural Tour', 'Beach Getaway', 'Historical Journey', 'Nature Exploration', 'City Highlights', 'Foodie Experience', 'Wildlife Safari', 'Relaxation Retreat'];

        return [
            'name' => $this->faker->randomElement($name),
            'destination' => $this->faker->randomElement($destination),
            'price' => $this->faker->numberBetween(1000, 10000),
            'duration_days' => $this->faker->numberBetween(1, 30),
        ];
    }
}
