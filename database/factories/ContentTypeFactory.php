<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContentType>
 */
class ContentTypeFactory extends Factory
{
    /**
     * Define el modelo asociado al factory.
     *
     * @var string
     */
    protected $model = \App\Models\ContentType::class;

    /**
     * Define la estructura predeterminada del factory.
     *
     * @return array
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->word(); // Genera un nombre único
        return [
            'name' => ucfirst($name), // Capitaliza la primera letra
            'slug' => Str::slug($name), // Genera un slug único
            'description' => $this->faker->sentence(), // Descripción aleatoria
            'is_active' => $this->faker->boolean(80), // 80% de probabilidad de que sea activo
        ];
    }
}
