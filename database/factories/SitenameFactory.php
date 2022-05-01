<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SitenameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $num = $this->faker->numberBetween(1, 3);
        return [
            'name' => $this->faker->words($num, true),
        ];
    }
}
