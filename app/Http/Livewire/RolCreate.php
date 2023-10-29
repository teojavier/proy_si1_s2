<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolCreate extends Component
{

    public $permisosSelected = [];
    public $name, $filtro;


    public function guardarRol(){
        $this->validate([
            'name' => 'required|min:4|max:100|unique:roles',
            'permisosSelected' => 'required'
        ]);

        $rol = Role::create([
            'name' => $this->name,
            'guard_name' => 'web',
        ]);

        $rol->permissions()->sync($this->permisosSelected);

        $mensaje = "Rol Creado correctamente";
        return redirect()->route('rol.index')->with('correcto', $mensaje);
    }

    public function render()
    {
        $permisos = Permission::where('name', 'LIKE', '%' . $this->filtro . '%')->get();
        return view('livewire.rol-create', compact('permisos'));

    }
}
