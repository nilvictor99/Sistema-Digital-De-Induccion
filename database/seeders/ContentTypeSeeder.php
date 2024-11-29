<?php

namespace Database\Seeders;

use App\Models\ContentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Ejecuta el seeder.
     *
     * @return void
     */
    public function run(): void
    {
        // Tipos de contenido predefinidos
        $defaultTypes = [
            ['name' => 'Video', 'slug' => 'video', 'description' => 'Contenido en formato audiovisual', 'is_active' => true],
            ['name' => 'Documento', 'slug' => 'documento', 'description' => 'Contenido en formato PDF o Word', 'is_active' => true],
            ['name' => 'Presentación', 'slug' => 'presentacion', 'description' => 'Contenido en formato de diapositivas', 'is_active' => true],
            ['name' => 'Audio', 'slug' => 'audio', 'description' => 'Contenido en formato de audio', 'is_active' => true],
        ];

        // Inserta los tipos predefinidos
        foreach ($defaultTypes as $type) {
            ContentType::create($type);
        }

        // Genera tipos adicionales con el factory
        ContentType::factory(10)->create();
    }
}
