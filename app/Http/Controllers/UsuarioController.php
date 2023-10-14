<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Departamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = DB::table('users as U')
            ->select('U.id', 'U.name', 'U.email', 'U.profile_photo_path', 'D.nombre as departamento')
            ->join('departamentos as D', 'D.id', '=', 'U.departamento_id')
            ->get();

        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('usuario.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'departament_id' => 'required',
            'profile_photo_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $url = $this->storageUserImage($request->profile_photo_url);

        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'departamento_id' => $request->departament_id,
            'profile_photo_path' => $url
        ]);

        $bitacora = new Bitacora();
        $bitacora->usuario = auth()->user()->id;
        $bitacora->descripcion = 'Creo un nuevo usuario';
        $bitacora->metodo =  $request->method();
        $bitacora->ruta = $request->fullUrl();
        $bitacora->direccion_ip = $request->ip();
        $bitacora->navegador = $request->header('user-agent');
        $bitacora->tabla = 'Users';
        $bitacora->registro_id = $usuario->id;
        $bitacora->save();

        return redirect()->route('usuario.index')->with('correcto', 'Usuario creado correctamente!!!');
    }

    public function edit($user_id)
    {
        $usuario = User::find($user_id);
        $departamentos = Departamento::all();

        return view('usuario.edit', compact('usuario', 'departamentos'));
    }

    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required|min:5|max:100',
            'email' => 'required|email',
            'departament_id' => 'required',
        ]);

        $usuario = User::find($user_id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->departamento_id = $request->departament_id;

        if ($request->profile_photo_url != null) { // si cambia de imagen
            $this->deleteUserStoreImage($usuario);
            $url = $this->storageUserImage($request->profile_photo_url);

            $usuario->profile_photo_path =  $url;
        }

        $usuario->save();

        $bitacora = new Bitacora();
        $bitacora->usuario = auth()->user()->id;
        $bitacora->descripcion = 'Edito un usuario';
        $bitacora->metodo =  $request->method();
        $bitacora->ruta = $request->fullUrl();
        $bitacora->direccion_ip = $request->ip();
        $bitacora->navegador = $request->header('user-agent');
        $bitacora->tabla = 'Users';
        $bitacora->registro_id = $usuario->id;
        $bitacora->save();

        return redirect()->route('usuario.edit', $usuario->id)->with('correcto', 'Usuario EDITADO correctamente');
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);

        $this->deleteUserStoreImage($user);

        $user->delete();

        $bitacora = new Bitacora();
        $bitacora->usuario = auth()->user()->id;
        $bitacora->descripcion = 'Elimino un usuario';
        $bitacora->metodo =  $request->method();
        $bitacora->ruta = $request->fullUrl();
        $bitacora->direccion_ip = $request->ip();
        $bitacora->navegador = $request->header('user-agent');
        $bitacora->tabla = 'Users';
        $bitacora->registro_id = $user->id;
        $bitacora->save();
        
        return redirect()->route('usuario.index')->with('correcto', 'Usuario ELIMINADO correctamente');
    }

    private function deleteUserStoreImage(User $user)
    {
        $url = str_replace('storage', 'public', $user->profile_photo_path);
        Storage::delete($url);
    }

    private function storageUserImage($profile_photo_url)
    {
        // obtener el nombre de la imagen que estoy subiendo
        $nombreImagen = time() . '_' . $profile_photo_url->getClientOriginalName();
        // donde lo voy a guardar
        $ruta = $profile_photo_url->storeAs('public/imagenes/usuarios', $nombreImagen);
        $url = Storage::url($ruta);

        return $url;
    }
}
