<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verificar y crear el usuario administrador si no existe
        if (!User::where('email', 'admin@unimar.edu')->exists()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@unimar.edu',
                'password' => Hash::make('admin123'),
            ]);
            $admin->assignRole('Administrador');
        }

        // Verificar y crear el usuario coordinador si no existe
        if (!User::where('email', 'coordinador@unimar.edu')->exists()) {
            $coordinador = User::create([
                'name' => 'Coordinador',
                'email' => 'coordinador@unimar.edu',
                'password' => Hash::make('coordinador123'),
            ]);
            $coordinador->assignRole('Coordinador de Egresados');
        }

    }
}
