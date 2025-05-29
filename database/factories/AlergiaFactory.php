<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alergia>
 */
class AlergiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {        
        $alergias = [    
        'Polen',
        'Ácaros del polvo',
        'Látex',
        'Penicilina',
        'Frutos secos',
        'Mariscos',
        'Picadura de abeja',
        'Moho',
        'Aspirina',
        'Leche de vaca',
        ];

        return [
            'alergia' => $this->faker->randomElement($alergias)
        ];
    }
}
