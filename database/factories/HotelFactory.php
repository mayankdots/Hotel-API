<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $suppliers = ['Own', 'Hotelbeds', 'SunHotels'];
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'supplier' => $suppliers[rand(0,2)],
            'status' => rand(0,1)
        ];
    }
}
