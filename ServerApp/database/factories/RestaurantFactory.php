<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_name' => $this->faker->company,
            'address_province' => $this->faker->word,
            'address_city' => $this->faker->city,
            'addess_street' => $this->faker->streetName,
            'addess_number_building' => rand(1, 200),
            'address_number_apartament' => rand(1, 200),
            'address_postal_code' => $this->faker->postcode
        ];
    }
}
