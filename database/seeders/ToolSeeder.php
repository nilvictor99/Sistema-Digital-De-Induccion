<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'name' => 'Trello',
                'description' => 'Herramienta de gestión de proyectos y tareas.',
                'link' => 'https://trello.com',
                'tool_type_id' => 4, // Herramienta de Gestión
                'is_active' => true,
            ],
            [
                'name' => 'GitHub',
                'description' => 'Plataforma de desarrollo colaborativo para alojar proyectos.',
                'link' => 'https://github.com',
                'tool_type_id' => 3, // Herramienta de Control de Versiones
                'is_active' => true,
            ],
            [
                'name' => 'Flowbite',
                'description' => 'Componentes de diseño para Tailwind CSS.',
                'link' => 'https://flowbite.com',
                'tool_type_id' => 2, // Herramienta de Diseño
                'is_active' => true,
            ],
            [
                'name' => 'Tailwind CSS',
                'description' => 'Framework CSS para diseño moderno y responsivo.',
                'link' => 'https://tailwindcss.com',
                'tool_type_id' => 2, // Herramienta de Diseño
                'is_active' => true,
            ],
            [
                'name' => 'Slack',
                'description' => 'Herramienta de comunicación para equipos.',
                'link' => 'https://slack.com',
                'tool_type_id' => 5, // Herramienta de Comunicación
                'is_active' => true,
            ],
            [
                'name' => 'Figma',
                'description' => 'Herramienta de diseño colaborativo.',
                'link' => 'https://figma.com',
                'tool_type_id' => 2, // Herramienta de Diseño
                'is_active' => true,
            ],
            [
                'name' => 'Visual Studio Code',
                'description' => 'Editor de código fuente ligero y potente.',
                'link' => 'https://code.visualstudio.com',
                'tool_type_id' => 1, // Editor de Código
                'is_active' => true,
            ],
            [
                'name' => 'Docker',
                'description' => 'Plataforma para desarrollar, enviar y ejecutar aplicaciones en contenedores.',
                'link' => 'https://www.docker.com',
                'tool_type_id' => 3, // Herramienta de Control de Versiones
                'is_active' => true,
            ],
            [
                'name' => 'Postgres.New',
                'description' => 'Plataforma que permite crear y gestionar bases de datos PostgreSQL en la nube de manera sencilla y rápida.',
                'link' => 'https://postgres.new/',
                'tool_type_id' => 6, // Herramienta de Gestión de Bases de Datos
                'is_active' => true,
            ],
            [
                'name' => 'DataGrip',
                'description' => 'IDE para bases de datos que soporta múltiples sistemas, incluido PostgreSQL.',
                'link' => 'https://www.jetbrains.com/datagrip/',
                'tool_type_id' => 6, // Herramienta de Gestión de Bases de Datos
                'is_active' => true,
            ],
        ];
        foreach ($tools as $tool) {
            Tool::create($tool);
        }
    }
}
