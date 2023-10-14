<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departamento::create([
            'nombre' => 'Sistemas'
        ]);

        Departamento::create([
            'nombre' => 'RRHH'
        ]);

        Departamento::create([
            'nombre' => 'Administración'
        ]);

        Departamento::create([
            'nombre' => 'Logística'
        ]);

        Departamento::create([
            'nombre' => 'Marketing'
        ]);
    }
}
