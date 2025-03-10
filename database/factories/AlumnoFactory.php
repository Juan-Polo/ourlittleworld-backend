<?php

namespace Database\Factories;

use App\Models\Degree;
use App\Models\Padre;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alumno>
 */
class AlumnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=>User::inRandomOrder()->first(),
            'padre_id'=>Padre::inRandomOrder()->first(),
            'degree_id'=>Degree::inRandomOrder()->first()
            
        ];
    }
}
