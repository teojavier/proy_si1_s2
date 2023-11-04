<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRolCreate extends Component
{
    public $filtro;

    public function render()
    {
        $roles = Role::where('name', 'LIKE', '%' . $this->filtro . '%')->get();
        return view('livewire.user-rol-create', compact('roles'));
    }
}
