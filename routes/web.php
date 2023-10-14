<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('usuarios/index', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('usuario.create');
    Route::post('usuarios/store', [UsuarioController::class, 'store'])->name('usuario.store');

    Route::get('usuarios/edit/user_id={id}', [UsuarioController::class, 'edit'])->name('usuario.edit');
    Route::post('usuarios/update/user_id={id}', [UsuarioController::class, 'update'])->name('usuario.update');

    Route::post('usuarios/delete/user_id={id}', [UsuarioController::class, 'delete'])->name('usuario.delete');


    
});