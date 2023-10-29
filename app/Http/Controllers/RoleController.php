<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        return view('roles.index');
    }

    public function create(){
        return view('roles.create');
    }

    public function edit($id){
        return view('roles.edit', compact('id'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:4|max:100',
            'permissions' => 'required'
        ]);

        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->save();
        $rol->permissions()->sync($request->permissions);
        return redirect()->route('rol.edit', $id)->with('correcto', "Rol Editado Correctamente");
    }

    public function delete($id){
        $rol = Role::find($id);
        $rol->delete();
        return redirect()->route('rol.index')->with('correcto', "Rol Eliminado Correctamente");
    }
}
