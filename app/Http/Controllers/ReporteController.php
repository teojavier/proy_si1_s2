<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function index()
    {
        $resultado = DB::table('bitacoras as BI')
            ->join('users as U', 'U.id', '=', 'BI.usuario')
            ->select('U.name', DB::raw('COUNT(*) as cantidad_peticiones'))
            ->where('BI.metodo', 'POST')
            ->groupBy('U.name')
            ->orderBy('cantidad_peticiones', 'asc')
            ->get()
            ->toArray();

        $usuarios = [];
        $cantidad_peticiones = [];

        foreach ($resultado as $row) {
            $usuarios[] = $row->name;
            $cantidad_peticiones[] = $row->cantidad_peticiones;
        }

        return view('reportes.index', compact('usuarios', 'cantidad_peticiones'));
    }
}
