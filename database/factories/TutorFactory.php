<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tutor>
 */
class TutorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numerify('########'),
            'relacion' => $this->faker->randomElement(['Padre', 'Madre', 'Familiar', 'Otro']),
            'telefono' => $this->faker->unique()->numerify('##########'),
            'correo' =>$this->faker->email()
        ];
    }
}
