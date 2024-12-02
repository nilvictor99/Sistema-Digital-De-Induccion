<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'title' => 'Documentación oficial de Laravel',
                'description' => 'Página oficial del framework Laravel, con guías, documentación y recursos.',
                'file_path' => null,
                'link' => 'https://laravel.com/',
                'content_type_id' => 2,
                'is_active' => true,
                'published_at' => Carbon::now(),
                'created_by' => 1, // ID del usuario administrador
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Documentación oficial de Vue.js',
                'description' => 'Página oficial de Vue.js, con documentación y guías para construir interfaces modernas.',
                'file_path' => null,
                'link' => 'https://vuejs.org/',
                'content_type_id' => 2,
                'is_active' => true,
                'published_at' => Carbon::now(),
                'created_by' => 1,
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Página oficial de Filament',
                'description' => 'Framework para paneles administrativos en PHP con soporte para Laravel.',
                'file_path' => null,
                'link' => 'https://filamentphp.com/',
                'content_type_id' => 2,
                'is_active' => true,
                'published_at' => Carbon::now(),
                'created_by' => 1,
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Documentación oficial de DaisyUI',
                'description' => 'Extensión de Tailwind CSS para componentes accesibles y personalizables.',
                'file_path' => null,
                'link' => 'https://daisyui.com/',
                'content_type_id' => 2,
                'is_active' => true,
                'published_at' => Carbon::now(),
                'created_by' => 1,
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($contents as $content) {
            DB::table('contents')->insert($content);
        }
    }
}
