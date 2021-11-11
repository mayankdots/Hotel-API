<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $hotels = Hotel::pluck('id')->toArray();
        return [
            'hotel_id' => $this->faker->randomElement($hotels),
            'title' =>  $this->faker->sentence,
            'description' => $this->faker->realText,
            'author' => $this->faker->name(),
            'rating' => rand(1,5),
        ];
    }
}
