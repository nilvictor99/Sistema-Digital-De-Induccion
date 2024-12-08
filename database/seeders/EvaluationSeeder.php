<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluation::create([
            'name' => 'Inducción al uso de GitHub',
            'description' => 'Formulario de evaluación sobre los conocimientos básicos y avanzados en el uso de GitHub.',
            'link' => 'https://forms.gle/WamWiNBk14fkJxwi6',
        ]);

        Evaluation::create([
            'name' => 'Inducción al uso de Trello',
            'description' => 'Formulario de evaluación sobre el conocimiento y la gestión de proyectos con Trello.',
            'link' => 'https://forms.gle/1xG2w9Mvas7Ydicn9',
        ]);
    }
}
