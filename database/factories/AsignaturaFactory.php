<?php

namespace Database\Factories;

use App\Models\Degree;
use App\Models\Maestro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignatura>
 */
class AsignaturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>$this->faker ->name(),
            'maestro_id'=>Maestro::inRandomOrder()->first(),
            'degree_id'=>Degree::inRandomOrder()->first()
            
        ];
    }
}
