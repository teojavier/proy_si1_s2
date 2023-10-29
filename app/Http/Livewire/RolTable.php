<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolTable extends Component
{
    public $filtro;

    public function render()
    {
        $roles = Role::where('name', 'LIKE', '%' . $this->filtro . '%')->get();
        return view('livewire.rol-table', compact('roles'));
    }
}
