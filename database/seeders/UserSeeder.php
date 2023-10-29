<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'departamento_id' => 2
        ])->assignRole('Administrador');

        User::create([
            'name' => 'Teo Javier Montalvo Siles',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678'),
            'departamento_id' => 3
        ])->assignRole('Empleado');

        User::create([
            'name' => 'Carlos Melgar',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678'),
            'departamento_id' => 1
        ])->assignRole('Empleado');

        // \App\Models\User::factory(10)->create();

    }
}
