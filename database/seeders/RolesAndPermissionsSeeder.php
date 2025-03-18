<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $admin = Role::create(['name' => 'Administrador']);
        $coordinador = Role::create(['name' => 'Coordinador de Egresados']);
        $egresado = Role::create(['name' => 'Egresado']);

        // Crear permisos
        $permissions = [
            'gestionar usuarios',
            'ver reportes',
            'crear publicaciones',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Asignar permisos a roles
        $admin->givePermissionTo(['gestionar usuarios', 'ver reportes', 'crear publicaciones']);
        $coordinador->givePermissionTo(['ver reportes', 'crear publicaciones']);
        $egresado->givePermissionTo(['crear publicaciones']);
    }
}
