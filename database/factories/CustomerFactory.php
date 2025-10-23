<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $name = ['Juan Dela Cruz', 'Maria Clara', 'Jose Rizal', 'Andres Bonifacio', 'Emilio Aguinaldo', 'Apolinario Mabini', 'Melchora Aquino', 'Lapu-Lapu', 'Gregorio del Pilar', 'Antonio Luna'];
        $contact_number = ['09171234567', '09281234567', '09391234567', '09401234567', '09511234567', '09621234567', '09731234567', '09841234567', '09951234567', '09061234567'];
        return [
            'name' => $this->faker->randomElement($name),
            "contact_number" => $this->faker->randomElement($contact_number),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
