<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definir las acciones principales
        $actions = ['view', 'create', 'update', 'delete'];

        // Definir los recursos del paquete
        $resources = ['posts', 'categories', 'tags', 'comments', 'seo_details', 'settings'];

        // Crear permisos para cada combinación de acción y recurso
        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                Permission::create(['name' => "blog.{$action}-{$resource}"]);
            }
        }

        // Crear permisos adicionales si son necesarios
        Permission::create(['name' => 'blog.manage-newsletters']);
        Permission::create(['name' => 'blog.view-dashboard']);
    }
}