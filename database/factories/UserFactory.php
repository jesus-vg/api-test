<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'     => $this->faker->name(),
            'apellido'   => $this->faker->lastName(),
            'edad'       => $this->faker->numberBetween( 0, 127 ),
            'created_at' => $this->faker->dateTimeBetween( '-1 years', 'now' ),
            'updated_at' => $this->faker->dateTimeBetween( '-1 years', 'now' ),
        ];
    }
}
