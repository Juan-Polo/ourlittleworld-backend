<?php

namespace Database\Factories;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mensaje>
 */
class MensajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'remitente' => $this->faker->name(),
            'contenido' => $this->faker->text(),
            'fechaHora' => $this->faker->dateTime(),
            'chat_id' => Chat::inRandomOrder()->first()

        ];
    }
}
