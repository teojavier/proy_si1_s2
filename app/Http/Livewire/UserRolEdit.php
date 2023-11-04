<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRolEdit extends Component
{
    public $filtro, $user;

    public function mount($id){
        $this->user = User::find($id);
    }

    public function render()
    {
        $roles = Role::where('name', 'LIKE', '%' . $this->filtro . '%')->get();
        return view('livewire.user-rol-edit', compact('roles'));
    }
}
