<?php

namespace Database\Factories;

use App\Models\Asignatura;
use App\Models\Maestro;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'actividad_url' => $this->faker->url(),
            'titulo' => $this->faker->name(),
            'descripcion' => $this->faker->text(),
            'fechaInicio' => $this->faker->dateTime(),
            'fechaFin' => $this->faker->dateTime(),
            'asignatura_id' => Asignatura::all()->random()->id,

        ];
    }
}
