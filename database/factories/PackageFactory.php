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

        $destination = [
            "Tagbilaran City",
            "Panglao Beach",
            "Chocolate Hills",
            "Loboc River",
            "Anda Beach",
            "Baclayon Church",
            "Tarsier Sanctuary",
            "Danao Adventure Park",
            "Hinagdanan Cave",
            "Bilar Man-Made Forest",
            "Alona Beach",
            "Dimiao Twin Falls",
            "Mag-Aso Falls",
            "Cabagnow Cave Pool",
            "Balicasag Island",
            "Virgin Island Sandbar",
            "Mahogany Forest",
            "Can-umantad Falls",
            "Dauis Church",
            "Sevilla Hanging Bridge",
            "Sagbayan Peak",
            "Candaigan Cliff View",
            "Loon Coral Garden",
            "Alicia Panoramic Park",
            "Candijay Rice Terraces",
            "Jagna Port",
            "Garcia Hernandez Hills",
            "Catigbian Caves",
            "Tubigon Market",
            "Inabanga Mangrove Forest"
        ];
        $name = [
            'Island Adventure',
            'Mountain Escape',
            'Cultural Immersion',
            'Beach Picnic',
            'Historical Journey',
            'Nature Exploration',
            'City Highlights',
            'Foodie Experience',
            'Wildlife Safari',
            'Relaxation Retreat',
            'Sunset Cruise',
            'Snorkel & Swim',
            'Hiking Expedition',
            'Kayak & Paddle',
            'Wellness Escape',
            'Photography Tour',
            'Romantic Getaway',
            'Family Fun Package',
            'Eco-Tour',
            'Adventure Combo',
            'Diving Intro',
            'Sunrise Trek',
            'Local Markets Tour',
            'Heritage Walk',
            'River Cruise Experience',
            'Offroad Adventure',
            'Birdwatching Trip',
            'Island Picnic',
            'Spa & Chill',
            'Cultural Workshops'
        ];

        return [
            'name' => $this->faker->randomElement($name),
            'destination' => $this->faker->randomElement($destination),
            'price' => $this->faker->numberBetween(1000, 10000),
            'duration_days' => $this->faker->numberBetween(1, 30),
        ];
    }
}
