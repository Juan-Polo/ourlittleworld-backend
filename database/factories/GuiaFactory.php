<?php

namespace Database\Factories;

use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Guia>
 */
class GuiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'guia_url' => $this->faker->url(),
            'descripcion' => $this->faker->text(),
            'asignatura_id' => Asignatura::inRandomOrder()->first()
        ];
    }
}
