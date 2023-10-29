<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{

    public function run(): void
    {

        //ROLES 

        $role1 = Role::create([ 'name' => 'Administrador']);
        $role2 = Role::create([ 'name' => 'Empleado']);

        //PERMISOS
        // ROLES
        Permission::create(['name' => 'Listar Roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Roles'])->syncRoles([$role1]);

        //USUARIOS
        Permission::create(['name' => 'Listar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Guardar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Actualizar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'Eliminar Usuarios'])->syncRoles([$role1]);
    }
}
