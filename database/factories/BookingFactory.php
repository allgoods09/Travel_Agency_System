<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $statuses = ['Confirmed', 'Pending', 'Cancelled'];

        return [
            'package_id' => \App\Models\Package::factory(),
            'customer_id' => \App\Models\Customer::factory(),
            'booking_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
