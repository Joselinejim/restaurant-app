<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'mesero'], [
            'description' => 'Usuario que toma órdenes'
        ]);

        Role::firstOrCreate(['name' => 'cocina'], [
            'description' => 'Usuario que prepara las órdenes'
        ]);
        Role::firstOrCreate(['name' => 'cajero']);
    }
}
