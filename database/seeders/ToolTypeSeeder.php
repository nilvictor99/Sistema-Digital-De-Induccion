<?php

namespace Database\Seeders;

use App\Models\ToolType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultToolTypes = [
            ['name' => 'Herramienta de Edición', 'slug' => 'herramienta-edicion', 'description' => 'Herramienta para edición de contenido visual', 'is_active' => true],
            ['name' => 'Herramienta de Diseño', 'slug' => 'herramienta-diseño', 'description' => 'Herramienta utilizada para diseñar interfaces', 'is_active' => true],
            ['name' => 'Herramienta de Desarrollo', 'slug' => 'herramienta-desarrollo', 'description' => 'Herramienta para desarrollo de software', 'is_active' => true],
            ['name' => 'Herramienta de Gestión', 'slug' => 'herramienta-gestion', 'description' => 'Herramienta para la gestión de proyectos y tareas', 'is_active' => true],
        ];

        // Inserta los tipos predefinidos en la tabla 'tool_types'
        foreach ($defaultToolTypes as $toolType) {
            ToolType::create($toolType);
        }
    }
}
