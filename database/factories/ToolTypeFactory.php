<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToolType>
 */
class ToolTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,  // Genera un nombre aleatorio para la herramienta
            'slug' => Str::slug($this->faker->word),  // Genera un slug único basado en el nombre
            'description' => $this->faker->sentence,  // Genera una descripción aleatoria
            'is_active' => $this->faker->boolean,  // Genera un valor booleano aleatorio para 'is_active'
        ];
    }
}
