<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $newTraineeRole = Role::create(['name' => 'New Trainee']);

        $permissionsByCategory = [
            'Activity' => ['view', 'create', 'update', 'delete'],
            'Category' => ['view', 'create', 'update', 'delete'],
            'Content' => ['view', 'create', 'update', 'delete'],
            'Tool' => ['view', 'create', 'update', 'delete'],
            'User' => ['view', 'create', 'update', 'delete'],
        ];

        // Crear y asignar permisos al rol Super Admin
        foreach ($permissionsByCategory as $category => $actions) {
            foreach ($actions as $action) {
                $permission = Permission::firstOrCreate(['name' => "{$action} {$category}"]);
                $permission->assignRole($superAdminRole);
            }
        }

        // Permisos específicos para el rol New Trainee
        $traineePermissions = [
            'view Activity',
            'view Category',
            'view Content',
            'view Tool',
        ];

        foreach ($traineePermissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            $permission->assignRole($newTraineeRole);
        }

    }
}
