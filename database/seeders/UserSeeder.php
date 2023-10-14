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
            'name' => 'Teo Javier Montalvo Siles',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678'),
            'departamento_id' => 3
        ]);

        \App\Models\User::factory(10)->create();

    }
}
