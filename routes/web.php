<?php

use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[CursoController::class, 'index'])->name('cursos.index');

//ruta show
Route::get('/cursos/{curso}',[CursoController::class,'show'])->name('cursos.show');
//ruta filtrar categoria
Route::get('/categoria/{categoria}', [CursoController::class, 'categoria'])->name('cursos.categoria');
//ruta filtrar etiqueta
Route::get('/etiqueta/{etiqueta}', [CursoController::class, 'etiqueta'])->name('cursos.etiqueta');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

