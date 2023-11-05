<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
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

        $bitacora = new Bitacora();
        $bitacora->usuario = auth()->user()->id;
        $bitacora->descripcion = 'Edito un Rol';
        $bitacora->metodo =  $request->method();
        $bitacora->ruta = $request->fullUrl();
        $bitacora->direccion_ip = $request->ip();
        $bitacora->navegador = $request->header('user-agent');
        $bitacora->tabla = 'Roles';
        $bitacora->registro_id = $rol->id;
        $bitacora->save();

        return redirect()->route('rol.edit', $id)->with('correcto', "Rol Editado Correctamente");
    }

    public function delete($id){
        $rol = Role::find($id);
        $rol->delete();
        return redirect()->route('rol.index')->with('correcto', "Rol Eliminado Correctamente");
    }
}
