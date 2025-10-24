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
        
        $name = [
    "Juan Dela Cruz",
    "Maria Labado",
    "Jose Almeda",
    "Lorna Dagohoy",
    "Benjie Tampus",
    "Roselyn Lumayag",
    "Carlos Bantol",
    "Marites Asoy",
    "Ramil Evasco",
    "Joy Sabornido",
    "Rico Cabilao",
    "Nida Calope",
    "Tonyo Rebosura",
    "Fe Abapo",
    "Mark Lumapas",
    "Liza Relampagos",
    "Jun Cahayag",
    "Ana Baynas",
    "Ramon Gementiza",
    "Cristy Yap",
    "Erwin Dagupan",
    "Lovely Mabaso",
    "Jaymar Inting",
    "Arlene Amora",
    "Gerry Sumaylo",
    "Marivic Buscato",
    "Rolando Dagooc",
    "Shiela Lumbres",
    "Rey Cadelina",
    "Joan Bongcaras"
];
        $contact_number = ['09171234567', '09281234567', '09391234567', '09401234567', '09511234567', '09621234567', '09731234567', '09841234567', '09951234567', '09061234567'];
        return [
            'name' => $this->faker->randomElement($name),
            "contact_number" => $this->faker->randomElement($contact_number),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }
}
