<?php

namespace Database\Factories;

use App\Models\Alergia;
use App\Models\AntHereditario;
use App\Models\AntPatologico;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genero = $this->faker->randomElement(['Masculino', 'Femenino']);

        $nombre = $genero === 'Masculino' ? 
            $this->faker->firstNameMale() :
            $this->faker->firstNameFemale();

        return [
            'nombre' => $nombre,
            'apellido' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numerify('########'),
            'genero' => $genero,
            'fecha_nac' =>$this->faker->date('Y-m-d', '2025-03-01'),
            'estado' => $this->faker->randomElement([true, false])
        ];
    }

    public function configure() {
        return $this->afterCreating(function (Paciente $paciente) {
            Alergia::factory(rand(1,3))->create(['paciente_id' => $paciente->id]);
            AntHereditario::factory(rand(1,3))->create(['paciente_id' => $paciente->id]);
            AntPatologico::factory(rand(1,3))->create(['paciente_id' => $paciente->id]);
        });
    }
}
