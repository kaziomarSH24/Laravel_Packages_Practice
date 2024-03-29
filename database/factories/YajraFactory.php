<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class YajraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'salary' => $this->faker->numberBetween(30000,50000),
            'department' => $this->faker->randomElement(array('Accounting','Marketing','Sales','Quality'))
        ];
    }
}
