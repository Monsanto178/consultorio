<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AntPatologico>
 */
class AntPatologicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enfermedades = [
            'Asma',
            'Diabetes',
            'Hipertensión',
            'Enfermedad celíaca',
            'Epilepsia',
            'Artritis reumatoide',
            'Migraña crónica',
            'Enfermedad de Crohn',
            'Eczema atópico',
            'Lupus',
        ];

        return [
            'antecedente' => $this->faker->randomElement($enfermedades)
        ];
    }
}
