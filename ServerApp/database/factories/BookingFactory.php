<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_restaurant' => $this->faker->randomDigitNotZero(),
            'id_user' => $this->faker->randomDigitNotZero(),
            'booking_date' => $this->faker->date(),
            'from_hour' => $this->faker->time(),
            'to_hour' => $this->faker->time(),
            'table_number' => $this->faker->randomDigitNotZero(),
            'number_people' => $this->faker->randomDigitNotZero(),
        ];
    }
}
