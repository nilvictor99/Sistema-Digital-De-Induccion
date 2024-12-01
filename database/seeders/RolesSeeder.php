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
        Role::firstOrCreate(['name' => 'Super Admin']);
        $member = Role::create(['name' => 'Induction Member']);

        // Crear permisos
        $permissions = [
            'Content' => ['view-any', 'view', 'create', 'update', 'delete'],
            'Tool' => ['view-any', 'view', 'create', 'update', 'delete'],
        ];

        $permissionInstances = [];

        foreach ($permissions as $model => $actions) {
            foreach ($actions as $action) {
                $permissionName = "{$action} {$model}";
                $permissionInstances[$permissionName] = Permission::firstOrCreate([
                    'name' => $permissionName,
                    'guard_name' => 'web'
                ]);
            }
        }

        $member->syncPermissions([
            $permissionInstances['view-any Content'],
            $permissionInstances['view Content'],
            $permissionInstances['create Content'],
            $permissionInstances['update Content'],
            $permissionInstances['delete Content'],
            $permissionInstances['view-any Tool'],
            $permissionInstances['view Tool'],
            $permissionInstances['create Tool'],
            $permissionInstances['update Tool'],
            $permissionInstances['delete Tool'],
        ]);
    }
}
