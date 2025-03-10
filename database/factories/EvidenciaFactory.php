<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evidencia>
 */
class EvidenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'evidencia_url' =>$this->faker ->url(),
            'fechaSubida' =>$this->faker ->dateTime(),
            'activity_id'=>Activity::inRandomOrder()->first()
        ];
    }
}
