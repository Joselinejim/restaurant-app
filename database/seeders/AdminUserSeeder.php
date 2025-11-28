<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Crear rol admin si no existe
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Crear usuario administrador
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'], // evita duplicados
            [
                'name' => 'Administrador',
                'password' => Hash::make('12345678'),
            ]
        );

        // Asignar rol
        $admin->assignRole('admin');
    }
}
